<div id="ubahperdatang" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Tarif Perdatang</h4>
            </div>
            <div class="modal-body">

            <!--FORM-->
            <form id="formPerdatangUbah" class="form-horizontal form-label-left" action="{{ route('paket.insertperdatang') }}" data-parsley-validate method="post" >
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="item form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="harga">Harga <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                            <input id="harga" class="form-control col-md-7 col-xs-12" name="harga" type="text" required>
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

