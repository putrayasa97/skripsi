@extends('layouts.pemilik')
@section('title', 'Paket')
@section('content')
 <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Daftar Pegawai</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <button title="Tambah" type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><span class="fa fa-plus"></span> Tambah Pegawai</button>

        <div class="ln_solid"></div>
        <!--Table-->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Pegawai</th>
                <th>Nama Pegawai</th>
                <th>Tgl Lahir</th>
                <th>Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pegawai as $peg)
                <tr>
                    <td align="center">{{ $no++ }}</td>
                    <td>{{ $peg->userdetail->kode_userdtl }}</td>
                    <td>{{ $peg->userdetail->nm_lengkap }}</td>
                    <td>{{ $peg->userdetail->tgl_lahir }}</td>
                    <td>{{ $peg->userdetail->tlp }}</td>
                    <td>
                        @if ($peg->userdetail->jk==1)
                            Pria
                        @elseif($peg->userdetail->jk==0)
                            Wanita
                        @endif
                    </td>
                  <td align="center">
                      <div class="btn-group">
                        <button title="Lihat" type="button" class="btn btn-info btn-xs lihatPegawai" data-toggle="modal" data-target="#detail" value="{{ $peg->id_user }}" ><span class="fa fa-eye"></span></button>
                        <button title="Edit" type="button" class="btn btn-warning btn-xs ubahPegawai" data-toggle="modal" data-target="#ubah" value="{{ $peg->id_user }}"><span class="fa fa-pencil"></span></button>
                        <button title="Hapus" type="button" class="btn btn-danger btn-xs hapusPegawai" data-toggle="modal" data-target="#delete" value="{{ $peg->id_user }}"><span class="fa fa-trash"></span></button>
                      </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <!--/Table-->
        </div>
        </div>
      </div>
    </div>
</div>
@include('pemilik.pegawai.pegawai_tambah')
@include('pemilik.pegawai.pegawai_ubah')
@include('pemilik.pegawai.pegawai_detail')
@include('pemilik.pegawai.pegawai_delete')
@endsection
@section('custom-js')
<script>
  $('#DatePegawaiUbah').datetimepicker({
        format: 'YYYY-MM-DD',
        ignoreReadonly: true,
        allowInputToggle: true
  });
  $('#DatePegawaiTambah').datetimepicker({
        format: 'YYYY-MM-DD',
        ignoreReadonly: true,
        allowInputToggle: true
  });
  window.Parsley.addValidator('fileextension', {
  validateString: function(value, requirement) {
    if (!window.FormData) {
      alert('You are making all developpers in the world cringe. Upgrade your browser!');
      return true;
    }
    var fileExtension = value.split('.').pop();
    return fileExtension === requirement;
  },
  requirementType: 'string',
  messages: {
    en: 'Extension Foto Harus Format ".jpg"',
    fr: 'Ce fichier est plus grand que %s Kb.'
  }
});
</script>
@endsection
