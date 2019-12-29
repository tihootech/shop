@extends('layouts.essence')
@section('content')

    <div class="page-title pt-5 text-center">
        <h2>نهایی سازی و پرداخت</h2>
        @guest
            <p> لطفا فرم زیر را تکمیل کنید. در صورتی که قبلا حساب کاربری ایجاد کرده اید مشخصات آن را وارد کنید. در غیر اینصورت یک حساب جدید بسازید.</p>
        @endguest
    </div>

    <div class="container">
        @include('partials.errors')
        @include('partials.flash')
    </div>

    <div class="container">
        <div class="row">
            @guest
                <div class="col-md-6">
                    <h6 class="text-primary"> راه اول : ورود به حساب کاربری </h6>
                    <p> درصورتی که قبلا حساب کاربری ساخته اید، شماره تماس و رمزعبور خود را وارد کنید، و روی دکمه ورود کلیک کنید. </p>
                    <form action="{{url('store/login')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone"> شماره تماس </label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password"> رمزعبور </label>
                                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" required>
                            </div>
                            <div class="col-md-4 mr-auto ml-auto">
                                <button type="submit" class="btn essence-btn"> ورود </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h6 class="text-primary"> راه دوم : ایجاد حساب کاربری </h6>
                    <p> یا اینکه میتوانید حساب کاربری جدید ایجاد کرده و به آن وارد شوید. </p>
                    <form action="{{url('store/register')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name"> نام کاربری </label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone"> شماره تماس </label>
                                <input type="phone" class="form-control" id="phone" name="phone" value="{{old('phone')}}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password"> رمزعبور </label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation"> تکرار رمزعبور </label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            <div class="col-md-4 mr-auto ml-auto">
                                <button type="submit" class="btn essence-btn"> ایجاد حساب و ورود </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endguest
        </div>
    </div>

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <form id="checkout-form" method="post" action="{{url('store/checkout')}}">

                            @csrf

                            @auth
                                <p class="text-center"> شما درحال خرید با حساب کاربری <b> {{auth()->user()->name}} </b> هستید.</p>
                            @endauth
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="full_name">نام و نام خانوادگی <span>*</span></label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{old('full_name')}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone">شماره تماس <span>*</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{old('phone') ?? auth()->user()->phone ?? null}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state"> استان <span>*</span></label>
                                    <select class="w-100" id="state" name="state">
                                        <option value=""> -- انتخاب کنید -- </option>
                                        @foreach ($states as $state)
                                            <option @if(old('state') == $state->id) selected @endif value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="postcode">کدپستی <span>*</span></label>
                                    <input type="text" class="form-control" id="postcode" name="postcode" value="{{old('postcode')}}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="address">آدرس <span>*</span></label>
                                    <textarea id="address" class="form-control" name="address" required>{{old('address')}}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description">توضیحات</label>
                                    <textarea id="description" class="form-control" name="description">{{old('description')}}</textarea>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 ml-md-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5> سفارش شما </h5>
                            <p> جزییات سفارش </p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li class="text-primary"> <span>نام محصول</span> <span>تخفیف</span> <span>تعداد</span> <span>قابل پرداخت</span> </li>
                            @foreach ($products as $id => $array)
                                <li>
                                    <span> {{$array['product']->name}} </span>
                                    <span> {{$array['product']->discount}}% </span>
                                    <span> {{$array['count']}} </span>
                                    <span> {{ toman($array['product']->cost() * $array['count']) }} </span>
                                </li>
                            @endforeach
                            <li> <span>مجموع</span> <span>{{toman(cart_sum())}}</span> </li>
                        </ul>


                        @if (!auth()->id())
                            <p class="text-danger">
                                <i class="fa fa-warning ml-1"></i>
                                <b> برای پرداخت نیاز هست که ابتدا وارد حساب کاربری خود شوید </b>
                            </p>
                        @endif
                        <button type="submit" form="checkout-form" class="btn essence-btn"
                            @if (!auth()->id())
                                disabled
                            @endif
                        > پرداخت </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
