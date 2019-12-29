@extends('layouts.dashboard')
@section('main')


    <div class="row">
        <div class="col-md-10 my-1">
            <h2 class="text-info dinar"> مشاهده سفارش </h2>
        </div>
        <div class="col-md-2 my-1">
            <a href="{{url('orders')}}" class="btn btn-warning btn-block"> <i class="fa fa-arrow-right ml-1"></i> برگشت </a>
        </div>
    </div>
    <hr>
    <div class="tile">

        <div class="direct-x">

            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col"> ردیف </th>
                        <th scope="col"> نام محصول </th>
                        <th scope="col"> تخفیف </th>
                        <th scope="col"> تعداد </th>
                        <th scope="col"> مبلغ تخفیف </th>
                        <th scope="col"> قابل پرداخت </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $i => $product)
                        <tr>
                            <th scope="row"> {{ $i+1 }} </th>
                            <td> {{ $product->name }} </td>
                            <td> {{ $product->discount }} </td>
                            <td> {{ $product->count }} </td>
                            <td> {{ toman($product->discount_amount) }} </td>
                            <td> {{ toman($product->payable_amount) }} </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4"></td>
                        <th class="bg-dark text-white"> مجموع </th>
                        <th class="bg-dark text-white"> {{toman($product->sum('payable_amount'))}} </th>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

@endsection
