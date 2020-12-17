<?= $this->extend('layout/template'); ?>

<?= $this->section('navbar'); ?>
<nav class="navbar navbar-expand-lg navbar-light">
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
                <!-- <div class="input-group ml-5 mb-3">
                    <a class="btn btn-light" type="button" id="button-addon1">B</a>
                    <input type="text" class="form-control" placeholder="Search" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div> -->
            </div>
        </div>
</nav> 
<?= $this->endSection(); ?>

<?= $this->section('hero'); ?>


<?php 
        $aotJudul = '';
        $aotSinopsis = '';
        $aotSlug = '';
?>
<?php 
        $opJudul = '';
        $opSinopsis = '';
        $opSlug = '';
?>
<?php 
        $ftJudul = '';
        $ftSinopsis = '';
        $ftSlug = '';
?>
<?php foreach ($comics as $getComics): ?>
    

    <?php if($getComics['judul'] == "Attack On Titan"){
        $aotJudul = $getComics['judul'];
        $aotSinopsis = $getComics['sinopsis'];
        $aotSlug = $getComics['slug'];
        } 
        else if($getComics['judul'] == "One Piece") {
            $opJudul = $getComics['judul'];
            $opSinopsis = $getComics['sinopsis'];
            $opSlug = $getComics['slug'];
            $opBackground = $getComics['slider_img'];
        }
        else if($getComics['judul'] == "Naruto") {
            $ftJudul = $getComics['judul'];
            $ftSinopsis = $getComics['sinopsis'];
            $ftSlug = $getComics['slug'];
        }
    ?>
<?php endforeach ?>

<section class="hero">
        
        
        <div class="jumbotron jumbotron-fluid bg-transparent">
                    <div id="carouselExampleIndicators" class="carousel slide" >
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption h-100 w-95">
                            <div class="row">
                                <div class="col-lg-7 mt-5 text-left">
                                    <h2><?= $opJudul; ?></h2>
                                    <p><?= $opSinopsis; ?></p>
                                    <a class="btn mt-5 detail-btn" href="/comic/<?= $aotSlug;?>">Details</a>
                                </div>
                                <div class="col-lg-5 ">
                                    <img src="/img/simple/luffy.png" class="img-fluid mt-5 w-100" alt="...">
                                </div>
                            </div>
                        </div>
                        <img src="/img/slider/op_bg.svg" class=" w-100 slider-image" alt="...">
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption h-100 w-90">
                            <div class="row ">
                                <div class="col-lg-7 mt-5 text-left">
                                    <h2><?= $aotJudul; ?></h2>
                                    <p><?= $aotSinopsis; ?></p>
                                    <a class="btn mt-5 detail-btn" href="/comic/<?= $opSlug;?>">Details</a>
                                </div>
                                <div class="col-lg-5 mt-4">
                                    <img src="/img/simple/Captain Levi.png" class="img-fluid mt-5" alt="...">
                                    
                                </div>
                            </div>
                        </div>
                        <img src="/img/slider/aot_bg.svg" class="w-100 slider-image" alt="...">
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption h-100 w-90">
                                <div class="row">
                                    <div class="col-lg-7 mt-5 text-left">
                                        <h2><?= $ftJudul; ?></h2>
                                        <p><?= $ftSinopsis; ?></p>
                                        <a class="btn mt-5 detail-btn" href="/comic/<?= $ftSlug;?>">Details</a>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="/img/simple/naruto.png" class="img-fluid mt-5" alt="...">
                                    </div>
                                </div>
                        </div>
                        <img src="/img/slider/naruto_bg.svg" class="d-block w-100 slider-image" alt="...">
                    </div>
        </div>
    
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" ></span>
        <span class="sr-only w-10">Next</span>
    </a>
    </div>
</section>

<section class="hero-2 container-fluid">
    <div class="row ">
        <div class="col-lg-3">
            <h1>Komik Favorit</h1>
        </div>
        <div class="col-lg-9">
            <span class="line-horizontal"></span>
            <a href="/comic" class="btn see-all-btn">Lihat Semua</a>
        </div>
    </div>

    <div class="row row-hero w-100 container mt-5">
        <?php foreach ($comics as $getComics): ?>
            <?php if($getComics['judul'] == "Attack On Titan" || $getComics['judul'] == 'One Piece'): ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-4">
                            <img src="/img/<?= $getComics['sampul']; ?>" class="card-img" alt="...">
                        </div>
                        <div class="col-8 ">
                            <div class="card-body ml-5">
                                <h5 class="card-title card-title-home"><?= $getComics['judul']; ?></h5>
                                <p class="card-text card-text-home mb-5"><?= $getComics['penulis']; ?></p>
                                <a href="/comic/<?= $getComics['slug']; ?>" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
<?= $this->endSection(); ?>