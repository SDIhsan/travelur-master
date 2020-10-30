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

    <form action="<?= base_url('index/cari'); ?>" method="POST">
        <table>
            <td>
                <input type="text" name="keyword">
                <?= form_error('keyword', '<small class="text-danger pl-3">', '</small>'); ?>
            </td>
            <td>
                <button type="submit">Submit</button>
            </td>
        </table>
    </form>
    <br><br><br>

    <table border="2">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Berangkat</th>
                <th>Dari</th>
                <th>Tujuan ke</th>
                <th>Harga</th>
                <th>Tipe</th>
                <th>Pesan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($rute) > 0) {
                $i = 1;
                foreach ($rute as $ru) { ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <!-- <td><?= var_dump($ru) ?></td> -->
                        <td><?= $ru->tgl_keberangkatan; ?></td>
                        <td><?= $ru->rute_dari; ?></td>
                        <td><?= $ru->rute_ke; ?></td>
                        <td><?= $ru->harga; ?></td>
                        <td><?= $ru->description; ?></td>
                        <!-- <td><?= $ru->deskripsi; ?></td> -->
                        <td>
                            <a href="<?= base_url('index/booking/') . $ru->id_rute; ?>">Booking</a>
                        </td>
                    </tr>
                <?php $i++;
                }
            } else { ?>
                <tr>
                    <td colspan="6" align="center">Data tidak ditemukan</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>