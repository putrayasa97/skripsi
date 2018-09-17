@extends('templates.default')
@section('title', 'Anggota')
@section('content')
 <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Daftar Anggota</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <!--Table-->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Telp</th>
                <th>Terdaftar</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($anggota as $ang)
                <tr>
                  <td align="center">{{ $no++ }}</td>
                  <td>{{ $ang->nm_ang }}</td>
                  <td>{{ str_limit($ang->alamat, 15) }}</td>
                  <td>
                  @if ($ang->jk==1)
                    Pria
                  @else
                    Wanita
                  @endif
                     </td>
                  <td>{{ $ang->tlp}}</td>
                  <td>{{ $ang->created_at->format('d M Y') }}</td>
                  <td>@if ($ang->status==1)
                    Aktif
                  @else
                    Tidak Aktif
                  @endif</td>
                  <td align="center">
                      <div class="btn-group">
                        <button title="Lihat" type="button" class="btn btn-info btn-xs lihatAnggota" data-toggle="modal" data-target="#detail" value="{{ $ang->id_ang }}" ><span class="fa fa-eye"></span></button>
                        <button title="Edit" type="button" class="btn btn-warning btn-xs ubahAnggota" data-toggle="modal" data-target="#ubah" value="{{ $ang->id_ang }}"><span class="fa fa-pencil"></span></button>
                        <button title="Hapus" type="button" class="btn btn-danger btn-xs hapusAnggota" data-toggle="modal" data-target="#delete" value="{{ $ang->id_ang }}"><span class="fa fa-trash"></span></button>
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
  @include('pegawai.anggota.anggota_ubah')
  @include('pegawai.anggota.anggota_delete')
  @include('pegawai.anggota.anggota_detail')
@endsection
