@extends('dashboard')

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('message'))
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ Session::get('message') }}
</div>
@endif

<div class="row">
  <div class="col-md-12">
      <div class="box box-warning">
        @if ($mode == 'create')
        {!! Form::open(array('action' => array('UserController@store'), 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}
          <div class="box-body">

                  <div class="form-group">
                      {!! Form::label('nip', 'NIP') !!}
                      {!! Form::text('nip', null, array('placeholder' => 'Nomor Induk Pegawai', 'class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('nama', 'Nama Lengkap') !!}
                      {!! Form::text('nama', '', array('placeholder' => 'Nama Lengkap Administrator', 'class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('email', 'Email') !!}
                      {!! Form::text('email', '', array('placeholder' => 'Email', 'class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('entry_year', 'Tahun Masuk') !!}
                      {!! Form::text('entry_year', null, array('placeholder' => 'contoh: 2009', 'class' => 'form-control')) !!}
                  </div>

          </div>

          <div class="box-footer">
              <div class="btn-group">
                  <input type="submit" class="btn btn-primary btn-flat" name="submit-button" value="Simpan">
                  <a  href="{{ url('mahasiswa') }}" class="btn btn-flat btn-default">Kembali</a>
              </div>
          </div>

        {!! Form::close() !!}
        @else
        {!! Form::model($model, array('action' => array('UserController@update', $model->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
          <div class="box-body">

                  <div class="form-group">
                      {!! Form::label('nip', 'NIP') !!}
                      {!! Form::text('nip', $model->registration_number, array('placeholder' => 'Nomor Induk Mahasiswa', 'class' => 'form-control', 'disabled' => 'disabled')) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('nama', 'Nama Lengkap') !!}
                      {!! Form::text('nama', $model->name, array('placeholder' => 'Nama Lengkap Mahasiswa', 'class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('email', 'Email') !!}
                      {!! Form::text('email', $model->email, array('placeholder' => 'Email', 'class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('entry_year', 'Tahun Masuk') !!}
                      {!! Form::number('entry_year', $model->entry_year, array('placeholder' => 'contoh: 2009', 'class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('photo', 'Foto Formal (Maks. 100kB)') !!}
                      @if (isset($model->prof_pic))
                      <br/><img src="{{ asset($model->prof_pic) }}" width="100" />
                      @endif
                      {!! Form::file('photo ', array('class' => 'form-control')) !!}
                  </div>

          </div>

          <div class="box-footer">
              <div class="btn-group">
                  <input type="submit" class="btn btn-primary btn-flat" name="submit-button" value="Simpan">
                  <a  href="{{ url('mahasiswa') }}" class="btn btn-flat btn-default">Kembali</a>
              </div>
          </div>

        {!! Form::close() !!}
        @endif
      </div>
  </div>
</div>
@endsection
