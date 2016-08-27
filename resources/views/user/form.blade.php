@extends('dashboard')

@section('content')

@include ('commons.notifications')

<div class="row">
  <div class="col-md-12">
      <div class="box box-warning">

        {!! Form::model($model, array('action' => array($action, $model->id), 'method' => $method, 'enctype' => 'multipart/form-data')) !!}

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
                      {!! Form::label('phone', 'Phone') !!}
                      {!! Form::text('phone', $model->phone, array('placeholder' => 'Phone Number', 'class' => 'form-control')) !!}
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
              @include ('commons.save-back', array('base' => $base))
          </div>

        {!! Form::close() !!}

      </div>
  </div>
</div>
@endsection
