@extends('templates.default')
@section('title', 'Paket')
@section('content')
 <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
        <h2>Daftar Paket {{$paket->nm_paket}}</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <!--Table-->
          <a href="{{ route('paket')}}" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-chevron-left"></span> Kembali</a><button title="Tambah" type="button" class="btn btn-success btn-md tambahTarif" data-toggle="modal" data-target="#tambah" value="{{ $paket->id_paket }}"><span class="fa fa-plus"></span> Tambah Tarif</button>
          <div class="ln_solid"></div>
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Harga</th>
                <th>Langganan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($paketdtl as $tarif)
                <tr>
                  <td align="center">{{ $no++}}</td>
                  <td>Rp. {{number_format($tarif->harga,0,',','.')}} ,-</td>
                  <td>{{ $tarif->bulan }} Bulan</td>
                  <td align="center">
                      <div class="btn-group">
                        <button title="Edit" type="button" class="btn btn-warning btn-xs ubahTarif" data-toggle="modal" data-target="#ubah" value="{{ $tarif->id_paketdtl }}"><span class="fa fa-pencil"></span></button>
                        <button title="Hapus" type="button" class="btn btn-danger btn-xs hapusTarif" data-toggle="modal" data-target="#delete" value="{{ $tarif->id_paketdtl }}"><span class="fa fa-trash"></span></button>
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
  @include('pemilik.paket.paket_tambahtarif')
  @include('pemilik.paket.paket_updatetarif')
  @include('pemilik.paket.paket_deletetarif')
@endsection
