@extends('layouts.blue')
@section('content')
    <div class="logo">
        <h1 class="dinar">تیهوتک</h1>
    </div>
    <div class="login-box" style="min-height:525px">
        <form class="login-form" action="{{ route('register') }}" method="post">

            @csrf

            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user-plus"></i> ایجاد حساب </h3>
            <div class="form-group">
                <label class="control-label">
                    <i class="fa fa-user ml-1"></i> نام کاربری
                    @if ($errors->has('name'))
                        <span class="text-danger mr-1" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </label>
                <input class="form-control" name="name" type="text" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label class="control-label">
                    <i class="fa fa-phone ml-1"></i> شماره تماس
                    @if ($errors->has('phone'))
                        <span class="text-danger mr-1" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </label>
                <input class="form-control" name="phone" type="text" value="{{ old('phone') }}" required>
            </div>
            <div class="form-group">
                <label class="control-label">
                    <i class="fa fa-lock ml-1"></i> رمز عبور
                    @if ($errors->has('password'))
                        <span class="text-danger mr-1" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </label>
                <input class="form-control" type="password" name="password" required>
            </div>
            <div class="form-group">
                <label class="control-label"> <i class="fa fa-lock ml-1"></i> تکرار رمز عبور </label>
                <input class="form-control" type="password" name="password_confirmation" required>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-user-plus fa-lg fa-fw"></i> ایجاد حساب کاربری </button>
            </div>
            <div class="text-center mt-3">
                <p class="semibold-text mb-2">
                    <a href="{{url("login")}}"> <i class="fa fa-sign-in ml-1"></i> ورود به حساب </a>
                </p>
            </div>
        </form>
    </div>
@endsection
