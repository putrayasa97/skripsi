<div id="perpanjang" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Perpanjang Paket</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <center>
                                    <img id="pfotoAnggota" src="" alt="" class="img-thumbnail img-responsive" width="250">
                                </center>
                                <br>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <h3 id="pnama"></h3></br>
                                <table class="table">
                                    <tr>
                                        <td width="130"><strong><i class="fa fa-calendar"></i> Tanggal Lahir </strong></td>
                                        <td width="5"> : </td>
                                        <td id="ptgl_lahir"></td>
                                    </tr>
                                    <tr>
                                        <td><strong><i class="fa fa-building"></i> Alamat </strong></td>
                                        <td> : </td>
                                        <td id="palamat"></td>
                                    </tr>
                                    <tr>
                                        <td><strong><i class="fa fa-male"></i> Jenis Kelamin </strong></td>
                                        <td> : </td>
                                        <td id="pjk"></td>
                                    </tr>
                                    <tr>
                                        <td><strong><i class="fa fa-briefcase"></i> Pekerjaan </strong></td>
                                        <td> : </td>
                                        <td id="ppekerjaan"></td>
                                    </tr>
                                    <tr>
                                        <td><strong><i class="fa fa-phone"></i> Telepon </strong></td>
                                        <td> : </td>
                                        <td id="ptlp"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <!--FORM-->
            <form id="formPerpanjang" class="form-horizontal form-label-left" action="{{ route('anggota.insert') }}" data-parsley-validate method="post" >
                {{ csrf_field() }}
                <input type="hidden" id="id_paket" name="id_paket">
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paket">Paket Langganan <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                      <select id="paket" name="paket" class="form-control" required>
                        <option value="">Pilih</option>
                        @foreach ($paketdtl as $paket)
                          <option value="{{ $paket->id_paketdtl }}">{{$paket->paket->nm_paket}} ({{$paket->bulan}} Bulan) - Rp {{number_format($paket->harga,0,',','.') }} ,-</option>
                        @endforeach
                      </select>
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

