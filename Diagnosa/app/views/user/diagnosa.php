<?php

if (empty($_SESSION['username'] and $_SESSION['role'])) {
    header('location:' . BASEURL);
    exit;
}
if (!empty($_SESSION['username']) and $_SESSION['role'] == "admin") {
    header('location:' . BASEURL . '/user');
    exit;
}
?>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand me-auto" href="<?= BASEURL ?>/user">Diagnosa Ikan</a>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Diagnosa Ikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 " aria-current="page" href="<?= BASEURL ?>/user">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= BASEURL ?>/user/gejala">Gejala</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active" href="<?= BASEURL ?>/user/diagnosa">Diagnosa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>/user/penyakit">Penyakit</a>
                    </li>


            </div>
        </div>
        <a href="<?= BASEURL; ?>/user/logout" class="login-button">Logout</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<section class="hero-section">
    <div class="container-hero">

        <!-- <img class="ukuran" src="<?= BASEURL ?>/public/Asset/ikan.png" alt=""> -->

        <h3 class="text-center">Pilih Jenis Ikan Yang ingin di konsultasikan</h3>
        <div class="d-flex justify-content-around align-item-center flex-wrap jenis-ikan">
            <div class="label-jenis">
                <a href="<?= BASEURL ?>/user/nila" class="Ikan">
                    <div class="label text-center">Nila</div>
                    <img class="ukuran1" src="<?= BASEURL ?>/public/Asset/Nila.png" alt="">
                </a>
            </div>
            <div class="label-jenis">
                <a href="<?= BASEURL ?>/user/gurame" class="Ikan">
                    <img class="ukuran1" src="<?= BASEURL ?>/public/Asset/Gurame.png" alt="">
                </a>
            </div>
            <div class="label-jenis">
                <a href="<?= BASEURL ?>/user/lele" class="Ikan">
                    <img class="ukuran1" src="<?= BASEURL ?>/public/Asset/Lele.png" alt="">
                </a>
            </div>
        </div>
    </div>
</section>