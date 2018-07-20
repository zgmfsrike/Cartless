@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container">
    <div class="uk-card uk-card-default uk-card-body">
      <div class="uk-card-title uk-width-1-1">
        <h2 class="uk-heading-line uk-text-center"><span>{{ __('Summary') }}</span></h2>
      </div>

      <div class="uk-overflow-auto uk-width-1-1">
        <div class="uk-child-width-1-2@s" uk-grid>
          <div class="uk-width-1-2@s">
            <div class="uk-card uk-card-default uk-card-body">
              <table class="uk-table uk-table-small uk-table-divider">
                <thead>
                  <tr class="">
                    <th class="uk-table-expand">Product name</th>
                    <th class="uk-width-1-6">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- foreach ($list_product as $list) -->
                  <tr>
                    <td>{$product->product_name}}</td>
                    <td>{$product->amount}}</td>
                  </tr>
                  <!-- endforeach -->
                </tbody>
              </table>
            </div>
            <div class="uk-card uk-card-default uk-card-body">
              <div class="uk-grid-match uk-child-width-1-1@m" uk-grid>
                <div>
                  <div class="uk-text-danger">Total price: {$total_price}} ฿</div>
                </div>
              </div>
            </div>
          </div>

          <div class="uk-width-1-2@s">

            <!-- Coupon discount -->
            <div class="uk-card uk-card-default uk-card-body">
              <form class="" action="index.html" method="post">
                <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">{{ __('Coupon code') }}</label>
                  <div class="uk-form-controls">
                    <div class="uk-width-1-1@s">
                      <input id="product_name" type="text" class="uk-input {{ $errors->has('product_name') ? ' uk-form-danger' : '' }}"   name="product_name" required></inout>
                    </div>
                    @if ($errors->has('product_name'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('product_name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="uk-margin">
                  <button type="submit" class="uk-button uk-button-primary">Validate</button>
                </div>
              </form>
            </div>

            <div class="uk-margin">
              <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Next >></button>
            </div>

            <!-- After has session discount -->
            <div class="uk-card uk-card-default uk-card-body">
              <form class="" action="index.html" method="post">
                <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">{{ __('Address') }}</label>
                  <div class="uk-form-controls">
                    <div class="uk-width-1-1@s">
                      <textarea id="product_name" type="text" class="uk-input {{ $errors->has('product_name') ? ' uk-form-danger' : '' }}"   name="product_name" required></textarea>
                    </div>
                    @if ($errors->has('product_name'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('product_name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">{{ __('Tel number') }}</label>
                  <div class="uk-form-controls">
                    <div class="uk-width-2-3@s">
                      <input id="product_name" type="text" class="uk-input {{ $errors->has('product_name') ? ' uk-form-danger' : '' }}"   name="product_name" required>
                    </div>
                    @if ($errors->has('product_name'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('product_name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="uk-margin">
                  <button type="submit" class="uk-button uk-button-primary">Submit</button>
                </div>
              </form>
            </div>

            <div class="uk-margin">
              <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Puechase</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
