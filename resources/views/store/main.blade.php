@extends('layouts.essence')
@section('content')

    <section class="welcome_area mb-5 bg-img background-overlay" style="background-image: url({{asset('essence/img/bg-img/bg-1.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">

                </div>
            </div>
        </div>
    </section>

    @if (count($latest))
        @include('store.partials.products_carousel', ['products' => $latest, 'title' => 'آخرین محصولات'])
    @endif

    <div class="container">
        <div class="card mb-5">
            <div class="card-body text-center">
                <a href="{{url("shop")}}" class="dinar btn essence-btn"> مشاهده همه محصولات </a>
            </div>
        </div>
    </div>

@endsection
