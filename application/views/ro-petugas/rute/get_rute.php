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
                        <!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Tambah Rute
                        </button> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 7%">#</th>
                                    <th>Tanggal Keberangkatan</th>
                                    <th>Rute Dari</th>
                                    <th>Rute Ke</th>
                                    <th>Harga</th>
                                    <th>Transportasi</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($rute as $ru) {
                                ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $ru->tgl_keberangkatan; ?></td>
                                        <td><?= $ru->rute_dari; ?></td>
                                        <td><?= $ru->rute_ke; ?></td>
                                        <td><?= $ru->harga; ?></td>
                                        <td><?= $ru->deskripsi; ?></td>
                                        <!-- <td>
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="modal" data-target="#editModal<?= $ru->id_rute ?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <?php include 'delete.php' ?>
                                            </div>
                                        </td> -->
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

<!-- Modal Add
<div class="modal fade" id="addRowModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <span class="fw-mediumbold">
                        Tambah rute Transportasi </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('ro-admin/index/create_rute') ?>" method="POST">
                    <p class="small">*Tambahkan rute yang akan disediakan</p>
                    <div class="form-group">
                        <label>Tanggal Keberangkatan</label>
                        <input id="addName" name="tgl_keberangkatan" type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Rute Dari</label>
                        <input id="addName" name="rute_dari" type="text" class="form-control" placeholder="Masukan rute awal transportasi">
                    </div>
                    <div class="form-group">
                        <label>Rute Ke</label>
                        <input id="addName" name="rute_ke" type="text" class="form-control" placeholder="Masukan rute tujuan transportasi">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                            </div>
                            <input type="number" name="harga" class="form-control" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tipe Transportasi</label>
                        <select name="trans_id" class="form-control">
                            <option selected disabled></option>
                            <?php foreach ($trans as $tr) { ?>
                                <option value="<?= $tr->id_trans; ?>"><?= $tr->deskripsi; ?></option>
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

<!-- Modal Edit
<?php $no = 0;
foreach ($rute as $ru) { ?>
    <div class="modal fade" id="editModal<?= $ru->id_rute; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            Edit Rute Transportasi </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('ro-admin/index/edit_rute') ?>" method="POST">
                        <p class="small">*Edit rute transportasi yang akan disediakan</p>
                        <input type="hidden" name="id_rute" value="<?= $ru->id_rute; ?>">
                        <div class="form-group">
                            <label>Tanggal Keberangkatan</label>
                            <input id="addName" name="tgl_keberangkatan" type="date" class="form-control" value="<?= $ru->tgl_keberangkatan; ?>">
                        </div>
                        <div class="form-group">
                            <label>Rute Dari</label>
                            <input id="addName" name="rute_dari" type="text" class="form-control" value="<?= $ru->rute_dari; ?>" placeholder="Masukan rute awal transportasi">
                        </div>
                        <div class="form-group">
                            <label>Rute Ke</label>
                            <input id="addName" name="rute_ke" type="text" class="form-control" value="<?= $ru->rute_ke; ?>" placeholder="Masukan rute tujuan transportasi">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                </div>
                                <input type="number" name="harga" class="form-control" value="<?= $ru->harga; ?>" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tipe Transportasi</label>
                            <select name="trans_id" class="form-control">
                                <option selected disabled></option>
                                <?php foreach ($trans as $tr) { ?>
                                    <option value="<?= $tr->id_trans; ?>" <?php if ($ru->trans_id == $tr->id_trans) {
                                                                                echo "selected";
                                                                            } ?>><?= $tr->deskripsi; ?></option>
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