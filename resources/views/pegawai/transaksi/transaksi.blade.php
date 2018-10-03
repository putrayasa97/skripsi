@extends('layouts.pegawai')
@section('title', 'Transaksi')
@section('content')
 <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Daftar Transaksi</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <!--Table-->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Paket</th>
                <th>Harga</th>
                <th>Tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transaksi as $trans)
                <tr>
                  <td align="center">{{$no++}}</td>
                  <td>{{$trans->anggota->nm_ang}}</td>
                  <td>
                    @if ($trans->anggota->status==1)
                        Anggota
                    @elseif($trans->anggota->status==2)
                        Non-Anggota
                    @endif
                  </td>
                  <td>{{$trans->anggota->paketdtl->paket->nm_paket}}
                      @if ($trans->anggota->paketdtl->bulan==0)
                      (Perdatang)
                      @else
                      ({{$trans->anggota->paketdtl->bulan}} Bulan)
                      @endif

                  </td>
                  <td>Rp. {{number_format($trans->anggota->paketdtl->harga,0,',','.')}} ,-</td>
                  <td>{{$trans->created_at}}</td>
                  <td align="center">
                      <div class="btn-group">
                        <button title="Lihat" type="button" class="btn btn-info btn-xs lihatAnggota" data-toggle="modal" data-target="#detail" value="" ><span class="fa fa-eye"></span></button>
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
@endsection
