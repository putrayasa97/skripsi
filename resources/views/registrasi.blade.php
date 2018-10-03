<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('assets/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/css/custom.min.css')}}" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
<link href="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="{{ asset('assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
<!-- Ion.RangeSlider -->

  </head>

  <body class="login">
      @include('templates.partials._alerts')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="x_panel">
          <div class="x_title">
            <h2>Regitrasi</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


        <form class="form-horizontal form-label-left" data-parsley-validate action="{{ route('reg') }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
        <p>Daftarkan Usaha Fitness Anda dengan mendapatkan layanan software Fitness untuk meningkatkan pelayanan pada usaha anda</p>
        <div id="wizard" class="form_wizard wizard_horizontal">
          <ul class="wizard_steps">
            <li>
              <a href="#step-1">
                <span class="step_no">1</span>
                <span class="step_descr">
                      Step 1<br />
                      <small>Data Usaha</small>
                </span>
              </a>
            </li>
            <li>
              <a href="#step-2">
                <span class="step_no">2</span>
                <span class="step_descr">
                        Step 2<br />
                        <small>Akun Pemilik</small>
                </span>
              </a>
            </li>
            <li>
              <a href="#step-3">
                <span class="step_no">3</span>
                <span class="step_descr">
                        Step 3<br />
                        <small>Akun Pegawai</small>
                </span>
              </a>
            </li>
          </ul>

          <div id="step-1">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nm_usaha">Nama Usaha <span class="required">*</span>
              </label>
              <div class="col-md-4 col-sm-4 col-xs-12 input-group">
                <input type="text" id="nm_usaha" name="nm_usaha" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_usaha">Email Usaha <span class="required">*</span>
              </label>
              <div class="col-md-5 col-sm-5 col-xs-12 input-group">
                <input type="text" id="email_usaha" name="email_usaha" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">Kota <span class="required">*</span>
              </label>
              <div class="col-md-4 col-sm-4 col-xs-12 input-group">
                <input type="text" id="kota" name="kota" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span></label>
              <div class="col-md-7 col-sm-7 col-xs-12 input-group">
                <textarea id="alamat_usaha" required name="alamat_usaha" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="web">Web <span class="required">*</span>
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12 input-group">
                <input type="text" id="web" name="web" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon <span class="required">*</span></label>
              <div class="col-md-3 col-sm-3 col-xs-12 input-group">
                <input id="tlp" name="tlp" type="text" class="form-control" data-inputmask="'mask' : '999999999999', 'placeholder':''" data-parsley-trigger="keyup" data-parsley-minlength="11" data-parsley-maxlength="12" data-parsley-minlength-message="Nomor Telepon Kurang"
                data-parsley-validation-threshold="10" required>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo" >Logo <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                <div class="form-control">
                  <input type="file" name="logo" id="logo" class=""  data-parsley-fileextension='jpg' data-parsley-trigger="keyup" required>
                </div>
              </div>
            </div>
          </div>


          <div id="step-2">
            <div class="form-group">
              <div class="col-md-8 col-md-offset-2">
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" id="username_pemilik" name="username_pemilik" placeholder="Username"  required="required">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="password" class="form-control has-feedback-left" id="password_pemilik" name="password_pemilik" placeholder="Password" required="required">
                    <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
              </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nm_pemilik">Nama Lengkap <span class="required">*</span>
              </label>
              <div class="col-md-5 col-sm-5 col-xs-12 input-group">
                <input type="text" id="nm_pemilik" name="nm_pemilik" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_pemilik">Email <span class="required">*</span>
              </label>
              <div class="col-md-4 col-sm-4 col-xs-12 input-group">
                <input type="text" id="email_pemilik" name="email_pemilik" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_lahir_pemilik">Tanggal Lahir <span class="required">*</span></label>
              <div class="col-md-3 col-sm-3 col-xs-12 input-group date" id="myDatepicker">
              <input id="tgl_lahir_pemilik" name="tgl_lahir_pemilik" type="text" class="form-control" data-inputmask="'mask': '9999-99-99','placeholder':''" placeholder="Tahun-Bulan-Tanggal" required  readonly="readonly" value="{{ date('Y-m-d') }}"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jk_pemilik">Jenis Kelamin <span class="required">*</span></label>
                <div class="col-md-3 col-sm-3 col-xs-12 input-group">
                  <select id="jk_pemilik" name="jk_pemilik" class="form-control" required>
                    <option value="">Pilih</option>
                    <option value="0">Wanita</option>
                    <option value="1">Pria</option>
                  </select>
                </div>
              </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat_pemilik">Alamat <span class="required">*</span></label>
              <div class="col-md-7 col-sm-7 col-xs-12 input-group">
                <textarea id="alamat_pemilik" required name="alamat_pemilik" class="form-control"></textarea>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon <span class="required">*</span></label>
              <div class="col-md-3 col-sm-3 col-xs-12 input-group">
                <input id="tlp_pemilik" name="tlp_pemilik" type="text" class="form-control" data-inputmask="'mask' : '999999999999', 'placeholder':''" data-parsley-trigger="keyup" data-parsley-minlength="11" data-parsley-maxlength="12" data-parsley-minlength-message="Nomor Telepon Kurang"
                  data-parsley-validation-threshold="10" required>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto_pemilik" >Foto <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                <div class="form-control">
                  <input type="file" name="foto_pemilik" id="foto_pemilik" class=""  data-parsley-fileextension='jpg' data-parsley-trigger="keyup" required>
                </div>
              </div>
            </div>
          </div>

          <div id="step-3">
            <div class="form-group">
              <div class="col-md-8 col-md-offset-2">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="username_pegawai" name="username_pegawai" placeholder="Username"  required="required">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="password" class="form-control has-feedback-left" id="password_pegawai" name="password_pegawai" placeholder="Password" required="required">
                  <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nm_pegawai">Nama Lengkap <span class="required">*</span>
              </label>
              <div class="col-md-5 col-sm-5 col-xs-12 input-group">
                <input type="text" id="nm_pegawai" name="nm_pegawai" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_pegawai">Email <span class="required">*</span>
              </label>
                <div class="col-md-4 col-sm-4 col-xs-12 input-group">
                  <input type="text" id="email_pegawai" name="email_pegawai" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_lahir_pegawai">Tanggal Lahir <span class="required">*</span></label>
              <div class="col-md-3 col-sm-3 col-xs-12 input-group date" id="myDatepicker1">
                <input id="tgl_lahir_pegawai" name="tgl_lahir_pegawai" type="text" class="form-control" data-inputmask="'mask': '9999-99-99','placeholder':''" placeholder="Tahun-Bulan-Tanggal" required  readonly="readonly" value="{{ date('Y-m-d') }}"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jk_pegawai">Jenis Kelamin <span class="required">*</span></label>
              <div class="col-md-3 col-sm-3 col-xs-12 input-group">
                <select id="jk_pegawai" name="jk_pegawai" class="form-control" required>
                  <option value="">Pilih</option>
                  <option value="0">Wanita</option>
                  <option value="1">Pria</option>
                </select>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat_pegawai">Alamat <span class="required">*</span></label>
              <div class="col-md-7 col-sm-7 col-xs-12 input-group">
                <textarea id="alamat_pegawai" required name="alamat_pegawai" class="form-control"></textarea>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon <span class="required">*</span></label>
              <div class="col-md-3 col-sm-3 col-xs-12 input-group">
                <input id="tlp_pegawai" name="tlp_pegawai" type="text" class="form-control" data-inputmask="'mask' : '999999999999', 'placeholder':''" data-parsley-trigger="keyup" data-parsley-minlength="11" data-parsley-maxlength="12" data-parsley-minlength-message="Nomor Telepon Kurang"
                data-parsley-validation-threshold="10" required>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto_pegawai" >Foto <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                <div class="form-control">
                  <input type="file" name="foto_pegawai" id="foto_pegawai" class=""  data-parsley-fileextension='jpg' data-parsley-trigger="keyup" required>
                </div>
              </div>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

    <!-- jQuery -->
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{ asset('assets/vendors/nprogress/nprogress.js')}}"></script>
    <!-- jQuery Smart Wizard-->
    <script src="{{ asset('assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/js/custom.min.js')}}"></script>

    <script src="{{ asset('assets/vendors/parsleyjs/dist/parsley.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/moment/min/moment.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="{{ asset('assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script>
      $('#myDatepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            ignoreReadonly: true,
            allowInputToggle: true
      });
      $('#myDatepicker1').datetimepicker({
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
  </body>
</html>

