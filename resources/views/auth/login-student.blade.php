@extends('app')

@section('content')
<style>
.full {
  background: url("{{asset('assets/login-bg.jpg')}}") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
body {
  margin-top: 50px;
  margin-bottom: 50px;
  background: none;
}
.fading {
  position: absolute; top:0px; left:0px; width:100%; height:100%;
  background:transparent;
  background: linear-gradient(top, rgba( 255, 255, 255, 255 ) 0%, rgba( 255, 255, 255, 1 ) 100% );
  background: -moz-linear-gradient(top, rgba( 255, 255, 255, 0) 0%, rgba( 255, 255, 255, 1 ) 100% );
  background: -ms-linear-gradient(top, rgba( 255, 255, 255, 0 ) 0%, rgba( 255, 255, 255, 1 ) 100% );
  background: -o-linear-gradient( top, rgba( 255, 255, 255, 0 ) 0%, rgba( 255, 255, 255, 1 ) 100% );
  background: -webkit-linear-gradient( top, rgba( 255, 255, 255, 0 ) 0%, rgba( 255, 255, 255, 1 ) 100% );
  -ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#550000FF, endColorstr=#550000FF);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#00ffffff, endColorstr=#ffffffff);
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="login-box">
            <div class="login-logo">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{asset('assets/logo-itb.png')}}" width="70"/>
                        <a href="../../index2.html">SIMTU</a>
                    </div>
                </div>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Silakan login untuk memulai sesi</p>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    Terdapat kesalahan dalam input yang diberikan. Silakan coba lagi<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ url('/login_mahasiswa') }}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group has-feedback">
                    <input type="text" name="number" class="form-control" placeholder="NIM">
                    <span class="glyphicon glyphicon-number form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                    <div class="col-xs-8">
                      <div class="checkbox icheck">
                        <label class="">
                          <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input name="remember" type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> Remember Me
                        </label>
                      </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                    </div><!-- /.col -->
                  </div>
                </form>
            </div>
            <div class="row">
              <div style="text-align:center;">
                <a class="btn btn-link" href="{{ url('/password/email') }}">Lupa Password?</a> |
                <a class="btn btn-link" href="{{ url('/auth/login') }}">Admin TU</a>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
