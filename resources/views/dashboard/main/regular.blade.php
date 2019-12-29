@extends('layouts.dashboard')

@section('main')

    <div class="row text-center">

        <div class="jumbotron m-auto">
            <h2> به حساب کاربری خود خوش آمدید! </h2>
            <p class="lead"></p>
            <hr class="my-4">
            <p> از منوی زیر میتوانید برای دسترسی سریع استفاده کنید </p>
            <p class="lead">
                <a class="btn btn-primary my-1 btn-lg" href="{{url("orders")}}">
                    <i class="fa fa-list ml-1"></i>
                    لیست سفارشات
                </a>
                <a class="btn btn-primary my-1 btn-lg" href="{{url("users/".auth()->id())}}">
                    <i class="fa fa-user ml-1"></i>
                    حساب کاربری
                </a>
            </p>
        </div>

    </div>



@endsection
