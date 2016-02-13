@extends('app')

@section('content')
<div class="login container">
    <h4  class="form-title">Login to <span>Laravel Ticketing System</span></h4>
    <form method="POST" role="form" action="{{ url('/login') }}">
        {!! csrf_field() !!}
        <div class="row">
            <div class="large-12 columns">
                <div class="input-container{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>E-Mail Address
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" />
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
                        <input id="pass" type="password" name="password" placeholder="Password" />
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
            <div class="large-6 columns">
                <input id="remember" name="remember" type="checkbox"><label for="checkbox1">Remember Me</label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <button type="submit" class="btn tiny">Login</button>
                <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
            </div>
        </div>
    </form>
</div>
@endsection
