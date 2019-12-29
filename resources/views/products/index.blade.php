@extends('layouts.dashboard')
@section('main')
    <h2 class="text-center text-info"> لیست محصولات </h2>
    <hr>

    <div class="tile direct-x">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th> ردیف </th>
                    <th> نام محصول </th>
                    <th> قیمت </th>
                    <th> تخفیف </th>
                    <th> نوع فروش </th>
                    <th> زیرشاخه </th>
                    <th> تعداد تصاویر </th>
                    <th> داغ </th>
                    <th> وضعیت </th>
                    <th colspan="3"> عملیات </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $i => $product)
                    <tr>
                        <th> {{$i+1}} </th>
                        <td> {{$product->name}} </td>
                        <td> {{toman($product->price)}} </td>
                        <td title="قیمت نهایی {{toman($product->cost())}}" data-toggle="tooltip">
                            {{$product->discount ?? 0}}%
                        </td>
                        <td> {{translate($product->sell_type)}} </td>
                        <td @if($product->category) title="{{$product->category->breadcrumb()}}" data-toggle="tooltip" @endif>
                            {{$product->category->title ?? '-'}}
                        </td>
                        <td> {{$product->images->count()}} </td>
                        <td> {!! coc($product->hot) !!} </td>
                        <td>
                            @if ($product->status == 1)
                                <i class="fa fa-check text-success ml-1"></i>
                                موجود
                            @elseif ($product->status == -1)
                                <i class="fa fa-close text-danger ml-1"></i>
                                ناموجود
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{url("products/$product->id/edit")}}" class="text-success" title="ویرایش" data-toggle="tooltip">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{url("products/$product->id/images")}}" class="text-{{ $product->images->count() ? 'primary' : 'warning'}}"
                                title="مدیریت تصاویر" data-toggle="tooltip">
                                <i class="fa fa-image"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#" class="text-danger delete" title="حذف" data-toggle="tooltip" data-target="delete-product-{{$product->id}}">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form class="d-none" action="{{url("products/$product->id")}}" method="post" id="delete-product-{{$product->id}}">
                                @csrf
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{$products->links()}}

@endsection
