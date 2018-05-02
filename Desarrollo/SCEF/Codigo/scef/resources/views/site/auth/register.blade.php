@extends('layouts.site')

@section('content')

  <div class="uk-section uk-section-small">
    <div class="uk-container">
      <div class="uk-margin-large">
        <div class="uk-width-xxlarge uk-margin-auto">
          <div class="uk-card uk-card-body uk-card-default uk-background-muted">
            <form id="form-register" method="POST" action="">
              {{ csrf_field() }}
              <fieldset class="uk-fieldset">
                <legend class="uk-legend uk-text-center">Registrar</legend>
                <input type="hidden" name="lang" value="{{ App::getLocale() }}">
                <div class="uk-margin uk-grid-small" uk-grid>
                  <div class="uk-width-1-2@m uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                      <input type="text" class="uk-input" name="first_name" value="{{ old('first_name') }}" placeholder="Nombres" required autofocus>
                      @if ($errors->has('first_name'))
                        <span class="uk-text-danger">
                          <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="uk-width-1-2@m uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                      <input type="text" class="uk-input" name="last_name" value="{{ old('last_name') }}" placeholder="Apellidos" required autofocus>
                      @if ($errors->has('last_name'))
                        <span class="uk-text-danger">
                          <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="uk-width-1-2@m uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                      <input type="email" class="uk-input" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                      @if ($errors->has('email'))
                        <span class="uk-text-danger">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="uk-width-1-2@m uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                      <input type="text" class="uk-input" name="telephone" value="{{ old('telephone') }}" placeholder="Teléfono" autofocus>
                      @if ($errors->has('telephone'))
                        <span class="uk-text-danger">
                          <strong>{{ $errors->first('telephone') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="uk-width-1-2@m uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                      <input id="password" type="password" class="uk-input" name="password" placeholder="Contraseña" minlength="6" required>
                      @if ($errors->has('password'))
                        <span class="uk-text-danger">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <input type="hidden" name="role_id" value="4">

                  <div class="uk-width-1-2@m uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                      <input id="password_confirmation" type="password" class="uk-input" name="password_confirmation" placeholder="Repetir contraseña" minlength="6" required>
                    </div>
                  </div>

                  <div class="uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                      <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Registrar</button>
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
