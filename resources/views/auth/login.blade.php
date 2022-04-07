@extends('layouts.app')

@section('content')
<div class="form-login">
    <div class="justify-content-center">
        <div class="col-md-4">
            <div class="control">
                <div class="titulo-login text-center">{{ __('Login') }}</div>
                <div class="">                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email">{{ __('E-Mail') }}</label>                            
                            <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                        </div>

                        <div class="form-group row">
                            <label for="password" class="">{{ __('Password') }}</label>                            
                            <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            
                        </div>

                        <div class="mb-6">
                            <div class=""></div>                                                               
                                <label class="" for="remember">
                                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Remember Me') }}
                                </label>                            
                        </div>

                        <div class="button-submit">                            
                            <button type="submit" class="login-submit bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <div class="container-forgot-password">
                                    <a class="forgot-password font-bold text-sm text-red-600 hover:text-red-800" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>                                
                            @endif                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
