@extends('layouts.essence')
@section('content')

    <section class="welcome_area mb-5 bg-img background-overlay" style="background-image: url({{asset('essence/img/bg-img/bg-1.jpg')}});">
        <div class="h-100" style="background-color:rgba(0,0,0,0.25)">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h1 class="text-light text-center"> پروژه فروشگاه آنلاین </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <h2 class="text-center mb-4"> لیست فروشگاه ها </h2>
        <div class="container">
            <div class="row">
                @foreach ($stores as $store)
                    <div class="col-md-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                {{$store->name}}
                            </div>
                            <div class="card-body text-center">
                                <a href="{{url($store->details->title ?? '#')}}" class="btn essence-btn"> مشاهده فروشگاه </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <hr>
    @if (count($products))
        @include('store.partials.products_carousel', ['title' => 'محصولاتی از همه فروشگاه ها'])
    @endif
    <div class="container">
        <div class="card mb-5">
            <div class="card-body text-center">
                <a href="{{url("shop")}}" class="dinar btn essence-btn"> مشاهده همه محصولات از همه فروشگاه ها </a>
            </div>
        </div>
    </div>


@endsection
