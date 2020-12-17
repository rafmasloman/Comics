<?= $this->extend('layout/template'); ?>

<?= $this->section('navbar'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mx-5" href="#">Comic-cq</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto mx-5">
                <a class="nav-link text-white ml-5" href="<?= base_url('/'); ?>">Home</a>
                <!-- <a class="nav-link text-white ml-5" href="<?= base_url('/pages/about'); ?>">About</a> -->
                <a class="nav-link text-white ml-5" href="">Contact</a> 
                <a class="nav-link text-white ml-5" href="<?= base_url('/comic'); ?>">Comics</a> 
                <a class="nav-link text-white ml-5" href="<?= base_url('/userAdmin'); ?>">Login</a> 
            </div>
        </div>
</nav> 
<?= $this->endSection(); ?>

<?= $this->section('hero'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>About Me</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, dolor?</p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>