@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container">
    <div class="uk-card uk-card-default uk-card-body">

      <div class="uk-width-1-1">
        <div class="uk-alert-primary" uk-alert>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
        </div>
      </div>

      <div class="uk-width-1-1">
        <div class="uk-alert-danger" uk-alert>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
        </div>
      </div>

      <div class="uk-card-title uk-width-1-1">
        <h2 class="uk-heading-line uk-text-center"><span>{{ __('Order Details') }}</span></h2>
      </div>

      <div class="uk-overflow-auto uk-width-1-1">
        <div class="uk-child-width-1-2@s" uk-grid>

          <div class="uk-width-1-2@s">
            <div class="uk-card uk-card-default uk-card-body">
              <table class="uk-table uk-table-small uk-table-divider">
                <thead>
                  <tr class="content-text">
                    <th class="uk-table-expand">Product name</th>
                    <th class="uk-width-1-6">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($order_details as $list)
                  <tr class="content-text">
                    <td>{{$list->product_name}}</td>
                    <td>{{$list->amount}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="uk-card uk-card-default uk-card-body">
              <div class="uk-grid-match uk-child-width-1-1@m" uk-grid>
                <div>
                  <div class="uk-text-danger content-text">Total price: {{$order_details[0]->net_price}} ฿</div>
                </div>
              </div>
            </div>
          </div>

          <div class="uk-width-1-2@s">

            <!-- Coupon discount -->
            <div class="uk-card uk-card-default uk-card-body content-text">
              <div class="uk-text-bold">address: </div>{{$order_details[0]->address}}
              <div class="uk-text-bold">tel-number: </div>{{$order_details[0]->tel_number}}
              <div class="uk-text-bold">Status:</div>
              <!-- Staff can change status -->
              <form action="{{route('change-order-status')}}" method="post">
                @csrf
                <div class="uk-margin">
                  <input style="display: none" name="order_id" value="{{$order_details[0]->order_id}}"></input>
                  <select class="uk-select" name="order_status" >
                    <option value="2" <?php echo ($order_details[0]->order_status === 2) ? "selected" : ""; ?>>Payment Success</option>
                    <option value="3" <?php echo ($order_details[0]->order_status === 3) ? "selected" : ""; ?>>Delivered</option>
                  </select>
                </div>
                <div class="uk-margin">
                  <button class="uk-button uk-button-primary">Save</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
