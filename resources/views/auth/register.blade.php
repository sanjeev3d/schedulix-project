@extends('layouts.app')

@section('content')

<!-- ============================================================== -->
    <!-- Create an account page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="{{ url('/home') }}"><h1>Schedulix</h1></a><span class="splash-description">Register</span></div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                        
                    <div class="form-group">
                        <input class="form-control form-control-lg {{ $errors->has('email') ? ' has-error' : '' }}" placeholder="Name" autocomplete="off" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <div class="form-group">
                        <input class="form-control form-control-lg {{ $errors->has('email') ? ' has-error' : '' }}" placeholder="Username/Email" autocomplete="off" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <div class="form-group">
                        <input class="form-control form-control-lg {{ $errors->has('password') ? ' has-error' : '' }}" placeholder="Password" id="password" type="password" name="password" required>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif



                    <div class="form-group">
                        <input class="form-control form-control-lg {{ $errors->has('password') ? ' has-error' : '' }}" placeholder="Confirm Password" id="password-confirm" type="password" name="password_confirmation" required>
                    </div>
                   



                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('login') }}" class="footer-link">Login</a></div>
               
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end Create an account page  -->
    <!-- ============================================================== -->
@endsection
