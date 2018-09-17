<div id="ubah" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Paket</h4>
            </div>
            <div class="modal-body">

            <!--FORM-->
            <form id="formPaketUbah" class="form-horizontal form-label-left" action="{{ route('paket.insert') }}" data-parsley-validate method="post" >
                {{ csrf_field() }}
                <div class="item form-group ">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_paket">Nama Paket <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                        <input id="nama_paket" class="form-control col-md-7 col-xs-12" name="nm_paket" type="text" required>
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

