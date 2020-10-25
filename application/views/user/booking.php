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

    <a href="<?= base_url('index/logout'); ?>">Logout</a>
    <hr />

    <form action="<?= base_url('index/booking_p'); ?>" method="POST">
        <table>
            <tr>
                <td>
                    <label for="">Kode Booking</label>
                </td>
                <td>
                    <input type="text" name="kode_reservasi" value="<?= $kode; ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Nama Lengkap</label>
                </td>
                <td>
                    <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id'); ?>">
                    <input type="text" value="<?= $this->session->userdata('user_nama_lengkap'); ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Rute dari</label>
                </td>
                <td>
                    <input type="hidden" name="rute_id" value="<?= $rute->id_rute; ?>">
                    <input type="text" value="<?= $rute->rute_dari; ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Rute Ke</label>
                </td>
                <td>
                    <input type="text" value="<?= $rute->rute_ke; ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Berangkat pada</label>
                </td>
                <td>
                    <input type="date" name="keberangkatan" value="<?= $rute->tgl_keberangkatan; ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Harga Tiket</label>
                </td>
                <td>
                    <input type="text" name="harga" value="<?= 'Rp ' . number_format($rute->harga); ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>