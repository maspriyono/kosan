@extends('dashboard')

@section('content')

@include ('commons.notifications')

<div class="row">
  <div class="col-md-6">
      <div class="box box-warning">
        {!! Form::open(array('action' => array('HouseController@store'), 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}
          <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', 'Nama Rumah') !!}
                    {!! Form::text('name', $model->name, array('placeholder' => 'Nama Rumah', 'class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('address', 'Alamat Rumah') !!}
                    {!! Form::textArea('address', $model->address, array('placeholder' => 'Alamat Rumah Kos', 'class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('phone', 'Telepon') !!}
                    {!! Form::text('phone', $model->phone, array('placeholder' => 'Nomor Telepon', 'class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('picture', 'Gambar') !!}
                    {!! Form::text('picture', '', array('class' => 'form-control')) !!}
                </div>
          </div>

          <div class="box-footer">
              <div class="btn-group">
                  <input type="submit" class="btn btn-primary btn-flat" name="submit-button" value="Simpan">
                  <a  href="{{ url('house') }}" class="btn btn-flat btn-default">Kembali</a>
              </div>
          </div>

          <div id="hidden-house"></div>
        {!! Form::close() !!}
      </div>
  </div>
  <div class="col-md-6">
    <div class="box box-warning">
      <div class="box-body">
        <form class="form">
          <div class="form-group">
              {!! Form::label('floors_total', 'Jumlah Lantai') !!}
              {!! Form::text('floors_total', $model->floors_total, array('placeholder' => 'Jumlah Lantai', 'class' => 'form-control')) !!}
          </div>
        </form>
      </div>
    </div>
    <div id="floor"></div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#floors_total').change(function() {

      var content = "";

      for (var i = 0; i < $(this).val(); i++) {
        content += floorBuilder(i + 1);
      }

      $('#floor').html(content);
      $('#hidden-house').append('<input type="hidden" value="' + $(this).val() + '" name="floors_total"/>');
      
    });

    if ({{ $model->floors_total > 0 ? 'true' : 'false'}}) {
      $('#floors_total').change();

      for (var i = 0; i < {{ $model->floors_total }}; i++) {
        addRoom(i);
      }
    }
  });

  function floorBuilder(floor) {
    var template = 
      '<div class="box box-primary">'+
        '<div class="box-header">'+
          '<p>Lantai ' + floor + '</p>'+
        '</div>'+
        '<div class="box-body">'+
          '<table class="table" id="floor-' + floor + '" style="display:none;">'+
            '<thead>'+
              '<tr>'+
                '<td>Nama/Nomor Kamar</td>'+
                '<td>Pilihan</td>'+
              '</tr>'+
            '</thead>'+
            '<tbody>'+
            '</tbody>'+
          '</table>'+
          '<div class="form-group">'+
            '<div class="row">'+
              '<div class="col-md-8">'+
                '<input id="input-floor-' + floor + '" name="room-name" type="text" class="form-control" placeholder="Nama/Nomor Kamar"/>'+
              '</div>'+
              '<div class="col-md-4">'+
                '<button name="room-name" class="btn btn-primary btn-flat" onclick="addRoom(' + floor + ')">+ Tambah Kamar</button>'+
              '</div>'+
            '</div>'+
          '</div>'+
        '</div>'+
      '</div>';

    return template;
  }

  function addRoom(floor) {
    var name = $('#input-floor-' + floor).val();

    if ({{ sizeof($model->floors) > 0 ? 'true' : 'false' }}) {
      
    } else {
      $('#floor-' + floor).show();
      $('#floor-' + floor).append('<tr><td>' + name + '</td><td><button class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></td></tr>');

      // Add to hidden input
      $('#hidden-house').append('<input type="hidden" value="' + name + '" name="room[' + floor + ']"/>');
    }

    $('#input-floor-' + floor).val();
  }
</script>
@endsection
