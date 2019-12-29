@extends('layouts.essence')
@section('content')
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        @if (count($product->images) > 1)
            <div class="single_product_thumb clearfix">
                <div class="product_thumbnail_slides owl-carousel">
                    @foreach ($product->images as $image)
                        <img src="{{asset($image->path)}}" alt="{{$product->name}}">
                    @endforeach
                </div>
            </div>
        @elseif(count($product->images) == 1)
            <div class="single_product_thumb clearfix">
                <div class="product_thumbnail_slides owl-carousel">
                    <img src="{{asset($product->image->path)}}" alt="{{$product->name}}">
                    <img src="{{asset($product->image->path)}}" alt="{{$product->name}}">
                </div>
            </div>
        @endif

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">

            <h2>{{$product->name}}</h2>

            @if ($product->discount)
                <p class="product-price">
                    <span class="old-price">{{number_format($product->price)}}</span>
                    <strong class="text-danger mr-2"> {{toman($product->cost())}} </strong>
                </p>
            @else
                <p class="product-price">{{toman($product->price)}}</p>
            @endif
            <p class="product-desc">{{$product->info}}</p>


            <div id="product-added" class="alert alert-info animated flash" style="display:none">
                <i class="fa fa-check ml-1"></i>
                محصول مورد نظر به سبد خرید اضافه شد.
            </div>
            <div class="cart-fav-box d-flex align-items-center">

                <div class="product-favourite ml-4">
                    <a href="#" class="favme fa fa-heart"></a>
                </div>

                @if ($product->status == 1)
                    <button type="submit" name="addtocart" value="{{$product->id}}" class="btn essence-btn"> اضافه کردن به سبد خرید </button>
                @else
                    <button type="button" disabled class="btn essence-btn"> ناموجود </button>
                @endif

            </div>
        </div>
    </section>

    @if ( count( $products = $product->similar_products() ) )
        <hr>
        @include('store.partials.products_carousel', ['title' => 'محصولات مشابه'])
    @endif

@endsection
