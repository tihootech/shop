@extends('layouts.dashboard')
@section('main')

    <div class="tile">
        @if ($orders->count())
            <div class="direct-x">

                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col"> ردیف </th>
                            <th scope="col"> حساب کاربری </th>
                            <th scope="col"> استان </th>
                            <th scope="col"> نام سفارش دهنده </th>
                            <th scope="col"> شماره تماس </th>
                            <th scope="col"> وضعیت </th>
                            <th scope="col"> تاریخ سفارش </th>
                            <th scope="col" colspan="2"> عملیات </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $i => $order)
                            <tr>
                                <th scope="row"> {{ $i+1 }} </th>
                                <td> <a href="{{url("users/$order->user_id")}}"> {{ $order->user->name }} </a> </td>
                                <td> {{ $order->province->name ?? '' }} </td>
                                <td> {{ $order->full_name }} </td>
                                <td> {{ $order->phone }} </td>
                                <td> {{ $order->translated_status() }} </td>
                                <td> {{ human_date($order->created_at) }} </td>
                                <td>
                                    <a href="{{url("orders/$order->id")}}" class="btn btn-info"> <i class="fa fa-eye ml-1"></i> مشاهده </a>
                                </td>
                                @if (!admin() && $order->user_id == auth()->id())
                                    <td>
                                        <form action="{{url("#")}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-warning">
                                                <i class="fa fa-credit-card ml-1"></i> پرداخت
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$orders->links()}}

            </div>
        @else
            <div class="alert alert-warning">
                سفارشی یافت نشد.
            </div>
        @endif
    </div>

@endsection
