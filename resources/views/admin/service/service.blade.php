@extends('layouts.admin')
@section('title', 'Services')
@section('content')
 <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Daftar Services</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <!--Table-->
          <button title="Tambah" type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><span class="fa fa-plus"></span> Tambah Service</button>

          <div class="ln_solid"></div>
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Service</th>
                <th>Limit Data</th>
                <th>Harga</th>
                <th>Type Service</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($service as $serv)
                <tr>
                  <td align="center">{{ $no++ }}</td>
                  <td>{{ $serv->nm_service }}</td>
                  <td>{{ $serv->data_limit }}</td>
                  <td>Rp.{{ number_format($serv->harga),0,',','.' }} ,-</td>
                  <td align="center">
                  @if ($serv->type_service==0)
                    Service Pokok
                  @elseif ($serv->type_service==1)
                    Promosi
                  @endif
                </td>
                  <td align="center">
                      <div class="btn-group">
                        <button title="Edit" type="button" class="btn btn-warning btn-xs ubahService" data-toggle="modal" data-target="#ubah" value="{{ $serv->id_service }}"><span class="fa fa-pencil"></span></button>
                        <button title="Hapus" type="button" class="btn btn-danger btn-xs hapusService" data-toggle="modal" data-target="#delete" value="{{ $serv->id_service }}"><span class="fa fa-trash"></span></button>
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
  @include('admin.service.service_tambah')
  @include('admin.service.service_ubah')
  @include('admin.service.service_delete')
@endsection
