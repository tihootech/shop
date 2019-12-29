@extends('layouts.blue')
@section('content')
    <div class="logo">
        <h1 class="dinar">تیهوتک</h1>
    </div>
    <div class="login-box" style="min-height:500px">
        <form class="login-form" action="{{ url('reset_password') }}" method="post">

            @csrf

            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i> تغییر رمز عبور </h3>
            <p> <i class="fa fa-asterisk text-danger ml-1"></i> در صورتی که کد تایید برای شما ارسال نشد 2 دقیقه دیگر مجددا تلا کنید. </p>

            <div class="form-group">
                <label class="control-label"> <i class="fa fa-barcode ml-1"></i> کد احراز حویت </label>
                <input class="form-control" name="code" type="text" required>
            </div>
            <div class="form-group">
                <label class="control-label"> <i class="fa fa-lock ml-1"></i> رمز عبور جدید </label>
                <input class="form-control" type="password" name="password" required>
            </div>
            <div class="form-group">
                <label class="control-label"> <i class="fa fa-lock ml-1"></i> تکرار رمز عبور جدید </label>
                <input class="form-control" type="password" name="password_confirmation" required>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-check fa-lg fa-fw"></i> تغییر رمز عبور </button>
            </div>
        </form>
    </div>
@endsection
