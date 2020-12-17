<?= $this->extend('layout/template'); ?> 

<?= $this->section('hero'); ?>
<?php foreach ($account as $myaccount) : ?>
<h1> Nama : <?= $myaccount['username'] ?> </h1>
<h1> Password : <?= $myaccount['password']; ?></h1>
<?php endforeach; ?>
<?= $this->endSection(); ?>