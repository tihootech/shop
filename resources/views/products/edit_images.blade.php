@extends('layouts.dashboard')
@section('main')

    @include('partials.add')

    <div class="row">
        <div class="col-md-10 my-1">
            <h2 class="text-info dinar"> مدیریت تصاویر "{{$product->name}}" </h2>
        </div>
        <div class="col-md-2 my-1">
            <a href="{{url('products')}}" class="btn btn-warning btn-block"> <i class="fa fa-arrow-right ml-1"></i> برگشت </a>
        </div>
    </div>

    <hr>

    <div class="tile">
        <p class="lead"> تصاویر قبلی </p>
        @if (count($product->images))
            <div class="direct-x">
                @foreach ($product->images as $image)
                    <div class="card d-inline-block">
                        <img src="{{asset($image->path)}}" alt="{{$image->title}}" width="120px">
                        <div class="card-body text-center">
                            <a class="text-danger mx-1 pointer delete" data-target="delete-image-{{$image->id}}">
                                <i class="fa fa-trash fa-2x"></i>
                            </a>
                        </div>
                    </div>
                    <form class="d-none" id="delete-image-{{$image->id}}" action="{{url("products/images/$image->id")}}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                    </form>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">
                هیچ تصویری یافت نشد.
            </div>
        @endif
    </div>

    <p class="lead"> بارگذاری تصاویر جدید </p>

    <form class="pb-5" action="{{url("products/images/$product->id")}}" method="post" enctype="multipart/form-data">

        @csrf

        <div id="clone-box">
            <div class="row to-be-cloned">
                <div class="col-md-4 my-2 ml-auto mr-auto">
                    <label for="path"> انتخاب تصویر </label>
                    <input type="file" id="path" class="form-control" name="path[]" required>
                </div>
                @include('partials.remove', ['hidden'=>true])
                <hr class="col-12">
            </div>
        </div>

        @include('partials.submit')

    </form>
@endsection
