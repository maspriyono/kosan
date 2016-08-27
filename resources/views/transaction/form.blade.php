@extends('dashboard')

@section('content')

@include ('commons.notifications')

<div class="row">
  <div class="col-md-12">
      <div class="box box-warning">
        {!! Form::open(array('action' => array($action, $model->id), 'method' => $method, 'enctype' => 'multipart/form-data')) !!}

          <div class="box-body">

            <div class="form-group">
                {!! Form::label('name', 'Nama Transaksi') !!}
                {!! Form::text('name', $model->id, ['class' => 'form-control', 'placeholder' => 'Nama Transaksi']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('nominal', 'Nominal') !!}
                {!! Form::text('nominal', $model->nominal, ['class' => 'form-control', 'placeholder' => 'Nominal']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('sender', 'Telah Terima Dari') !!}
                {!! Form::select('sender', $users, null, ['class' => 'form-control', 'placeholder' => 'Already Received From']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('receiver', 'Penerima') !!}
                {!! Form::select('receiver', $users, null, ['class' => 'form-control', 'placeholder' => 'Receiver']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('from', 'From (month)') !!}
                {!! Form::number('from', $model->from, ['class' => 'form-control', 'placeholder' => 'From']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('to', 'To (month)') !!}
                {!! Form::number('to', $model->to, ['class' => 'form-control', 'placeholder' => 'To']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Keterangan') !!}
                {!! Form::textArea('description', $model->desc, ['class' => 'form-control', 'placeholder' => 'Keterangan']) !!}
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
