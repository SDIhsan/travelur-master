<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body>
    <br><br>
    <center>
        <h2>Login Admin</h2>
        <?= $this->session->flashdata('msg'); ?>
    </center>
    <center>
        <form action="<?= base_url('login') ?>" method="POST">
            <label for="">Username</label><br>
            <input type="text" name="username"><br>
            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?><br><br>
            <label for="">Password</label><br>
            <input type="password" name="password"><br>
            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?><br><br>
            <input type="submit" name="submit">
        </form>
    </center>
</body>

</html>