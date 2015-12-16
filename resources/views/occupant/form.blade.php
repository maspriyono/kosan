@extends('dashboard')

@section('content')

@include ('commons.notifications')

<div class="row">
  <div class="col-md-12">
      <div class="box box-warning">
        {!! Form::open(array('action' => array($action, $model->id), 'method' => $method, 'enctype' => 'multipart/form-data')) !!}

          <div class="box-body">

            <div class="form-group">
                {!! Form::label('occupant', 'Nama Pengguna') !!}
                {!! Form::select('occupant', $users, $model->id, ['class' => 'form-control']) !!}
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
              @include ('commons.save-back', array('base' => $base))
          </div>

        {!! Form::close() !!}

      </div>
  </div>
</div>
@endsection
