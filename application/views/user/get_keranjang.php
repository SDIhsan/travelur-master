<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body>
    <h1><?= $title; ?></h1>Username : <?= $this->session->userdata('user_nama'); ?><br>
    <?= $this->session->flashdata('msg'); ?>
    <hr />
    <a href="<?= base_url('index'); ?>">Home</a> |
    <a href="<?= base_url('index/keranjang/' . $this->session->userdata('user_id')); ?>">Keranjang</a> |
    <a href="<?= base_url('index/data_diri'); ?>">Data diri</a> |
    <a href="<?= base_url('index/logout'); ?>">Logout</a>
    <hr />

    <table border="2">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Berangkat</th>
                <th>Dari</th>
                <th>Tujuan ke</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($reservasi as $reser) { ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $reser->keberangkatan; ?></td>
                    <td><?= $reser->rute_dari; ?></td>
                    <td><?= $reser->rute_ke; ?></td>
                    <td><?= $reser->harga; ?></td>
                    <td><?= $reser->status ?></td>
                </tr>
            <?php $i++;
            } ?>
    </table>

</body>

</html>