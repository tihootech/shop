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

            <hr>
            <div class="cart-fav-box">

                <h4> اطلاعات فروشگاه </h4>
                <div class="alert alert-info my-3">
                    <ul>
                        <li>
                            <b> نام فروشگاه :  </b> {{$product->admin->name ?? '-'}}
                        </li>
                        <li>
                            <b> شماره تماس :  </b> {{$product->admin->phone ?? '-'}}
                        </li>
                        <li>
                            <b> آدرش :  </b> {{$product->admin->details->address ?? 'تعریف نشده'}}
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </section>

@endsection
