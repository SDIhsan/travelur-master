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
    <a href="<?= base_url('index/cari'); ?>">Cari</a> |
    <a href="<?= base_url('index/keranjang'); ?>">Keranjang</a> |
    <a href="<?= base_url('index/data_diri'); ?>">Data diri</a> |
    <a href="<?= base_url('index/logout'); ?>">Logout</a>
    <hr />
    <?php foreach ($user as $user) { ?>
        <table>
            <tbody>
                <tr>
                    <th>Nama Lengkap</th>
                    <td> : </td>
                    <td><?= $user['user_nama_lengkap']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td> : </td>
                    <td><?= $user['user_alamat']; ?></td>
                </tr>
                <tr>
                    <th>No. Hp</th>
                    <td> : </td>
                    <td><?= $user['user_telp']; ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td> : </td>
                    <td><?= $user['user_jk']; ?></td>
                </tr>
            </tbody>
        </table>

        <br>
        <hr>
        <form action="<?= base_url('index/data_diri_up') ?>" method="POST">
            <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
            <label for="">Nama Lengkap</label><br>
            <input type="text" name="user_nama_lengkao" value="<?= $user['user_nama_lengkap']; ?>"><br>
            <?= form_error('user_nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?><br><br>
            <label for="">Alamat</label><br>
            <textarea type="text" name="user_alamat"></textarea><br>
            <?= form_error('user_alamat', '<small class="text-danger pl-3">', '</small>'); ?><br><br>
            <label for="">No. Hp</label><br>
            <input type="number" name="user_telp"><br>
            <?= form_error('user_telp', '<small class="text-danger pl-3">', '</small>'); ?><br><br>
            <label for="">Jenis Kelamin</label><br>
            <select name="user_jk" id="">
                <option selected disabled></option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select><br>
            <?= form_error('user_jk', '<small class="text-danger pl-3">', '</small>'); ?><br>

            <?php if ($user['user_jk'] == '') { ?>
                <input type="submit" name="submit">
            <?php } else { ?>
                data sudah dilengkapi
            <?php } ?>
        </form>
    <?php } ?>
</body>

</html>