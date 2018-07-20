@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container">

    <div class="uk-card uk-card-default uk-card-body">
      @foreach ($product as $product)
      <div class="uk-card-title uk-width-1-1">
        <h2 class="uk-heading-bullet">{{$product->product_name }}</h2>
      </div>

      <div class="uk-card-body">

        <div class="uk-margin">
          <div class="uk-child-width-1-1" uk-grid uk-lightbox="animation: fade">
            <div>
              <a class="uk-inline" href="/image/product/{{$product->product_image }}" data-caption="Caption 1">
                <img src="/image/product/{{$product->product_image }}" alt="" class="product-image">
              </a>
            </div>
          </div>
        </div>

        <div class="uk-margin">
          <h3 class="uk-text-danger">Price: {{$product->product_price }} ฿</h3>
          {{-- {{$product->productDiscount->product_discount }} --}}
        </div>

        <div class="uk-margin">
          <h4 class="uk-text-muted">
            {{$product->product_description }}
          </h4>
        </div>

        @if(Auth::user() && Auth::user()->is_staff == 0)
        <hr class="uk-divider-icon">
        <div class="uk-margin">
          <form method="POST" action="{{ route('add-to-cart') }}" class="uk-form-horizontal uk-margin-large uk-flex uk-flex-center">
            @csrf
            <input type="text" name="product_id" placeholder="display: none" value="{{$product->product_id}}" style="display: none" >
            <div class="uk-width-2-3@m uk-child-width-1-5@m" uk-grid>
              <div class="uk-width-1-5@m">
                <label class="uk-form-label" for="form-horizontal-text"><h4>{{ __('Add to cart') }} <span uk-icon="icon: cart"></span></h4></label>
              </div>
              <div class="uk-width-4-5@m">
                <div class="uk-width-1-1@m uk-child-width-1-3@m" uk-grid>
                  <div class="uk-width-2-3@m">
                    <input id="amount" type="number" class="uk-input {{ $errors->has('amount') ? ' uk-form-danger' : '' }}"   name="amount" placeholder="Amount of items" required>
                  </div>
                  <div class="uk-width-1-3@m">
                    <button type="submit" class="uk-button uk-button-danger uk-width-1-1">
                      {{ __('Add') }}
                    </button>
                  </div>
                  @if ($errors->has('amount'))
                  <div class="uk-width-1-1@m">
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </form>
        </div>
        @else
        <hr class="uk-divider-icon">

        <div class="uk-margin">

        </div>
        @endif
        <p>click the stars</p>
        <div class="cont">
          <div class="stars">
            <form action="">
              <input class="star star-5" id="star-5-2" type="radio" name="star"/>
              <label class="star star-5" for="star-5-2"></label>
              <input class="star star-4" id="star-4-2" type="radio" name="star"/>
              <label class="star star-4" for="star-4-2"></label>
              <input class="star star-3" id="star-3-2" type="radio" name="star"/>
              <label class="star star-3" for="star-3-2"></label>
              <input class="star star-2" id="star-2-2" type="radio" name="star"/>
              <label class="star star-2" for="star-2-2"></label>
              <input class="star star-1" id="star-1-2" type="radio" name="star"/>
              <label class="star star-1" for="star-1-2"></label>
            </form>
          </div>
        </div>

      </div>

      @endforeach



    </div>
  </div>
</div>
@endsection
