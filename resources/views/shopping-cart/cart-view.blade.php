@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container">

    <div class="uk-card uk-card-default uk-card-body">
      <div class="uk-card-title uk-width-1-1">
        {{ __('Shopping cart') }}
      </div>

      <div class="uk-overflow-auto uk-width-1-1">
        <table class="uk-table uk-table-small uk-table-divider">
          <thead>
            <tr>
              <th>Image</th>
              <th>Product name</th>
              <th>Amount</th>
              <th>Price</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <!-- foreach ($list_product as $list) -->
            @foreach ($cart as $product)
              <tr>
                <td>{{$product->product_name}}</td>
                {{-- <td>{{$product[$i]['id']}}</td> --}}
                <td>
                  <a href="#"><span uk-icon="icon: plus-circle"></span></a>
                  <input type="number" style="width: 35px;">
                  <a href="#"><span uk-icon="icon: minus-circle"></span></a>
                </td>
                <td>PRICE</td>
                <td>
                  <button class="uk-button uk-button-danger">Remove</button>
                </td>
              </tr>

            @endforeach


            <!-- endforeach -->
            {{-- <tr>
              <td></td>
              <td></td>
              <td>Total price</td>
              <td>NET PRICE</td>
              <td>
              </td>
            </tr> --}}

          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

@endsection
