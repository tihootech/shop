@extends('layouts.dashboard')

@section('main')

    <div class="alert alert-info">
        <i class="fa fa-info-circle fa-2x ml-2"></i>
        پنل Master، جهت تعریف ادمین برای ایجاد فروشگاه جدید.
    </div>

    <div class="tile">
        @include('partials.new_admin_form', ['admin' => new \App\User])
    </div>


@endsection
