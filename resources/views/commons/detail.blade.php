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

<div class="row">
  <div class="col-md-12">

    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      {{ Session::get('success') }}
    </div>
    @endif

    @if (Session::has('info'))
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      {{ Session::get('info') }}
    </div>
    @endif

    @if (Session::has('warning'))
    <div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      {{ Session::get('warning') }}
    </div>
    @endif

    @if (Session::has('danger'))
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      {{ Session::get('danger') }}
    </div>
    @endif
    
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
