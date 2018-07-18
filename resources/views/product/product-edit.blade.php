@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container">

    <div class="uk-card uk-card-default uk-card-body">
      <div class="uk-card-title uk-width-1-1">
        {{ __('Edit Product') }}
      </div>


      <div class="uk-card-body">

        <form method="POST" action="{{ route('product-update',['id'=>1]) }}" class="uk-form-horizontal uk-margin-large">
          @csrf
          @foreach ($product as $product)
            <div class="uk-margin">

              <label class="uk-form-label" for="form-horizontal-text">{{ __('Product name') }}</label>
              <div class="uk-form-controls">
                <div class="uk-width-2-3@s">
                  <input id="product_name" type="text" class="uk-input {{ $errors->has('product_name') ? ' uk-form-danger' : '' }}"   name="product_name" value="{{$product->product_name}}"required>
                </div>
                @if ($errors->has('product_name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('product_name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">{{ __('Description') }}</label>
              <div class="uk-form-controls">
                <div class="uk-width-2-3@s">
                  <textarea id="description" class="uk-textarea {{ $errors->has('description') ? ' uk-form-danger' : '' }}"
                    rows="5" placeholder="Description" name="description" required>{{$product->product_description}}</textarea>
                  </div>
                  @if ($errors->has('description'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-text">{{ __('Price') }}</label>
                <div class="uk-form-controls">
                  <div class="uk-width-2-3@s">
                    <input id="price" type="number" class="uk-input {{ $errors->has('price') ? ' uk-form-danger' : '' }}"   name="price" required value="{{$product->product_price}}">
                  </div>
                  @if ($errors->has('price'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('price') }}</strong>
                  </span>
                  @endif
                </div>
              </div>


              <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-text">{{ __('Image') }}</label>
                <img src="/image/product/{{$product->product_image}}" alt="">
                <div class="uk-form-controls">
                  <div class="uk-width-2-3@s">
                    <div uk-form-custom>
                      <input class="uk-input uk-form-width-medium" type="text" placeholder="Image" value="" disabled>
                        <input type="file" name="product_image" accept="image/*">
                      <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
                    </div>
                  </div>
                  @if ($errors->has('image'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('image') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

          @endforeach



            <button type="submit" class="uk-button uk-button-primary">
              {{ __('Save') }}
            </button>

          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection
