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
                <a class="nav-link text-white ml-5" href="<?= base_url('/userAdmin'); ?>">Login</a> 
            </div>
        </div>
</nav> 
<?= $this->endSection(); ?>

<?= $this->section('hero'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="my-3">Ubah Komik</h1>
                <form action="/comic/update/<?= $comic['id']; ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="slug" value="<?= $comic['slug']; ?>" method="POST">
                    <input type="hidden" name="sampulLama" value="<?= $comic['sampul']; ?>">
                    <!-- <input type="hidden" name="sliderLama" value="<?= $comic['slider_img']; ?>"> -->
                    <div class="row mb-3">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $comic['judul'] ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $comic['penulis'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $comic['penerbit'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="sinopsis" name="sinopsis" value="<?= (old('sinopsis')) ? old('sinopsis') : $comic['sinopsis'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                        <div class="col-sm-2">
                            <img src="/img/<?= $comic['sampul']; ?>" alt="" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="imagePreview()">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('sampul'); ?>
                                </div>
                                <label class="custom-file-label" for="sampul"><?= $comic['sampul']; ?></label>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row mb-3">
                        <label for="slider_img" class="col-sm-2 col-form-label">Background Image</label>
                        <div class="col-sm-2">
                            <img src="/img/default.jpg" alt="" class="img-thumbnail img-slider-preview">
                        </div>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('slider_img')) ? 'is-invalid' : ''; ?>" id="slider_img" name="slider_img" onchange="imageSlider()">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('slider_img'); ?>
                                </div>
                                <label class="custom-file-label custom-file-label-slider" for="slider_img">Pilih Background</label>
                            </div>
                        </div>
                    </div> -->
                    
                    
                    <button type="submit" class="btn btn-primary">Change comic</button>
                    <a href="/comic" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
        
    </div>
<?= $this->endSection(); ?>