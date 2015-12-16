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
              <div class="tab-pane active" id="tab_1">
                <table class="table table-bordered table-hovered table-striped">
                  <thead>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Transaksi</th>
                    <th class="text-center">Nominal</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-center">Pilihan</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
