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
                <!-- <div class="input-group mb-3 ml-5">
                    <a class="btn btn-light" type="button" id="button-addon1">B</a>
                    <input type="text" class="form-control" placeholder="Search" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div> -->
            </div>
        </div>
</nav> 
<?= $this->endSection(); ?>

<?= $this->section('hero'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
            <h1 class="my-3 comic-list">Comics List</h1>
            </div>
            <div class="col-lg-8 left-hero">
                <span class="line-horizontal mr-5"></span>
                <a href="/Comic/create" class="btn add-btn my-3 mr-5"> Add Comic </a>
            </div>
        </div>
        <div class="row">
            <?php foreach ($comics as $allcomics) :?>
              <div class="col-lg">
                <div class="card my-5" >
                <img src="/img/<?= $allcomics['sampul']; ?>" class="img-card " alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?= $allcomics['judul']; ?></h5>
                    <p><?= $allcomics['penulis']; ?></p>
                    <a href="/comic/<?= $allcomics['slug']; ?>" class="">Read More</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            
        </div>
        
    </div>
<?= $this->endSection(); ?>