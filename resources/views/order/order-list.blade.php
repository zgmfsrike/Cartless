@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container">
    <div class="uk-card uk-card-default uk-card-body">

      <div class="uk-card-title uk-width-1-1">
        <h2 class="uk-heading-line uk-text-center"><span>{{ __('Order list') }}</span></h2>
      </div>

      <table class="uk-table uk-table-small uk-table-divider uk-table-hover">
        <thead>
          <tr class="">
            <th class="uk-table-shrink">#</th>
            <th class="uk-table-expand">Order ID</th>
            <th class="uk-table-expand">Date</th>
            <th class="uk-table-expand">Customer Name</th>
            <th class="uk-table-expand">Net Price</th>
            <th class="uk-table-expand">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list_order as $index=>$order)
          <tr onclick="window.location.href = '{{route('order-details',['order_id'=>$order->order_id])}}';">
            <td>{{$index+1}}</td>
            <td>{{$order->order_id}}</td>
            <td>{{$order->order_date}}</td>
            <td>{{$order->firstname}}</td>
            <td>{{$order->net_price}} ฿</td>
            @if( $order->order_status == 1 )
            <td class="uk-text-muted">{{__('Payment Fail')}}</td>
            @elseif ( $order->order_status == 2 )
            <td class="uk-text-danger">{{__('Payment Success')}}</td>
            @elseif ( $order->order_status == 3 )
            <td class="uk-text-primary">{{__('Ordered')}}</td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection
