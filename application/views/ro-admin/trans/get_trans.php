<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
            </div>
        </div>
        <?= $this->session->flashdata('msg'); ?>
    </div>
</div>
<div class="page-inner mt--5">
    <diva class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?= $title; ?></h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Tambah Transportasi
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 7%">#</th>
                                    <th>Kode</th>
                                    <th>Deskripsi</th>
                                    <th>Kursi</th>
                                    <th>Tipe Transportasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($trans as $tr) {
                                ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $tr->kode; ?></td>
                                        <td><?= $tr->deskripsi; ?></td>
                                        <td><?= $tr->kursi; ?></td>
                                        <td><?= $tr->description; ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="modal" data-target="#editModal<?= $tr->id_trans ?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <?php include 'delete.php' ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addRowModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <span class="fw-mediumbold">
                        Tambah Tipe Transportasi </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('ro-admin/index/create_trans') ?>" method="POST">
                    <p class="small">*Tambahkan transportasi yang akan disediakan</p>
                    <div class="form-group">
                        <label>Kode</label>
                        <input id="addName" name="kode" type="text" class="form-control" value="<?= $kode; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input id="addName" name="deskripsi" type="text" class="form-control" placeholder="Masukan deskripsi transportasi">
                    </div>
                    <div class="form-group">
                        <label>Kursi</label>
                        <input id="addName" name="kursi" type="text" class="form-control" value="<?= $kursi; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tipe Transportasi</label>
                        <select name="type_trans_id" class="form-control">
                            <option selected disabled></option>
                            <?php foreach ($type_trans as $type) { ?>
                                <option value="<?= $type->id_type_trans; ?>"><?= $type->description; ?></option>
                            <?php } ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer no-bd">
                <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->

<!-- Modal Edit -->
<?php $no = 0;
foreach ($trans as $tr) { ?>
    <div class="modal fade" id="editModal<?= $tr->id_trans; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            Edit Tipe Transportasi </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('ro-admin/index/edit_trans') ?>" method="POST">
                        <p class="small">*Edit tipe transportasi yang akan disediakan</p>
                        <input type="hidden" name="id_trans" value="<?= $tr->id_trans; ?>">
                        <div class="form-group">
                            <label>Kode</label>
                            <input id="addName" name="kode" type="text" class="form-control" value="<?= $kode; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input id="addName" name="deskripsi" type="text" class="form-control" value="<?= $tr->deskripsi; ?>" placeholder="Masukan deskripsi transportasi">
                        </div>
                        <div class="form-group">
                            <label>Kursi</label>
                            <input id="addName" name="kursi" type="text" class="form-control" value="<?= $tr->kursi; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tipe Transportasi</label>
                            <select name="type_trans_id" class="form-control">
                                <option selected disabled></option>
                                <?php foreach ($type_trans as $type) { ?>
                                    <option value="<?= $type->id_type_trans; ?>" <?php if ($tr->type_trans_id == $type->id_type_trans) {
                                                                                        echo "selected";
                                                                                    } ?>><?= $type->description; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Modal Edit -->