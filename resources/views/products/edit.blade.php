@extends('layouts.dashboard')
@section('main')

    <div class="row">
        <div class="col-md-10 my-1">
            <h2 class="text-info dinar"> ویرایش محصول </h2>
        </div>
        <div class="col-md-2 my-1">
            <a href="{{url('products')}}" class="btn btn-warning btn-block"> <i class="fa fa-arrow-right ml-1"></i> برگشت </a>
        </div>
    </div>

    <hr>

    <form class="tile" action="{{url("products/$product->id")}}" method="post">

        @csrf
        {{method_field('PUT')}}

        <div class="row">

            <div class="col-md-3 my-2">
                <label for="name"> نام محصول </label>
                <input type="text" id="name" class="form-control" name="name" value="{{$product->name}}" required>
            </div>

            <div class="col-md-3 my-2">
                <label for="price"> قیمت </label>
                <input type="number" id="price" class="form-control" name="price" value="{{$product->price}}" required>
            </div>

            <div class="col-md-3 my-2">
                <label for="discount"> درصد تخفیف </label>
                <input type="number" min="0" max="100" id="discount" class="form-control" name="discount" value="{{$product->discount}}">
            </div>

            <div class="col-md-12 my-2">
                <label for="info"> توضیحات </label>
                <textarea rows="2" id="info" class="form-control" name="info">{{$product->info}}</textarea>
            </div>

        </div>

        @include('partials.submit')

    </form>
@endsection
