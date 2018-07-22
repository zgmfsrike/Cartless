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
          <h3 class="uk-text-danger">Price: {{$product->product_price }} ฿</h3>
          {{-- {{$product->productDiscount->product_discount }} --}}
        </div>

        <div class="uk-margin">
          <div class="content-text">
            {{$product->product_description }}
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
        <div class="uk-margin uk-text-muted uk-flex uk-flex-center">
          <p>Please <a href="{{ route('login') }}"><strong>login</strong></a> to order this product</p>
        </div>
        @endif



        <hr class="uk-divider-icon">
        <h3 class="uk-heading-bullet">Review</h3>
        <p class="uk-text-muted">Overall Rating: <span class="uk-text-danger uk-text-bold">4.3</span></p>
        <div class="review">
          <article class="uk-comment uk-comment-primary">
            <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
              <div class="uk-width-expand">
                <h4 class="uk-comment-title uk-margin-remove uk-heading-bullet">Author</h4>
              </div>
            </header>
            <div class="uk-comment-body">
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
          </article>
          <hr>
          <article class="uk-comment uk-comment-primary">
            <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
              <div class="uk-width-expand">
                <h4 class="uk-comment-title uk-margin-remove uk-heading-bullet">Author</h4>
              </div>
            </header>
            <div class="uk-comment-body">
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
          </article>
          <hr>

        </div>


        <div class="uk-section uk-section-muted uk-padding">
          <form action="">
            <h3 class="uk-heading-bullet">Write your review</h3>

            <textarea class="uk-width-1-1" name="name" rows="8"></textarea>

            <div class="uk-margin">
              <p>Rate this product</p>
              <div class="uk-form-controls">
                <div class="uk-inline uk-width-2-3@s">
                  <div class="stars">
                    <input class="star star-5" id="star-5-2" type="radio" name="star" checked/>
                    <label class="star star-5" for="star-5-2"></label>
                    <input class="star star-4" id="star-4-2" type="radio" name="star"/>
                    <label class="star star-4" for="star-4-2"></label>
                    <input class="star star-3" id="star-3-2" type="radio" name="star"/>
                    <label class="star star-3" for="star-3-2"></label>
                    <input class="star star-2" id="star-2-2" type="radio" name="star"/>
                    <label class="star star-2" for="star-2-2"></label>
                    <input class="star star-1" id="star-1-2" type="radio" name="star"/>
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

      </div>

      @endforeach



    </div>
  </div>
</div>
@endsection
