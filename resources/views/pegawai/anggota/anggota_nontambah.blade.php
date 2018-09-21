@extends('templates.default')
@section('title', 'Anggota')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Non-Anggota</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <br />

      <!--FORM-->
      <form id="formAnggota" class="form-horizontal form-label-left" action="{{ route('anggota.noninsert') }}" data-parsley-validate method="post">
        {{ csrf_field() }}
        <div class="row">

          <div class="col-md-6 col-sm-6 col-xs-12">

            <div class="item form-group ">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Lengkap <span class="required">*</span></label>
              <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                  <input id="nama" class="form-control" name="nama" type="text" required>
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl-lahir">Tanggal Lahir <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12 input-group date" id="myDatepicker">
              <input id="tgl_lahir" name="tgl_lahir" type="text" class="form-control" data-inputmask="'mask': '9999-99-99','placeholder':''" placeholder="Tahun-Bulan-Tanggal" required  readonly="readonly" value="{{ date('Y-m-d') }}"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jk">Jenis Kelamin <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                  <select id="jk" name="jk" class="form-control" required>
                    <option value="">Pilih</option>
                    <option value="0">Wanita</option>
                    <option value="1">Pria</option>
                  </select>
                </div>
              </div>

              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                    <textarea id="alamat" required name="alamat" class="form-control"></textarea>
                  </div>
              </div>

          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pekerjaan">Pekerjaan <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                  <input id="pekerjaan" name="pekerjaan" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon <span class="required">*</span></label>
                <div class="col-md-5 col-sm-5 col-xs-12 input-group">
                  <input id="tlp" name="tlp" type="text" class="form-control" data-inputmask="'mask' : '999999999999', 'placeholder':''" data-parsley-trigger="keyup" data-parsley-minlength="11" data-parsley-maxlength="12" data-parsley-minlength-message="Nomor Telepon Kurang"
                    data-parsley-validation-threshold="10" required>
                </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paket">Tarif Perdatang <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                <select id="paket" name="paket" class="form-control" required>
                  <option value="">Pilih</option>
                  @foreach ($paketdtl as $paket)
                   <option value="{{ $paket->id_paketdtl }}">{{$paket->paket->nm_paket}} (Tarif Perdatang) - Rp {{number_format($paket->harga,0,',','.') }} ,-</option>
                  @endforeach
                </select>
              </div>
           </div>

          </div>

        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-12">
            <button type="submit" id="send" class="btn btn-success">Simpan</button>
          </div>
        </div>
      </form>
      <!--endform-->

      </div>
    </div>
  </div>
</div>
@endsection
@section('custom-js')
<script>
  $('#myDatepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        ignoreReadonly: true,
        allowInputToggle: true
  });
</script>
@endsection
