@extends('layouts.app')

@section('content')
  <div class="uk-section">
    <div class="uk-container">

      <div class="uk-card uk-card-default uk-card-body">
        @foreach ($product as $product)
          <div class="uk-card-title uk-width-1-1">
            {{$product->product_name }}
          </div>

          <div class="uk-card-body">

            <div class="uk-margin">
              <img src="" alt="" class="">
            </div>

            <div class="uk-margin">
                {{$product->product_price }}
                {{-- {{$product->productDiscount->product_discount }} --}}
            </div>

            <div class="uk-margin">
              {{$product->product_description }}
              </div>

              <div class="uk-margin">
                <form method="POST" action="{{ route('add-to-cart') }}" class="uk-form-horizontal uk-margin-large">
                  @csrf
                  <input type="text" name="product_id" placeholder="display: none" value="{{$product->product_id}}" style="display: none" disabled>

                  <label class="uk-form-label" for="form-horizontal-text">{{ __('Amount') }}</label>
                  <div class="uk-form-controls">
                    <div class="uk-width-2-3@s">
                      <input id="amount" type="number" class="uk-input {{ $errors->has('amount') ? ' uk-form-danger' : '' }}"   name="amount" placeholder="Amount of items" required>
                    </div>
                    @if ($errors->has('amount'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('amount') }}</strong>
                      </span>
                    @endif
                  </div>
                  <button type="submit" class="uk-button uk-button-danger">
                    {{ __('Order') }}
                  </button>
                </form>
              </div>

            </div>

          @endforeach



        </div>
      </div>
    </div>
  @endsection
