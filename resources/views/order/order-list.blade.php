@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container">
    <div class="uk-card uk-card-default uk-card-body">

      <div class="uk-card-title uk-width-1-1">
        <h2 class="uk-heading-line uk-text-center"><span>{{ __('Order list') }}</span></h2>
      </div>

      <ul class="uk-tab-bottom" uk-tab>
        <li class="uk-active"><a href="#">Success</a></li>
        <li><a href="#">Delivered</a></li>
      </ul>

      <table class="uk-table uk-table-small uk-table-divider">
        <thead>
          <tr class="">
            <th class="uk-table-shrink">#</th>
            <th class="uk-table-expand">Order ID</th>
            <th class="uk-table-expand">Time</th>
            <th class="uk-width-1-6">------</th>
          </tr>
        </thead>
        <tbody>
          <!-- foreach ($list_product as $list) -->
          <tr>
            <td>1</td>
            <td>{$product->product_name}}</td>
            <td>view details</td>
            <td>view details</td>
          </tr>
          <!-- endforeach -->
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection
