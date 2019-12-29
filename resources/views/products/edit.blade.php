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

    <form action="{{url("products/$product->id")}}" method="post">

        @csrf
        {{method_field('PUT')}}

        <div class="row">

            <div class="col-md-3 my-2">
                <label for="sell-type"> نوع فروش </label>
                <select class="form-control" name="sell_type" id="sell-type" required>
                    <option @if($product->sell_type == 'times') selected @endif value="times"> دانه&zwnj;ای </option>
                    {{-- <option @if($product->sell_type == 'kg') selected @endif value="kg"> کیلویی </option> --}}
                    {{-- <option @if($product->sell_type == 'gr') selected @endif value="gr"> گرمی </option> --}}
                </select>
            </div>

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

            <div class="col-md-3 my-2">
                <label for="hot"> جز محصولات داغ باشد؟ </label>
                <select class="form-control" name="hot" id="hot" required>
                    <option value="0"> خیر </option>
                    <option @if($product->hot) selected @endif value="1"> بلی </option>
                </select>
            </div>

            @if (count($final_cats))
                <div class="col-md-6 my-2">
                    <label for="cat-id"> دسته بندی </label>
                    <select class="select2" name="category_id" id="cat-id" required>
                        <option value="0"> -- انتخاب کنید -- </option>
                        @foreach ($final_cats as $cat)
                            <option @if($product->category_id == $cat->id) selected @endif value="{{$cat->id}}"> {{$cat->breadcrumb()}} </option>
                        @endforeach
                    </select>
                </div>
            @else
                <input type="hidden" name="category_id" value="0">
            @endif

            <div class="col-md-12 my-2">
                <label for="info"> توضیحات </label>
                <textarea rows="2" id="info" class="form-control" name="info">{{$product->info}}</textarea>
            </div>

        </div>

        @include('partials.submit')

    </form>
@endsection
