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
    <a href="<?= base_url('index/cari'); ?>">Cari</a> |
    <a href="<?= base_url('index/keranjang/' . $this->session->userdata('user_id')); ?>">Keranjang</a> |
    <a href="<?= base_url('index/data_diri'); ?>">Data diri</a> |
    <a href="<?= base_url('index/logout'); ?>">Logout</a>
    <hr />

    <form action="<?= base_url('index/cari'); ?>" method="POST">
        <table>
            <td>
                <input type="text" name="keyword">
            </td>
            <td>
                <button type="submit">Submit</button>
            </td>
        </table>
    </form>
</body>

</html>