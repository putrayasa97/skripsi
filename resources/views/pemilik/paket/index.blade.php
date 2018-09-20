@extends('templates.default')
@section('title', 'Paket')
@section('content')
 <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Daftar Paket</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <button title="Tambah" type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><span class="fa fa-plus"></span> Tambah Paket</button>
        @if ($count==0)
            <button title="Tambah" type="button" class="btn btn-success" data-toggle="modal" data-target="#perdatang"><span class="fa fa-plus"></span> Tarif Perdatang</button>
        @elseif(($count==1))
            <button title="Ubah" type="button" class="btn btn-warning ubahPerdatang" data-toggle="modal" data-target="#ubahperdatang" value="{{ $getPerdatang[0]->id_paketdtl}}"><span class="fa fa-pencil"></span> Ubah Tarif Perdatang</button>
        @endif

        <div class="ln_solid"></div>
        <!--Table-->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($paket as $pkt)
                <tr>
                    <td align="center">{{ $no++ }}</td>
                    <td>{{ $pkt->nm_paket }}</td>
                  <td align="center">
                      <div class="btn-group">
                        <button title="Tambah" type="button" class="btn btn-success btn-xs addTarif" value="{{ $pkt->id_paket }}"><span class="fa fa-plus"></span></button>
                        <button title="Lihat" type="button" class="btn btn-info btn-xs lihatPaket" data-toggle="modal" data-target="#detail" value="{{ $pkt->id_paket }}" ><span class="fa fa-eye"></span></button>
                        <button title="Edit" type="button" class="btn btn-warning btn-xs ubahPaket" data-toggle="modal" data-target="#ubah" value="{{ $pkt->id_paket }}"><span class="fa fa-pencil"></span></button>
                        <button title="Hapus" type="button" class="btn btn-danger btn-xs hapusPaket" data-toggle="modal" data-target="#delete" value="{{ $pkt->id_paket }}"><span class="fa fa-trash"></span></button>
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
  @include('pemilik.paket.paket_tambah')
  @include('pemilik.paket.paket_detail')
  @include('pemilik.paket.paket_ubah')
  @include('pemilik.paket.paket_delete')
  @include('pemilik.paket.paket_tambahperdatang')
  @include('pemilik.paket.paket_ubahperdatang')
@endsection
