@extends('layouts.dashboard')
@section('main')
    <div class="alert alert-danger text-center">
        <i class="fa fa-warning ml-1"></i>
        {{$message ?? 'سیستم با خطا مواجه شد'}}
        <br>
        {{$extra ?? ''}}
    </div>
    <div class="card bg-dark">
        <div class="card-body text-center">
            <a href="{{url('/home')}}" class="btn btn-light d-md-inline-block d-block m-2">
                <i class="fa fa-dashboard ml-1"></i>
                 داشبورد
             </a>
            <a href="{{url('/')}}" class="btn btn-light d-md-inline-block d-block m-2">
                <i class="fa fa-home ml-1"></i>
                 صفحه اصلی
             </a>
        </div>
    </div>
@endsection
