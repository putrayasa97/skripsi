<div id="detail" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel2">Detail Anggota</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <center>
                                    <img src="{{ asset('assets/images/img.jpg') }}" alt="" class="img-thumbnail img-responsive" width="250">
                                </center>
                                <br>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <h3 id="dnama"></h3></br>
                                <table class="table">
                                    <tr>
                                        <td width="130"><strong><i class="fa fa-calendar"></i> Tanggal Lahir </strong></td>
                                        <td width="5"> : </td>
                                        <td id="dtgl_lahir"></td>
                                    </tr>
                                    <tr>
                                        <td><strong><i class="fa fa-building"></i> Alamat </strong></td>
                                        <td> : </td>
                                        <td id="dalamat"></td>
                                    </tr>
                                    <tr>
                                        <td><strong><i class="fa fa-male"></i> Jenis Kelamin </strong></td>
                                        <td> : </td>
                                        <td id="djk"></td>
                                    </tr>
                                    <tr>
                                        <td><strong><i class="fa fa-briefcase"></i> Pekerjaan </strong></td>
                                        <td> : </td>
                                        <td id="dpekerjaan"></td>
                                    </tr>
                                    <tr>
                                        <td><strong><i class="fa fa-phone"></i> Telepon </strong></td>
                                        <td> : </td>
                                        <td id="dtlp"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>