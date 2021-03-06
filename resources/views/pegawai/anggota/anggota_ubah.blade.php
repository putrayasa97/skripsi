 <div id="ubah" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Ubah Data Anggota</h4>
        </div>
        <div class="modal-body">

        <!--FORM-->
        <form id="formAnggotaEdit" class="form-horizontal form-label-left" action="{{ route('anggota.insert') }}" data-parsley-validate method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="item form-group ">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Lengkap <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                <input id="nama" class="form-control col-md-7 col-xs-12" name="nama" type="text" required>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-3" for="tgl-lahir">Tanggal Lahir <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12 input-group date" id="myDatepicker">
                <input id="tgl_lahir" name="tgl_lahir" type="text" class="form-control" data-inputmask="'mask': '9999-99-99','placeholder':''" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-minlength-message="Tanggal Lahir Kurang"
                data-parsley-validation-threshold="8" required  readonly="readonly" value="{{ date('Y-m-d')}}"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                <textarea id="alamat" required name="alamat" class="form-control col-md-7 col-xs-12"></textarea>
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
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pekerjaan">Pekerjaan <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                <input id="pekerjaan" name="pekerjaan" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Telepon <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                <input id="tlp" name="tlp" type="text" class="form-control" data-inputmask="'mask' : '999999999999', 'placeholder':''" data-parsley-trigger="keyup" data-parsley-minlength="11" data-parsley-maxlength="12" data-parsley-minlength-message="Nomor Telepon Kurang"
                data-parsley-validation-threshold="10" required>
              </div>
            </div>
           <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto" >Foto <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                <img id="fotoAnggotaUbah" src="" alt="" class="img-thumbnail img-responsive " width="100">
                <div class="form-control">
                  <input type="file" name="foto" id="foto" class=""  data-parsley-fileextension='jpg' data-parsley-trigger="keyup">
                </div>
              </div>
          </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal">Batal</button>
            <button type="submit" id="send" class="btn btn-success">Edit</button>
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
          </div>
      </form>
        <!--endform-->

    </div>
  </div>
</div>

  @section('custom-js')
<script>
  $('#myDatepicker').datetimepicker({
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