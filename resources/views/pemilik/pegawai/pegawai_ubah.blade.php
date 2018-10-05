<div id="ubah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Pegawai</h4>
            </div>
            <div class="modal-body">

            <!--FORM-->
            <form id="formPegawaiUbah" class="form-horizontal form-label-left" action="{{ route('pegawai.insert') }}" data-parsley-validate method="post" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="item form-group ">
                            <label for="nm_lengkap">Nama Lengkap * :</label>
                            <div class="col-md-12 col-sm-12 col-xs-12 input-group">
                                <input type="text" id="nm_lengkap" class="form-control" name="nm_lengkap" required />
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="tgl-lahir">Tanggal Lahir * :</label>
                            <div class="col-md-8 col-sm-8 col-xs-12 input-group date" id="DatePegawaiUbah">
                            <input id="tgl_lahir" name="tgl_lahir" type="text" class="form-control" data-inputmask="'mask': '9999-99-99','placeholder':''" placeholder="Tahun-Bulan-Tanggal" required  readonly="readonly" value="{{ date('Y-m-d') }}"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="jk">Jenis Kelamin * :</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                                <select id="jk" name="jk" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="0">Wanita</option>
                                    <option value="1">Pria</option>
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="tlp">Telepon * :</label>
                            <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                                <input id="tlp" name="tlp" type="text" class="form-control" data-inputmask="'mask' : '999999999999', 'placeholder':''" data-parsley-trigger="keyup" data-parsley-minlength="11" data-parsley-maxlength="12" data-parsley-minlength-message="Nomor Telepon Kurang"
                                data-parsley-validation-threshold="10" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="alamat">Alamat * :</label>
                            <div class="col-md-12 col-sm-12 col-xs-12 input-group">
                                <textarea id="alamat" required name="alamat" class="form-control"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                        <div class="item form-group ">
                            <label for="email">Email * :</label>
                            <div class="col-md-12 col-sm-12 col-xs-12 input-group">
                                <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />
                            </div>
                        </div>
                        <div class="item form-group ">
                            <label for="fullname">Username * :</label>
                            <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                                <input type="text" id="username" class="form-control" name="username" required />
                            </div>
                        </div>
                        <div class="item form-group ">
                            <label for="fullname">Password * :</label>
                            <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                                <input type="text" id="password" class="form-control" name="password" />
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="foto" >Foto * :</label>
                            <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                                <img id="fotoPegawaiUbah" src="" alt="" class="img-thumbnail img-responsive " width="100">
                                <div class="form-control">
                                    <input type="file" name="foto" id="foto" class=""  data-parsley-fileextension='jpg' data-parsley-trigger="keyup">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Batal</button>
                <button type="submit" id="send" class="btn btn-success">Simpan</button>
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
            </div>
            </form>
                <!--endform-->
        </div>
    </div>
</div>


