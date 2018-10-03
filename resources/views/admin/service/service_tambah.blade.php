<div id="add" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Service</h4>
            </div>
            <div class="modal-body">

            <!--FORM-->
            <form id="formServiceTambah" class="form-horizontal form-label-left" action="{{ route('service.insert') }}" data-parsley-validate method="post" >
                {{ csrf_field() }}
                <div class="item form-group ">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_paket">Nama Service <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                        <input id="nm_service" class="form-control col-md-7 col-xs-12" name="nm_service" type="text" required>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Data Limit <span class="required">*</span></label>
                    <div class="col-md-5 col-sm-5 col-xs-12 input-group">
                        <input id="data_limit" name="data_limit" type="text" class="form-control" data-inputmask="'mask' : '99999999999', 'placeholder':''" required>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga<span class="required">*</span></label>
                    <div class="col-md-5 col-sm-5 col-xs-12 input-group">
                        <input id="harga" name="harga" type="text" class="form-control" data-inputmask="'mask' : '99999999999', 'placeholder':''" required>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paket">Type Service <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                        <select id="type_service" name="type_service" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="0">Service Pokok</option>
                            <option value="1">Promo</option>
                        </select>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Batal</button>
                    <button type="submit" id="send" class="btn btn-success">Simpan</button>
                </div>
            </form>
                <!--endform-->

        </div>
    </div>
</div>

