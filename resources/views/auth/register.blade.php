@extends('app')

@section('content')
    <div class="register container">
        <h4  class="form-title">Register Account</h4>
        <form method="POST" role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}
            <div class="row">
                <div class="large-12 columns">
                    <div class="input-container{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Name
                            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Name" />
                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <div class="input-container{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>E-Mail Address
                            <input id="email-register" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" />
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <div class="input-container{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>Password
                            <input id="pass-register" type="password" name="password" placeholder="Password" />
                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <div class="input-container{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label>Confirm Password
                            <input id="pass-conf" type="password" name="password_confirmation" placeholder="Password Confirmation" />
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <button type="submit" class="btn tiny">Register Account</button>
                </div>
            </div>
        </form>
    </div>
@endsection
