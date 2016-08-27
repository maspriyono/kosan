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
        <h4>Catatan Bulanan Tahun 2015 <a href="{{ $base }}/new" class="btn btn-default btn-flat btn-sm pull-right"><i class="fa fa-plus"></i> Tambah</a></h4>
      </div>
      <div class="box-body">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs nav-warning">
              @foreach ($months as $k => $month)
                @if ($k == 1)
                <li class="active"><a href="#tab_{{ $k }}" data-toggle="tab">{{ $month }}</a></li>
                @else
                <li><a href="#tab_{{ $k }}" data-toggle="tab">{{ $month }}</a></li>
                @endif
              @endforeach
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
                @foreach ($months as $k => $month)
              <div class="tab-pane {{ $k != 1 ?: 'active'}}" id="tab_{{ $k }}">
                <table class="table table-bordered table-hovered table-striped">
                  <thead>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Transaksi</th>
                    <th class="text-center">Nominal</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Pilihan</th>
                  </thead>
                  <tbody>
                      @if (sizeof($data[$k]) > 0)
                      @foreach ($data[$k] as $key => $model)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $model->name }}</td>
                      <td>{{ $model->nominal }}</td>
                      <td>{{ $model->status }}</td>
                      @include ('commons.action-choice')
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="5">No data</td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              @endforeach
            </div>
            <!-- /.tab-content -->
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
