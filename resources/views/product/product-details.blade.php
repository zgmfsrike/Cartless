@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container">

    <div class="uk-card uk-card-default uk-card-body">
      @foreach ($product as $product)
      <div class="uk-card-title uk-width-1-1">
        <h2 class="uk-heading-bullet">{{$product->product_name }}</h2>
      </div>

      <div class="uk-card-body content-text">

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
          @if(isset($product->productDiscount->product_discount))
          <h3 class="uk-text-danger">Price:
            <s>{{$product->product_price}} ฿</s>
            <strong>{{$product->product_price * (100 - $product->productDiscount->product_discount) / 100 }} ฿</strong>
            <span class="uk-text-muted">discount {{$product->productDiscount->product_discount}}% off</span>
          </h3>

          @else
          <h3 class="uk-text-danger">Price: {{$product->product_price}} ฿</h3>
          @endif
        </div>

        <div class="uk-margin">
          <div class="content-text">
            <span style="width:100%; word-wrap:break-word; display:inline-block; white-space: pre-wrap;">{{$product->product_description }}</span>
          </div>
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
                    <input id="amount" type="number" class="uk-input {{ $errors->has('amount') ? ' uk-form-danger' : '' }}" name="amount" placeholder="Amount of items" min="1" value="1" required>
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
        @elseif(Auth::user() && Auth::user()->is_staff == 1)
        <hr class="uk-divider-icon">
        <form action="{{route('product-set-discount')}}" method="post">
          @csrf
          <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">{{ __('Set Discount (%)') }}</label>
            <div class="uk-form-controls">
              <div class="uk-inline uk-width-2-3@s">
                <input type="text" name="product_id" placeholder="display: none" value="{{$product->product_id}}" style="display: none" >
                <input id="discount" type="number" class="uk-input uk-width-1-3 {{ $errors->has('discount') ? ' uk-form-danger' : '' }}"  name="discount" value="{{ old('discount') }}" required>
              </div>
            </div>
            @if ($errors->has('discount'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('discount') }}</strong>
            </span>
            @endif
          </div>
          <button class="uk-button uk-button-primary" type="submit">Save</button>
        </form>
        @else
        <hr class="uk-divider-icon">
        <div class="uk-margin uk-text-muted uk-flex uk-flex-center">
          <p>Please <a href="{{ route('login') }}"><strong>login</strong></a> to order this product</p>
        </div>
        @endif

        <hr class="uk-divider-icon">
        <h3 class="uk-heading-bullet">Review</h3>
        <p class="uk-text-muted">Overall Rating: <span class="uk-text-danger uk-text-bold">{{$rating}}</span></p>
        <div class="review">
          @foreach ($reviews as $review)

          <article class="uk-comment uk-comment-primary">
            <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
              <div class="uk-width-expand">
                <h4 class="uk-comment-title uk-margin-remove uk-heading-bullet">{{$review->user->firstname}}</h4>
              </div>
            </header>
            <div class="uk-comment-body">
              <p>{{$review->review_context}}</p>
            </div>
          </article>
          <hr>
          @endforeach
        </div>

        @if(Auth::user() && Auth::user()->is_staff == 0)
        <div class="uk-section uk-section-muted uk-padding">
          <form action="{{route('review',['product_id'=>$product_id])}}" method="POST">
            @csrf
            <h3 class="uk-heading-bullet">Write your review</h3>
            <textarea class="uk-width-1-1 uk-textarea" name="review_context" rows="4" required></textarea>
            <div class="uk-margin">
              <p>Rate this product</p>
              <div class="uk-form-controls">
                <div class="uk-inline uk-width-2-3@s">
                  <div class="stars">
                    <input class="star star-5" id="star-5-2" type="radio" value=5 name="rating" checked/>
                    <label class="star star-5" for="star-5-2"></label>
                    <input class="star star-4" id="star-4-2" type="radio" value=4 name="rating"/>
                    <label class="star star-4" for="star-4-2"></label>
                    <input class="star star-3" id="star-3-2" type="radio" value=3 name="rating"/>
                    <label class="star star-3" for="star-3-2"></label>
                    <input class="star star-2" id="star-2-2" type="radio" value=2 name="rating"/>
                    <label class="star star-2" for="star-2-2"></label>
                    <input class="star star-1" id="star-1-2" type="radio" value=1 name="rating"/>
                    <label class="star star-1" for="star-1-2"></label>
                  </div>
                </div>
              </div>
            </div>

            <div class="">
              <button type="submit" class="uk-button uk-button-primary">
                {{ __('Submit') }}
              </button>
            </div>
          </form>
        </div>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
