<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link href="<?= BOOSTRAP_CSS ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL ?>/public/css/admin.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">


</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex justify-content-start">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="<?= BASEURL; ?>/admin">Admin Diagnosa</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="<?= BASEURL; ?>/admin/profile" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="<?= BASEURL; ?>/admin/basis" class="sidebar-link">
                        <img src="<?= BASEURL ?>/public/Asset/icon/rules.png" alt="" class="icon-img">
                        <span>Basis Aturan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="<?= BASEURL; ?>/admin/penyakit" class="sidebar-link">
                        <img src="<?= BASEURL ?>/public/Asset/icon/desease.png" alt="" class="icon-img">
                        <span>Penyakit</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="<?= BASEURL; ?>/admin/gejala" class="sidebar-link">
                        <img src="<?= BASEURL ?>/public/Asset/icon/pengobatan.png" alt="" class="icon-img">
                        <span>Gejala</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="<?= BASEURL; ?>/admin/histori" class="sidebar-link">
                        <img src="<?= BASEURL ?>/public/Asset/icon/history-book.png" alt="" class="icon-img">
                        <span>Gejala</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="<?= BASEURL; ?>/user/logout" class="sidebar-link">
                        <i class="lni lni-exit"></i>
                        <span>Logout</span>
                    </a>
                </li>



            </ul>
            <!-- <div class="sidebar-footer">
                <a href="<?= BASEURL; ?>/user/logout" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div> -->
        </aside>