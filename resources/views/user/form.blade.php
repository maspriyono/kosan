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

        {!! Form::open(array('action' => array($action, $model->id), 'method' => $method, 'enctype' => 'multipart/form-data')) !!}

          <div class="box-body">

                  <div class="form-group">
                      {!! Form::label('registration_number', 'Nomor KTP/Tanda Pengenal Lain') !!}
                      {!! Form::text('registration_number', $model->registration_number, array('placeholder' => 'Nomor KTP/Nomor KTM', 'class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('name', 'Nama Lengkap') !!}
                      {!! Form::text('name', $model->name, array('placeholder' => 'Nama Lengkap Administrator', 'class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('email', 'Email') !!}
                      {!! Form::text('email', $model->email, array('placeholder' => 'Email', 'class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('address', 'Alamat') !!}
                      {!! Form::textArea('address', $model->address, array('placeholder' => 'Alamat', 'class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('roles', 'Roles') !!}
                      <br/>
                      @foreach ($roles as $role)
                      {!! Form::checkbox("roles[]", $role->id, in_array($role->name, $rolesArray)) !!}
                      {{ $role->name }}
                      <br/>
                      @endforeach
                  </div>

          </div>

          <div class="box-footer">
              <div class="btn-group">
                  <input type="submit" class="btn btn-primary btn-flat" name="submit-button" value="Simpan">
                  <a  href="{{ url($base) }}" class="btn btn-flat btn-default">Kembali</a>
              </div>
          </div>

        {!! Form::close() !!}
        
      </div>
  </div>
</div>
@endsection
