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
                        <a class="nav-link" href="<?= BASEURL ?>/user/gejala">Gejala</a>
                    </li>
                    <li class=" nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>/user/diagnosa">Diagnosa</a>
                    </li>
                    <li class="nav-item active">
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
    <?php

    ?>

    <div class="container-hero">
        <div class="d-flex justify-content-start">
            <!-- <img class="ukuran" src="<?= BASEURL ?>/public/Asset/ikan.png" alt=""> -->
            <div class="justify-content-center align-item-center ">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penyakit</th>
                            <th>Keterangan Penyakit</th>
                            <th>Solusi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- letakkan proses menampilkan disini -->
                        <?php foreach ($data['penyakit'] as $penyakit) : ?>
                            <tr>
                                <td><?= $penyakit['id_penyakit']; ?></td>
                                <td><?= $penyakit['nama_penyakit']; ?></td>
                                <td><?= $penyakit['keterangan_penyakit']; ?></td>
                                <td><?= $penyakit['solusi']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
 
    </div>
</section>