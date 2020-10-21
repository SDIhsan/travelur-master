<button data-toggle="modal" data-target="#Delete<?= $tr->id_trans; ?>" type="button" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
    <i class="fas fa-trash-alt"></i>
</button>

<div class="modal modal-danger fade" id="Delete<?= $tr->id_trans; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Menghapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data Transportasi <b><?= $tr->deskripsi; ?></b>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"><i class="fa fa-close"></i>
                    Batal</button>
                <a href="<?= base_url('ro-admin/index/delete_trans/' . $tr->id_trans) ?>" class="btn btn-danger pull-right"><i class="fa fa-trash-o"></i> Ya, Hapus data ini</a>
            </div>
        </div>
    </div>
</div>