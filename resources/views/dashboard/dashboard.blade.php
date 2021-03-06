@extends('dashboard')

@section('content')
<div class="row">

  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="ion ion-ios-book-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Penghuni</span>
        <span class="info-box-number">8</span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div>

  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pengguna</span>
        <span class="info-box-number">1</span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div>

  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="ion ion-ribbon-a"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Penghuni Belum Bayar</span>
        <span class="info-box-number">2</span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <h3>Modul KOSAN</h3>
  </div>

  <div class="col-lg-4 col-xs-4">
    <!-- small box -->
    <div class="small-box bg-black-gradient">
      <div class="inner">
        <h3>Pengguna</h3>
        <p>Mengelola biodata pribadi</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="{{ url('profil') }}" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-4">
    <!-- small box -->
    <div class="small-box bg-black-gradient">
      <div class="inner">
        <h3>Transaksi</h3>
        <p>Mengelola aktivitas transaksi</p>
      </div>
      <div class="icon">
        <i class="fa fa-star"></i>
      </div>
      <a href="{{ url('mahasiswa') }}" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-4">
    <!-- small box -->
    <div class="small-box bg-black-gradient">
      <div class="inner">
        <h3>Penghuni</h3>
        <p>Mengelola penghuni</p>
      </div>
      <div class="icon">
        <i class="fa fa-list"></i>
      </div>
      <a href="{{ url('daftar_wisudawan') }}" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-4">
    <!-- small box -->
    <div class="small-box bg-black-gradient">
      <div class="inner">
        <h3>Hunian</h3>
        <p>Mengelola kosan</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="{{ url('user') }}" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-4">
    <!-- small box -->
    <div class="small-box bg-black-gradient">
      <div class="inner">
        <h3>Peran</h3>
        <p>Mengelola peran</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="{{ url('user') }}" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-4">
    <!-- small box -->
    <div class="small-box bg-black-gradient">
      <div class="inner">
        <h3>Setting</h3>
        <p>Pengaturan aplikasi</p>
      </div>
      <div class="icon">
        <i class="fa fa-gears"></i>
      </div>
      <a href="{{ url('user') }}" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

</div>
@endsection
