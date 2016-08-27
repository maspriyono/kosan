@extends('dashboard')

@include ('commons.notifications')

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header">
        <h3>Form Pengisian Role Baru</h3>
      </div>

      @if ($mode == 'create')
      {!! Form::open(array('action' => 'RoleController@store')) !!}
      @else
      {!! Form::model($model, array('action' => array('RoleController@update', $model->id), 'method' => 'PUT')) !!}
      @endif

      <div class="box-body">

        <!-- role name -->
        <div class="form-group">
          {!! Form::label('role', 'Role Name') !!}
          @if ($mode == 'create')
          <input type="text" name="role" class="form-control"/>
          @else
          {!! Form::text('role', $model->name, array('class' => 'form-control')) !!}
          @endif
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
