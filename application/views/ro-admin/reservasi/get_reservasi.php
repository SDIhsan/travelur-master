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
                                    <th style="width: 5%">#</th>
                                    <th>Kode Reservasi</th>
                                    <th>Pemesanan Pada</th>
                                    <th>Tanggal Reservasi</th>
                                    <th>Keberangkatan</th>
                                    <th>Harga</th>
                                    <th>Nama User</th>
                                    <th>Transportasi</th>
                                    <th>Status</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($reservasi as $reser) {
                                ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $reser->tgl_keberangkatan; ?></td>
                                        <td><?= $reser->reservasi_pada; ?></td>
                                        <td><?= $reser->tgl_reservasi; ?></td>
                                        <td><?= $reser->keberangkatan; ?></td>
                                        <td><?= $reser->harga; ?></td>
                                        <td><?= $reser->user_nama; ?></td>
                                        <td><?= $reser->deskripsi; ?></td>
                                        <td><?= $reser->status; ?></td>
                                        <!-- <td>
                                            <div class="form-button-action">
                                                <!-- <a type="button" data-toggle="modal" data-target="#editModal<?= $ru->id_rute ?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
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