@extends('layouts.dashboard')

@section('main')

    <div class="alert alert-info">
        <i class="fa fa-info-circle fa-2x ml-2"></i>
        پنل Master، جهت تعریف ادمین برای ایجاد فروشگاه جدید.
    </div>

    <div class="tile">
        <form class="row justify-content-center" action="{{url('new_admin')}}" method="post">
            @csrf
            <div class="col-lg-4 col-md-8">
                <div class="form-group">
                    <label for="name"> نام </label>
                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="form-group">
                    <label for="phone"> شماره تماس </label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="form-group">
                    <label for="pwd"> رمزعبور </label>
                    <input type="text" class="form-control" name="pwd" id="pwd" value="{{old('pwd')}}">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-plus ml-1"></i> تعریف ادمین جدید </button>
            </div>
        </form>
    </div>


@endsection
