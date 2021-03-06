@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container">

    <div class="uk-card uk-card-default uk-card-body">
      <div class="uk-card-title uk-width-1-1">
        <h2 class="uk-heading-line uk-text-center"><span>{{ __('Product List') }}</span></h2>
      </div>

      <div class="uk-card-body">
        <div class="uk-grid-medium uk-child-width-1-2@s uk-child-width-1-3@m uk-text-center" uk-grid="masonry: true" uk-height-match="target: > a > .uk-card">
          @foreach ($list_product as $list)
          <a href="{{route('product-detail',['id'=>$list->product_id])}}">
            <div class="uk-card uk-card-default uk-card-hover" uk-scrollspy="cls:uk-animation-fade; repeat: true">
              <div class="uk-card-media-top">
                <div class="uk-height-medium">
                  <div class="uk-height-1-1 uk-background-cover uk-light uk-flex uk-flex-top" uk-parallax="bgy: -40" style="background-image: url('/image/product/{{$list->product_image}}');">
                    <!-- <h3 class="uk-width-1-1 uk-overlay uk-overlay-primary uk-text-center uk-margin-auto uk-margin-auto-vertical" uk-parallax="y: 120,100">
                    {{$list->product_name}}
                  </h3> -->
                </div>
              </div>
            </div>
            <div class="uk-card-body uk-text-left content-text">
              <p class="uk-text-break uk-text-lead">{{$list->product_name}}</p>
              <p class="uk-text-danger">Price:
                @if(isset($list->productDiscount->product_discount))
                <s>{{$list->product_price}} ฿</s>
                <strong>{{$list->product_price * (100 - $list->productDiscount->product_discount) / 100 }} ฿</strong>
                <br>
                <span class="uk-text-muted">discount {{$list->productDiscount->product_discount}}% off</span>
                @else
                {{$list->product_price}} ฿
                @endif
              </p>
              <p class="uk-text-muted uk-text-truncate">{{$list->product_description}}</p>
              <p class="uk-flex uk-flex-right uk-text-primary">{{__('Click for more details')}}</p>
            </div>
          </div>
        </a>
        @endforeach
      </div>
      {{ $list_product->links() }}
    </div>
  </div>
</div>
@endsection
