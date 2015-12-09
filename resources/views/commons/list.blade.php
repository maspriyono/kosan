@extends('dashboard')

@section('content')
<script>

function confirmDelete(id) {
  if (confirm("{{ $deleteMessage }}")) {
    document.getElementById(id).submit();
    return true;
  }

  return false;
}

</script>

<div class="row">
  <div class="col-md-12">
    <div class="box box-warning">
      <div class="box-header">
        <div class="form-group">
          <div class="col-md-2">
            <a href="{{ url ($base . '/new') }}" class="btn btn-flat btn-sm btn-default"><i class="fa fa-plus"></i> {{ $addButtonText }}</a>
          </div>
          <div class="col-md-10">
            {!! Form::open(array('action' => array($searchTarget), 'method' => 'GET', 'enctype' => 'multipart/form-data')) !!}
            <input name="query" type="text" class="form-control" placeholder="{{ $searchPlaceholder }}"/>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-condensed table-bordered">
          @if (sizeof($models) > 0)
          <tr>
            <td>No</td>
            
            @foreach ($headerTexts as $text)
            <td>{{ $text }}</td>
            @endforeach

            <td>Pilihan</td>
          </tr>
          @foreach ($models as $idx => $model)
          <tr>
            <td>{{ ($models->currentPage() - 1) * $models->count() + $idx + 1}}</td>
            
            @foreach ($tableCols as $col)
            <td>{{ $model[$col] }}</td>
            @endforeach

            <td style="width:250px;">
              <div class="col-md-1">
                {!! Form::open([
                  'method'  =>  'GET',
                  'action'  =>  [$showTarget, $model->id],
                  'id'      =>  'show-' . $model->id
                  ]) !!}
                  <a href="#" onclick="document.getElementById('show-{{ $model->id }}').submit();" class="btn btn-flat btn-sm btn-default"><i class="fa fa-eye"></i></a>
                {!! Form::close() !!}
              </div>
              <div class="col-md-1">
                <a href="{{ url($base . '/'.$model->id.'/edit') }}" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
              </div>
              <div class="col-md-1">
                {!! Form::open([
                  'method' => 'DELETE',
                  'action' => [$destroyTarget, $model->id],
                  'id' => 'delete-'.$model->id
                  ]) !!}
                  <a href="#" onclick="confirmDelete('delete-{{ $model->id }}')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                {!! Form::close() !!}
              </div>
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td class="text-warning">Tidak ada data yang bisa ditampilkan</td>
          </tr>
          @endif
        </table>
        {!! $models->render() !!}
      </div>
    </div>
  </div>
</div>
@endsection
