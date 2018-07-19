@extends('layouts.app')

@section('content')
  <div class="uk-section">
    <div class="uk-container">

      <div class="uk-card uk-card-default uk-card-body">
        <div class="uk-card-title uk-width-1-1">
          {{ __('Product List') }}
        </div>

        <div class="uk-card-body">
          <div class="uk-grid-medium uk-child-width-1-3@s uk-text-center" uk-grid="masonry: true" uk-height-match="target: > a > .uk-card">
            @foreach ($list_product as $list)
              <a href="{{route('product-detail',['id'=>$list->product_id])}}">
                <div class="uk-card uk-card-default uk-card-hover">
                  <div class="uk-card-media-top">
                    <img src="/image/product/{{$list->product_image}}" alt="">
                  </div>
                  <div class="uk-card-body">
                    <h3 class="uk-card-title">{{$list->product_name}}</h3>
                    <p>{{$list->product_price}}$</p>
                    <p>{{$list->product_description}}
                    </p>
                  </div>
                </div>
              </a>
            @endforeach

          </div>
        </div>

      </div>

    </div>
  </div>
@endsection
