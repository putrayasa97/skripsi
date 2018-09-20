@extends('templates.default')
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
                <th>Alamat</th>
                <th>Paket</th>
                <th>Terdaftar</th>
                <th>Kadaluarsa</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td align="center"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td align="center"></td>
                  <td align="center">
                      <div class="btn-group">
                        <button title="Lihat" type="button" class="btn btn-info btn-xs lihatAnggota" data-toggle="modal" data-target="#detail" value="" ><span class="fa fa-eye"></span></button>
                        <button title="Edit" type="button" class="btn btn-warning btn-xs ubahAnggota" data-toggle="modal" data-target="#ubah" value=""><span class="fa fa-pencil"></span></button>
                        <button title="Hapus" type="button" class="btn btn-danger btn-xs hapusAnggota" data-toggle="modal" data-target="#delete" value=""><span class="fa fa-trash"></span></button>
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
