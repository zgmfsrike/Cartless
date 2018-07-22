@extends('layouts.app')

@section('content')
  <div class="uk-section">
    <div class="uk-container">
      <div class="uk-card uk-card-default uk-card-body uk-padding">
        @if(session('validate_success'))
          <div class="uk-width-1-1">
            <div class="uk-alert-primary" uk-alert>
              {{session('validate_success')}}
            </div>
          </div>
        @elseif(session('validate_fail'))
          <div class="uk-width-1-1">
            <div class="uk-alert-danger" uk-alert>
              {{session('validate_fail')}}
            </div>
          </div>
        @endif
        <div class="uk-card-title uk-width-1-1">
          <h2 class="uk-heading-line uk-text-center"><span>{{ __('Checkout Summary') }}</span></h2>
        </div>

        <div class="uk-overflow-auto uk-width-1-1">
          <div class="uk-child-width-1-2@s" uk-grid>
            <div class="uk-width-1-2@s">
              <div class="uk-card uk-card-default uk-card-body uk-margin-left uk-margin-top">
                <table class="uk-table uk-table-small uk-table-divider">
                  <thead>
                    <tr class="">
                      <th class="uk-table-expand">Product name</th>
                      <th class="uk-width-1-6">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- foreach ($list_product as $list) -->
                    @foreach ($cart as $product)
                      <tr>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->amount}}</td>
                      </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="uk-card uk-card-default uk-card-body uk-margin-left uk-margin-top">
                <div class="uk-grid-match uk-child-width-1-1@m" uk-grid>
                  <div class="uk-grid-small" uk-grid>

                    <div class="uk-width-expand" uk-leader="fill: .">Total price:</div>
                    <div class="uk-width-auto">{{$total_price}} ฿</div>
                  </div>
                  @if(Session::has('coupon'))
                    <div class="uk-grid-small uk-text-danger" uk-grid>
                      <div class="uk-width-expand" uk-leader="fill: .">Discount:</div>
                      <div class="uk-width-auto">-   {{ session('coupon.0.coupon_discount') }} ฿</div>
                    </div>

                    <div class="uk-grid-small uk-text-primary" uk-grid>
                      <div class="uk-width-expand" uk-leader="fill: .">Net price:</div>
                      <div class="uk-width-auto">{{$total_price-session('coupon.0.coupon_discount')}} ฿</div>
                    </div>
                  @else
                    <div class="uk-grid-small uk-text-primary" uk-grid>
                      <div class="uk-width-expand" uk-leader="fill: .">Net price:</div>
                      <div class="uk-width-auto">{{$total_price}} ฿</div>
                    </div>
                  @endif



                </div>
              </div>
            </div>

            <div class="uk-width-1-2@s">

              <!-- Coupon discount -->
                @if(Session::has('next-process'))
                @else
                  <div class="uk-card uk-card-default uk-card-body uk-margin-right uk-margin-top">
                    <form class="" action="{{route('validate-coupon')}}" method="post">
                      @csrf
                      <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">{{ __('Coupon code') }}</label>
                        <div class="uk-form-controls">
                          <div class="uk-width-1-1@s">
                            <input id="coupon_code" type="text" class="uk-input {{ $errors->has('coupon_code') ? ' uk-form-danger' : '' }}"   name="coupon_code" required></inout>
                          </div>
                          @if ($errors->has('coupon_code'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('coupon_code') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="uk-margin">
                        <button type="submit" class="uk-button uk-button-primary">Validate</button>
                      </div>
                    </form>
                  </div>

                  <div class="uk-margin uk-margin-right">
                    <a href="{{route('next-process')}}"><button type="submit" class="uk-button uk-button-danger uk-width-1-1">Next >></button></a>
                  </div>

                @endif

              @if(Session::has('next-process'))
                <!-- After has session discount -->
                <div class="uk-card uk-card-default uk-card-body uk-margin-right uk-margin-top">
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
                    <div class="uk-margin uk-margin-right">
                      <button type="submit" class="uk-button uk-button-danger uk-width-1-1">Puechase with <img class="uk-width-small" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/2000px-PayPal.svg.png"></button>
                    </div>
                    <!-- <div class="uk-margin">
                    <button type="submit" class="uk-button uk-button-primary">Submit</button>
                  </div> -->
                </form>
              </div>

              @endif





          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
