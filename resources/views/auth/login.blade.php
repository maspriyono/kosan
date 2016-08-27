@extends('app')

@section('content')
<style>
.full {
  background: url("{{asset('assets/img/bg.jpg')}}") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.simtu-title {
  color: #fff !important;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="login-box">
            <div class="login-logo">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{asset('assets/logo-itb.png')}}" width="70"/>
                        <a class="simtu-title" href="#"><b>SIM</b>TU</a>
                    </div>
                </div>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Silakan login untuk memulai sesi</p>
                @if (Session::get('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
                @endif

                <form action="{{ url('/login') }}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group has-feedback">
                    <input type="text" name="number" class="form-control" placeholder="NIP / NIK / NIM">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                    <div class="col-xs-8">
                      <div class="checkbox icheck">
                        <label class="">
                          <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input name="remember" type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> Ingat Saya
                        </label>
                      </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                    </div><!-- /.col -->
                  </div>
                </form>
            </div>
<!--            <div class="row">
              <div style="text-align:center;">
                <a class="btn btn-link" href="{{ url('/password/email') }}">Lupa Password?</a> |
                <a class="btn btn-link" href="{{ url('/mahasiswa/login') }}">Mahasiswa</a>
              </div>
            </div>-->
        </div>
    </div>
</div>
@endsection
