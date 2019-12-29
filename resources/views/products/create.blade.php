@extends('layouts.dashboard')
@section('main')

    @include('partials.add')

    <h2 class="text-center text-info"> اضافه کردن محصولات </h2>
    <hr>
    <form class="pb-5" action="{{url("products")}}" method="post">

        @csrf

        <div id="clone-box">

            @for ($i = 0; $i < count( old('name') ?? [''] ); $i++)
                <div class="row tile to-be-cloned">

                    <div class="col-md-3 my-2">
                        <label for="name"> نام محصول </label>
                        <input type="text" id="name" class="form-control" name="name[]" value="{{old('name')[$i]}}" required>
                    </div>

                    <div class="col-md-3 my-2">
                        <label for="price"> قیمت </label>
                        <input type="number" id="price" class="form-control" name="price[]" value="{{old('price')[$i]}}" required>
                    </div>

                    <div class="col-md-3 my-2">
                        <label for="discount"> درصد تخفیف </label>
                        <input type="number" min="0" max="100" id="discount" class="form-control" name="discount[]" value="{{old('discount')[$i] ?? 0}}">
                    </div>

                    <div class="col-md-3 my-2">
                        <label for="status"> وضعیت </label>
                        <select class="form-control" name="status[]" id="status" required>
                            <option @if(old('status')[$i] == 1) selected @endif value="1"> موجود </option>
                            <option @if(old('status')[$i] == -1) selected @endif value="-1"> ناموجود </option>
                        </select>
                    </div>

                    <div class="col-md-11 my-2">
                        <label for="info"> توضیحات </label>
                        <textarea rows="2" id="info" class="form-control" name="info[]">{{old('info')[$i]}}</textarea>
                    </div>

                    @include('partials.remove', ['hidden'=>!old('name')])
                </div>
            @endfor

        </div>

        @include('partials.submit')

    </form>
@endsection
