@extends('layouts.site')

@section('content')

  <div class="uk-section uk-section-small">
    <div class="uk-container">
      <div class="uk-margin-large">
        <div class="uk-width-large uk-margin-auto">
          <div class="uk-card uk-card-body uk-card-default uk-background-muted">
            <form method="POST" action="">
              {{ csrf_field() }}
              <fieldset class="uk-fieldset">
                <legend class="uk-legend uk-text-center">Login</legend>

                <div class="uk-margin">
                  <div class="uk-margin">
                    <a href="/redirect/facebook" class="uk-button uk-border-rounded uk-width-1-1">
                      <div class="">
                        <div class="uk-text-center uk-position-relative">
                          <span class="uk-position-left uk-flex uk-flex-middle">
                            <img class="" src="/images/login/facebook.png" alt="">
                          </span>
                          <span>Login con Facebook</span>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="uk-margin">
                    <a href="/redirect/google" class="uk-button uk-border-rounded uk-width-1-1">
                      <div class="">
                        <div class="uk-text-center uk-position-relative">
                          <span class="uk-position-left uk-flex uk-flex-middle">
                            <img class="" src="/images/login/google.png" alt="">
                          </span>
                          <span>Login con Google</span>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="uk-text-center">
                  <span>o</span>
                </div>

                <div class="uk-margin uk-grid-small" uk-grid>

                  <div class="uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                      <input type="email" class="uk-input" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                      @if ($errors->has('email'))
                        <span class="uk-text-danger">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                      <input type="password" class="uk-input" name="password" placeholder="Contraseña" minlength="6" required>
                      @if ($errors->has('password'))
                        <span class="uk-text-danger">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                      <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Ingresar</button>
                    </div>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
