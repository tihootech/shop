<?php

namespace App\Http\Controllers;

use App\Product;
use App\Image;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $products = Product::where('admin_id', auth()->id())->paginate(25);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated_data = self::validation(0,'.*');
        if (check_for_duplicates_in_array($request->name)) {
            $error = "لطفا از نام های تکراری برای محصولات خود استفاده نکنید.";
            return back()->withInput()->withErrors([$error]);
        }
        foreach ($request->name as $name) {
            if ($found = Product::where('admin_id', auth()->id())->where('name', $name)->first()) {
                $error = "شما قبلا از نام '$name' برای یکی از محصولات خود استفاده کرده اید.";
                return back()->withInput()->withErrors([$error]);
            }
        }

        $result = prepare_multiple($validated_data);
        foreach ($result as $i => $data) {
            $result[$i]['admin_id'] = auth()->id();
        }

        Product::insert($result);

        Helper::flash();
        return redirect('products');
    }

    public function store_images(Request $request, Product $product)
    {
        // validate images
        $request->validate(['path.*'=>'mimes:jpeg,png,bmp,tiff|max:2000']);

        // valifate max images
        $current_images = $product->images->count();
        $uploaded_images = count($request->path);
        $uploadable = 10 - $current_images;
        if ($uploaded_images > $uploadable) {
            return back()->withErrors(["شما نهایتا برای هر محصول میتوانید 10 تصویر آپلود کنید."]);
        }

        // upload images
        $paths = [];
        if (is_array($request->path) && count($request->path)) {
            foreach ($request->path as $file) {
                $name = rs().'-'.$file->getClientOriginalName();
                $relative_path = 'storage/admin_uploads/';
                $file->move($relative_path,$name);
                $paths[] = $relative_path . $name;
            }
        }

        // store in database
        foreach ($paths as $path) {
            $count = $product->images->count();
            Image::create([
                'path' => $path,
                'owner_id' => $product->id,
                'owner_type' => Product::class,
            ]);
        }

        // redirection
        Helper::flash();
        return back();

    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function edit_images(Product $product)
    {
        return view('products.edit_images', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->admin_id == auth()->id()) {
            $found = Product::where('id', '<>', $product->id)->where('admin_id', $product->admin_id)->where('name', $request->name)->first();
            if ($found) {
                return back()->withErrors(['در این فروشگاه، قبلا از این نام برای یکی از محصولات استفاده شده است.']);
            }
            $validated_data = self::validation($product->id);
            $product->update($validated_data);
            Helper::flash();
            return redirect('products');
        }else {
            abort(403);
        }
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            $this->delete_image($image);
        }
        $product->delete();
        Helper::flash_delete_message();
        return back();
    }

    public function delete_image(Image $image)
    {
        if (file_exists($image->path)) {
            \File::delete($image->path);
        }
        $image->delete();
        Helper::message("تصویر مورد نظر پاک شد.");
        return back();
    }

    public static function validation($id=0,$suffix=null)
    {
        return request()->validate([
            "name$suffix" => "required|string|max:100",
            "price$suffix" => "required|integer",
            "discount$suffix" => "nullable|integer|between:0,100",
            "info$suffix" => "nullable|string",
            "status$suffix" => "integer",
        ]);
    }
}
