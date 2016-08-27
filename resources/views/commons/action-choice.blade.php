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