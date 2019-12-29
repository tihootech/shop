<div class="tile direct-x">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th> ردیف </th>
                @admin
                    <th> مشتری </th>
                @endadmin
                <th> قیمت کل </th>
                <th> تخفیف کل </th>
                <th> قابل پرداخت </th>
                <th> پرداخت اعتباری </th>
                <th> پرداخت حضوری </th>
                <th> اعتبار هدیه </th>
                <th> تاریخ </th>
                <th colspan="2"> عملیات </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $i => $transaction)
                <tr>
                    <th> {{$i+1}} </th>
                    @admin
                        <td>
                            @if ($transaction->customer)
                                <a href="{{url("customers/$transaction->customer_id")}}">
                                    {{$transaction->customer->name}}
                                </a>
                            @else
                                <em> [مشتری حذف شده] </em>
                            @endif
                        </td>
                    @endadmin
                    <td> {{number_format($transaction->total_sum)}} </td>
                    <td> {{number_format($transaction->total_discount)}} </td>
                    <td> {{number_format($transaction->payable_amount)}} </td>
                    <td> {{number_format($transaction->payable_amount - $transaction->final_payable_amount)}} </td>
                    <td> {{number_format($transaction->final_payable_amount)}} </td>
                    <td> {{number_format($transaction->gift_amount)}} </td>
                    <td title="ساعت : {{$transaction->created_at->toTimeString()}}">
                        {{date_picker_date($transaction->created_at)}}
                    </td>
                    <td>
                        <a href="{{url("transactions/$transaction->id")}}" title="جزییات" data-toggle="tooltip">
                            <i class="fa fa-list one-half"></i>
                        </a>
                    </td>
                    @admin
                        <td>
                            <a href="#" class="text-danger delete" title="حذف" data-toggle="tooltip" data-target="delete-transaction-{{$transaction->id}}">
                                <i class="fa fa-trash one-half"></i>
                            </a>
                            <form class="d-none" action="{{url("transactions/$transaction->id")}}" method="post" id="delete-transaction-{{$transaction->id}}">
                                @csrf
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    @endadmin
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
