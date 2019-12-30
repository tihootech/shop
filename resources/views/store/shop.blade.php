@extends('layouts.essence')
@section('content')

    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2> لیست محصولات </h2>
                    </div>
                </div>
                <hr class="col-12 m-0 p-0">
            </div>
        </div>
    </div>

    <section class="shop_grid_area pb-5">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-8 col-lg-9 mx-auto">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p> تعداد محصولات : <span>{{$total_products}}</span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            @if (count($products))
                                @foreach ($products as $product)
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        @include('store.partials.product')
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-warning col-12">
                                    محصولی یافت نشد.
                                </div>
                            @endif

                        </div>
                    </div>

                    <!-- Pagination -->
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->
@endsection
