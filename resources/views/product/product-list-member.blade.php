@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container">

    <div class="uk-card uk-card-default uk-card-body">
      <div class="uk-card-title uk-width-1-1">
        {{ __('Product List') }}
      </div>

      <div class="uk-card-body">
        <div class="uk-grid-medium uk-child-width-1-3@s uk-text-center" uk-grid="masonry: true" uk-height-match="target: > div > .uk-card">

          <div>
            <div class="uk-card uk-card-default uk-card-hover">
              <div class="uk-card-media-top">
                <img src="../docs/images/light.jpg" alt="">
              </div>
              <div class="uk-card-body">
                <h3 class="uk-card-title">Product name</h3>
                <p>Price : 300000 $</p>
                <p>product description product description product description product description
                  product description product description  product description
                  product description product description product description product description
                </p>
              </div>
            </div>
          </div>
          <div>
            <div class="uk-card uk-card-default uk-card-hover">
              <div class="uk-card-media-top">
                <img src="../docs/images/light.jpg" alt="">
              </div>
              <div class="uk-card-body">
                <h3 class="uk-card-title">Product name</h3>
                <p>Price : 300000 $</p>
                <p>product description product description product description product description
                  product description product description  product description
                  product description product description product description product description
                </p>
              </div>
            </div>
          </div><div>
            <div class="uk-card uk-card-default uk-card-hover">
              <div class="uk-card-media-top">
                <img src="../docs/images/light.jpg" alt="">
              </div>
              <div class="uk-card-body">
                <h3 class="uk-card-title">Product name</h3>
                <p>product description product description product description product description
                  product description product description  product description
                  product description product description product description product description
                </p>
              </div>
            </div>
          </div><div>
            <div class="uk-card uk-card-default uk-card-hover">
              <div class="uk-card-media-top">
                <img src="../docs/images/light.jpg" alt="">
              </div>
              <div class="uk-card-body">
                <h3 class="uk-card-title">Product name</h3>
                <p>product description product description product description product description
                  product description product description  product description
                  product description product description product description product description
                </p>
              </div>
            </div>
          </div><div>
            <div class="uk-card uk-card-default uk-card-hover">
              <div class="uk-card-media-top">
                <img src="../docs/images/light.jpg" alt="">
              </div>
              <div class="uk-card-body">
                <h3 class="uk-card-title">Product name</h3>
                <p>product description product description product description product description
                  product description product description  product description
                  product description product description product description product description
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
</div>
@endsection
