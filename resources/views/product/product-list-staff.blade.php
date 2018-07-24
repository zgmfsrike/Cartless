@extends('layouts.app')

@section('content')
<script type="text/javascript">
function delete_product(id){
  UIkit.modal.confirm('Are you sure to delete this product?').then(function () {
    defaultAction = "{{route('product-delete-default')}}";
    console.log(defaultAction);
    document.getElementById('delete_product').action = defaultAction + "/" + id;
    document.getElementById('delete_product').submit()
    console.log('Confirmed.')
  }, function () {
    console.log('Rejected.')
  });
}
</script>

<form action="/" method="POST" id="delete_product">
  @csrf
  <!-- <button type="submit" class="uk-button uk-button-danger">Remove</button> -->
</form>

<div class="uk-section">
  <div class="uk-container">

    <div class="uk-card uk-card-default uk-card-body">
      <div class="uk-card-title uk-width-1-1">
        <h2 class="uk-heading-line uk-text-center"><span>{{ __('Product List') }}</span></h2>
        <a href="/product-add"><button class="uk-button uk-button-primary uk-float-right">Add more product</button></a>
      </div>

      <div class="uk-overflow-auto uk-width-1-1">
        <table class="uk-table uk-table-small uk-table-divider uk-table-hover">
          <thead>
            <tr>
              <th>Product ID</th>
              <th>Product name</th>
              <th>Description</th>
              <th>Price</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_product as $list)
            <tr>
              <td onclick="window.location.href = '{{route('product-detail',['id'=>$list->product_id])}}';" class="uk-table-shrink">{{$list->product_id}}</td>
              <td onclick="window.location.href = '{{route('product-detail',['id'=>$list->product_id])}}';">{{$list->product_name}}</td>
              <td onclick="window.location.href = '{{route('product-detail',['id'=>$list->product_id])}}';" class="uk-text-truncate">{{$list->product_description}}</td>
              <td onclick="window.location.href = '{{route('product-detail',['id'=>$list->product_id])}}';">
                @if(isset($list->productDiscount->product_discount))
                <s>{{$list->product_price}} ฿</s>
                <strong>{{$list->product_price * (100 - $list->productDiscount->product_discount) / 100 }} ฿</strong>
                @else
                {{$list->product_price}} ฿
                @endif
              </td>
              <td>
                <a href="{{route('product-edit',['id'=>$list->product_id])}}"><button class="uk-width-1-1 uk-button uk-button-primary uk-button-small">Edit</button></a>
                {{-- <a href="{{route('product-delete',['id'=>$list->product_id])}}"></a><button class="uk-button uk-button-link ">Delete</button> --}}
                <!-- <form action="{{route('product-delete',['id'=>$list->product_id])}}" method="post"> -->
                <!-- @csrf -->
                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                <button onclick="delete_product({{$list->product_id}});" class="uk-width-1-1 uk-button uk-button-link uk-text-danger">Delete</button>
                <!-- </form> -->
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
      {{ $list_product->links() }}
    </div>
  </div>
</div>

@endsection
