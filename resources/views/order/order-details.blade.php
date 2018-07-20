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
                  <tr class="">
                    <th class="uk-table-expand">Product name</th>
                    <th class="uk-width-1-6">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- foreach ($list_product as $list) -->
                  <tr>
                    <td>{$product->product_name}}</td>
                    <td>{$product->amount}}</td>
                  </tr>
                  <!-- endforeach -->
                </tbody>
              </table>
            </div>
            <div class="uk-card uk-card-default uk-card-body">
              <div class="uk-grid-match uk-child-width-1-1@m" uk-grid>
                <div>
                  <div class="uk-text-danger">Total price: {$total_price}} ฿</div>
                </div>
              </div>
            </div>
          </div>

          <div class="uk-width-1-2@s">

            <!-- Coupon discount -->
            <div class="uk-card uk-card-default uk-card-body">
              address: asdfasdfasdfasdfasdfasdfasdfdsafdsfdsafsdfasdfa <br>
              tel-number: fdsfadsadfasdfsafdsafdsfasdfasdfasfasfda<br>
              Status:<br>
              <!-- Staff can change status -->
              dropdown
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
