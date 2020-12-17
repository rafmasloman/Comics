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
                <a class="nav-link text-white ml-5" href="<?= base_url('/comic'); ?>">Comics</a> 
                <?php if (logged_in()) : ?>
                    <a class="nav-link text-white ml-5" href="/logout">Logout</a>
                <?php else : ?>
                    <a class="nav-link text-white ml-5" href="/login">Login</a>
                <?php endif ?> 
            </div>
        </div>
</nav> 
<?= $this->endSection(); ?>

<?= $this->section('hero'); ?>
<section class="container hero-3">
    <!-- <div class="card my-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/img/<?= $comics['sampul']; ?>" alt="..." class="card-img-top img-card">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $comics['judul']; ?></h5>
                <p class="card-text"> <span class="comic-subtext sinopsis">Sinopsis :</span> <?= $comics['sinopsis']; ?></p>
                <p class="card-text"> <span class="comic-subtext penulis">Penulis :</span> <?= $comics['penulis']; ?> </p>
                <p class="card-text"><span class="comic-subtext penerbit">Penerbit :</span> <?= $comics['penerbit']; ?></p>

                

                <?php if (logged_in()) : ?>
                    <a href="/comic/edit/<?= $comics['slug']; ?>" class="btn btn-info text-white mr-4">Edit</a>
                    <form action="/comic/<?= $comics['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                <?php endif ?> 
                
                <a href="/comic" class="d-flex">Kembali</a>

            </div>
            </div>
        </div>

    </div> -->

    <div class="row comic-row">
        <div class="col-4 mt-5">
            <img src="/img/<?= $comics['sampul']; ?>" alt="" class="img-fluid">
        </div>
        <div class="col-8">
        <div class="row title-row mt-5">
            <div class="col-8">
                <h1><?= $comics['judul']; ?></h1>
            </div>
        </div>

        <div class="row about-row mt-5">
            <div class="col-12">
                <p><span>Penulis : </span><?= $comics['penulis']; ?></p>
                <p><span>Penerbit:</span> <?= $comics['penerbit']; ?></p>
                <p><span>Sinopsis :</span> <?= $comics['sinopsis']; ?></p>
                <?php if (logged_in()) : ?>
                    <a href="/comic/edit/<?= $comics['slug']; ?>" class="btn edit-btn mr-4 my-3 mt-5">Edit</a>
                    <form action="/comic/<?= $comics['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn delete-btn my-3">Delete</button>
                    </form>
                <?php endif ?> 
            </div>
        </div>
        </div>
    </div>

    


</section>
<?= $this->endSection(); ?>