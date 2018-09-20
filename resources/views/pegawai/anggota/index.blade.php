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
                <th>Paket</th>
                <th>Terdaftar</th>
                <th>Kadaluarsa</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($anggota as $ang)
                <tr>
                  <td align="center">{{ $no++ }}</td>
                  <td>{{ str_limit($ang->nm_ang, 15)}}</td>
                  <td>{{ str_limit($ang->alamat, 15) }}</td>
                  <td>{{ $ang->paketdtl->paket->nm_paket }}({{$ang->paketdtl->bulan }} Bulan) - Rp. {{number_format($ang->paketdtl->harga,0,',','.')}} ,-</td>
                  <td>{{ $ang->date_actv->format('d F Y')}}</td>
                  <td>{{ $ang->date_expiry->format('d F Y')}}</td>
                  <td align="center">@if ($ang->status==1)
                    Aktif
                  @else
                  <button title="Perpanjang" type="button" class="btn btn-danger btn-xs Perpanjang" data-toggle="modal" data-target="#perpanjang" value="{{ $ang->id }}" >Perpanjang</button>
                  @endiF
                </td>
                  <td align="center">
                      <div class="btn-group">
                        <button title="Lihat" type="button" class="btn btn-info btn-xs lihatAnggota" data-toggle="modal" data-target="#detail" value="{{ $ang->id }}" ><span class="fa fa-eye"></span></button>
                        <button title="Edit" type="button" class="btn btn-warning btn-xs ubahAnggota" data-toggle="modal" data-target="#ubah" value="{{ $ang->id }}"><span class="fa fa-pencil"></span></button>
                        <button title="Hapus" type="button" class="btn btn-danger btn-xs hapusAnggota" data-toggle="modal" data-target="#delete" value="{{ $ang->id }}"><span class="fa fa-trash"></span></button>
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
  @include('pegawai.anggota.perpanjang_paket')
@endsection
