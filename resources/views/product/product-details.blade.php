@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container">

    <div class="uk-card uk-card-default uk-card-body">

      <div class="uk-card-title uk-width-1-1">
        {{ __('Product name') }}
      </div>

      <div class="uk-card-body">

        <div class="uk-margin">
          <img src="" alt="" class="">
        </div>

        <div class="uk-margin">
          {{ __('Price: ') }}
        </div>

        <div class="uk-margin">
          {{ __('Product description Product description Product description Product description
          Product description Product description Product description Product description') }}
        </div>

        <div class="uk-margin">
          <form method="POST" action="{{ route('login') }}" class="uk-form-horizontal uk-margin-large">

            <input type="text" name="product_id" placeholder="display: none">

            <label class="uk-form-label" for="form-horizontal-text">{{ __('Amount') }}</label>
            <div class="uk-form-controls">
              <div class="uk-width-2-3@s">
                <input id="price" type="number" class="uk-input {{ $errors->has('amount') ? ' uk-form-danger' : '' }}"   name="amount" placeholder="Amount of items" required>
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

    </div>
  </div>
</div>
@endsection
