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
                {!! Form::label('occupant', 'Nama Pengguna') !!}
                {!! Form::select('occupant', $users, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  {!! Form::label('house', 'Nama Rumah') !!}
                  {!! Form::select('house', $houses, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-4">
                  {!! Form::label('floor', 'Lantai') !!}
                  {!! Form::select('floor', $floors, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-4">
                  {!! Form::label('room', 'Nomor/Nama Kamar') !!}
                  {!! Form::select('room', $rooms, null, ['class' => 'form-control']) !!}
                </div>
              </div> 
            </div>

          </div>

          <div class="box-footer">
              <div class="btn-group">
                  <input type="submit" class="btn btn-primary btn-flat" name="submit-button" value="Simpan">
                  <a  href="{{ url('user') }}" class="btn btn-flat btn-default">Kembali</a>
              </div>
          </div>

        {!! Form::close() !!}

      </div>
  </div>
</div>
@endsection
