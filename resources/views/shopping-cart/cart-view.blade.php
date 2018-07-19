@extends('layouts.app')

@section('content')
<script type="text/javascript">
function remove_item(index){
  UIkit.modal.confirm('Are you sure to remove this item?').then(function () {
    defaultAction = "{{route('cart-remove-item-default')}}";
    console.log(defaultAction);
    document.getElementById('remove_item').action = defaultAction + "/" + index;
    document.getElementById('remove_item').submit()
    console.log('Confirmed.')
  }, function () {
    console.log('Rejected.')
  });
}
</script>

<form action="/" method="POST" id="remove_item">
  @csrf
  <!-- <button type="submit" class="uk-button uk-button-danger">Remove</button> -->
</form>

<div class="uk-section">
  <div class="uk-container">

    <div class="uk-card uk-card-default uk-card-body">
      <div class="uk-card-title uk-width-1-1">
        <h2 class="uk-heading-line uk-text-center"><span>{{ __('Shopping cart') }}</span></h2>
      </div>



      <div class="uk-overflow-auto uk-width-1-1">
        <table class="uk-table uk-table-small uk-table-divider">
          <thead>
            <tr class="">
              <th class="uk-table-shrink">Image</th>
              <th class="uk-table-expand">Product name</th>
              <th class="uk-width-1-6">Amount</th>
              <th class="uk-width-1-6">Price</th>
              <th class="uk-table-shrink"></th>
            </tr>
          </thead>
          <tbody>
            <!-- foreach ($list_product as $list) -->
            @foreach ($cart as $i=>$product)
            <tr>
              <td><img class="uk-preserve-width" src="/image/product/{{$product->product_image}}" width="80" alt="" style="max-height: 100px; max-width: 100px;"></td>
              <td>{{$product->product_name}}</td>

              <td>
                <a onclick="event.preventDefault();
                document.getElementById('increase-form-{{$i}}').submit();">
                <span uk-icon="icon: plus-circle"></span></a>
                <input type="text" style="width: 35px;" value="{{$product->amount}}" disabled>
                <a onclick="event.preventDefault();
                document.getElementById('decrease-form-{{$i}}').submit();">
                <span uk-icon="icon: minus-circle"></span></a>
                <form id="increase-form-{{$i}}" action="{{ route('cart-increase-item',['index'=>$i]) }}" method="POST">
                  @csrf
                </form>
                <form id="decrease-form-{{$i}}" action="{{ route('cart-decrease-item',['index'=>$i]) }}" method="POST">
                  @csrf
                </form>
              </td>
              <td>{{$product->product_price}} ฿</td>
              <td>
                <!-- <form action="{{route('cart-remove-item',['index'=>$i])}}" method="POST"> -->
                  <!-- @csrf -->
                  <button class="uk-button uk-button-danger" onclick="remove_item({{$i}});">Remove</button>
                <!-- </form> -->
              </td>
            </tr>

            @endforeach


            <!-- endforeach -->
            <tr class="uk-text-danger">
              <td></td>
              <td></td>
              <td>Total price</td>
              <td>{{$total_price}} ฿</td>
              <td>
              </td>
            </tr>

          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

@endsection
