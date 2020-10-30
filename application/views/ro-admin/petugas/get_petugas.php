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
                            Tambah Petugas
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 7%">#</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($petugas as $pe) {
                                ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $pe->username; ?></td>
                                        <td><?= $pe->nama_lengkap; ?></td>
                                        <td><?= $pe->level; ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="modal" data-target="#editModal<?= $pe->id_petugas ?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
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

<!-- Modal Add -->
<div class="modal fade" id="addRowModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <span class="fw-mediumbold">
                        Tambah Petugas </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('ro-admin/index/create_pe') ?>" method="POST">
                    <p class="small">*Tambahkan petugas yang akan disediakan</p>
                    <div class="form-group">
                        <label>Username</label>
                        <input id="addName" name="username" type="text" class="form-control" placeholder="Masukan username petugas">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input id="addName" name="nama_lengkap" type="text" class="form-control" placeholder="Masukan nama lengkap petugas">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="addName" name="password" type="password" class="form-control" placeholder="Masukan password">
                        <small class="text-danger">*min 5 karakter</small>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option selected disabled></option>
                            <option value="Admin">Admin</option>
                            <option value="Petugas">Petugas</option>
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
foreach ($petugas as $pe) { ?>
    <div class="modal fade" id="editModal<?= $pe->id_petugas; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            Edit Petugas </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('ro-admin/index/edit_pe') ?>" method="POST">
                        <p class="small">*Edit petugas yang akan disediakan</p>
                        <input type="hidden" name="id_petugas" value="<?= $pe->id_petugas; ?>">
                        <!-- <?= var_dump($pe) ?> -->
                        <div class="form-group">
                            <label>Username</label>
                            <input id="addName" name="username" type="text" class="form-control" value="<?= $pe->username; ?>" placeholder="Masukan username petugas">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input id="addName" name="nama_lengkap" type="text" class="form-control" value="<?= $pe->nama_lengkap ?>" placeholder="Masukan nama lengkap petugas">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="addName" name="password" type="password" class="form-control" placeholder="Masukan password baru">
                            <small class="text-danger">*min 5 karakter (kosongkan saja jika tidak mengubah password</small>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="form-control">
                                <option value="Admin" <?php if ($pe->level == "Admin") {
                                                            echo "selected";
                                                        } ?>>Admin</option>
                                <option value="Petugas" <?php if ($pe->level == "Petugas") {
                                                            echo "selected";
                                                        } ?>>Petugas</option>
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