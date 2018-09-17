<div id="delete" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel2">Peringatan</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin menghapus data ini ?</p>
          </div>
        <div class="modal-footer">
          <form id="TarifDelete" action="" method="post">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
            <input type="hidden" id="id_paket" name="id_paket">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success">Ya</button>
          </form>
        </div>
      </div>
    </div>
  </div>