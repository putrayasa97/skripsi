<div id="ubah" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Tarif Paket</h4>
            </div>
            <div class="modal-body">

            <!--FORM-->
            <form id="formUbahTarif" class="form-horizontal form-label-left" action="{{ route('paket.inserttarif') }}" data-parsley-validate method="post" >
                <input type="hidden" id="id_paket" name="id_paket">
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Langganan">Langganan <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                        <select id="langganan" name="langganan" class="form-control" required>
                            <option value="" selected disabled>-- Pilih --</option>
                            <option value="0">Perdatang</option>
                             @for ($i=1; $i <= 12; $i++)
                                <option value="{{$i}}">{{$i}} Bulan</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="item form-group ">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_paket">Harga <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                        <input id="harga" class="form-control col-md-7 col-xs-12" name="harga" type="text" data-inputmask="'mask' : '999999999999','placeholder':''" required>
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

