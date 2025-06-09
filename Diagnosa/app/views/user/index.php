<?php
if (empty($_SESSION['username'] and $_SESSION['role'])) {
    header('location:' . BASEURL);
    exit;
}
// if (!empty($_SESSION['username']) and $_SESSION['role'] == "admin") {
//     header('location:' . BASEURL . '/user');
//     exit;
// }
if ($_SESSION['role'] == "admin") {
    header('location:' . BASEURL . '/admin');
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
                        <a class="nav-link mx-lg-2 active" aria-current="page" href="<?= BASEURL ?>/user">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>/user/gejala">Gejala</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>/user/basis-aturan">aturan</a>
                    </li> -->
                    <li class=" nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>/user/diagnosa">Diagnosa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>/user/penyakit">Penyakit</a>
                    </li>


            </div>
        </div>
        <a href="<?= BASEURL; ?>/user/logout" class="login-button">Logout</a>

    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </div>
</nav>

<section class="hero-section">
    <div class="container-hero">
        <div class="d-flex justify-content-start">
            <img class="ukuran" src="<?= BASEURL ?>/public/Asset/ikan.png" alt="">
            <div class="justify-content-center align-item-center ">
                <h1><?php
                    if (!empty($_SESSION['username']) and $_SESSION['role'] == "user") {
                        echo "Selamat datang " . $_SESSION['username'] . " di sistem diagnosa ikan <br>";
                        // printf($_SESSION['role']);
                    }
                    ?></h1>
                <p>Sistem pakar penyakit ikan ini merupakan sebuah sistem yang digunakan untuk mendiagnosa awal jenis penyakit pada ikan yang menyerang pada ikan dan juga menular satu sama lain bedasarkan gejala yang dialami. Proses diagnosa dimulai dari menentukan gejala-gejala yang dialami, dengan menggunakan forward chaining sehingga sistem mampu memberikan keputusan tentang diagnosa awal serta penanganannya</p>
                <p  style="height: 300px;"></p>
            </div>
        </div>
        <!-- <button class="btn btn-diagnosa justify-content-end">Diagnosa</button> -->
    </div>
</section>