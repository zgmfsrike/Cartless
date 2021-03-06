@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container uk-container-small">
    <div class="col-md-8">
      <div class="uk-card uk-card-default uk-card-body">
        <div class="uk-card-title">{{ __('Register') }}</div>

        <div class="uk-card-body">

          <form method="POST" action="{{ route('register') }}" class="uk-form-horizontal uk-margin-large">
            @csrf

            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">{{ __('E-Mail') }}</label>
              <div class="uk-form-controls">
                <div class="uk-inline uk-width-2-3@s">
                  <span class="uk-form-icon" uk-icon="icon: mail"></span>
                  <input id="email" type="email" class="uk-input uk-width-1-1 {{ $errors->has('email') ? ' uk-form-danger' : '' }}"  name="email" value="{{ old('email') }}" required autofocus>
                </div>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">{{ __('Password') }}</label>
              <div class="uk-form-controls">
                <div class="uk-inline uk-width-2-3@s">
                  <span class="uk-form-icon" uk-icon="icon: lock"></span>
                  <input id="password" type="password" class="uk-input uk-width-1-1 {{ $errors->has('password') ? ' uk-form-danger' : '' }}"   name="password" required>
                </div>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">{{ __('Password Confirmation') }}</label>
              <div class="uk-form-controls">
                <div class="uk-width-2-3@s">
                  <input id="password_confirmation" type="password" class="uk-input {{ $errors->has('password') ? ' uk-form-danger' : '' }}"   name="password_confirmation" required>
                </div>
              </div>
            </div>

            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">{{ __('Firstname') }}</label>
              <div class="uk-form-controls">
                <div class="uk-width-2-3@s">
                  <input id="firstname" type="text" class="uk-input {{ $errors->has('firstname') ? ' uk-form-danger' : '' }}"   name="firstname" required>
                </div>
                @if ($errors->has('firstname'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('firstname') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">{{ __('Lastname') }}</label>
              <div class="uk-form-controls">
                <div class="uk-width-2-3@s">
                  <input id="lastname" type="text" class="uk-input {{ $errors->has('lastname') ? ' uk-form-danger' : '' }}"   name="lastname" required>
                </div>
                @if ($errors->has('lastname'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('lastname') }}</strong>
                </span>
                @endif
              </div>
            </div>

          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
              <button type="submit" class="uk-button uk-button-primary">
                {{ __('Register') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
