@extends('layouts.app')

@section('content')
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
            <tr onclick="window.location.href = '{{route('product-detail',['id'=>$list->product_id])}}';" >
              <a href="{{route('product-detail',['id'=>$list->product_id])}}">
                <td>{{$list->product_id}}</td>
                <td>{{$list->product_name}}</td>
                <td>{{$list->product_description}}</td>
                <td>{{$list->product_price}}</td>
                <td>
                  <a href="{{route('product-edit',['id'=>$list->product_id])}}"><button class="uk-width-1-1 uk-button uk-button-primary uk-button-small">Edit</button></a>
                  {{-- <a href="{{route('product-delete',['id'=>$list->product_id])}}"></a><button class="uk-button uk-button-link ">Delete</button> --}}
                  <form action="{{route('product-delete',['id'=>$list->product_id])}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="uk-width-1-1 uk-button uk-button-link ">Delete</button>
                  </form>
                </td>
              </a>
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
