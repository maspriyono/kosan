@extends('dashboard')
@section('content')
<script>

function confirmDelete(id) {
  if (confirm("Apakah Anda yakin ingin menghapus user ini?")) {
    document.getElementById(id).submit();
    return true;
  }

  return false;
}

</script>

@include ('commons.notifications')

<div class="row">
  <div class="col-md-12">
    <div class="box box-warning">
      <div class="box-header">
        <h4>{{ $model[$headerDisplay] }}</h4>
      </div>
      <div class="box-body">
          <table class="table table-striped">
            @foreach ($displayCols as $key => $value)
            <tr>
              <td width="200">{{ $value }}</td>
              <td>{{ $model[$key] }}</td>
            </tr>
            @endforeach
          </table>
      </div>
      <div class="box-footer">
        {!! Form::open([
          'method' => 'DELETE',
          'action' => [$destroyTarget, $model->id],
          'id' => 'delete-'.$model->id
          ]) !!}
          <div class="btn-group">
            <a href="{{ url($base . '/'. $model->id .'/edit') }}"
              class="btn btn-flat btn-sm btn-primary">
              <i class="fa fa-pencil"></i> Edit
            </a>
            <a href="{{ url($base) }}"
            class="btn btn-flat btn-sm btn-default">
            <i class="fa fa-mail-reply"></i> Kembali
          </a>
        </div>
      {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
