<?php
if (!session_id()) {
    session_start();
}
?>
    <link rel="stylesheet" href="<?= BASEURL ?>/public/css/user.css">
<div class="main p-3">
    <div class="container-hero">
    <h3 class="text-center">Pilih Jenis Ikan Yang ingin di konsultasikan</h3>
        <div class="d-flex justify-content-around align-item-center flex-wrap jenis-ikan">
            <div class="label-jenis">
                <a href="<?= BASEURL; ?>/admin/tambahBasisAturanNila" class="Ikan">
                    <div class="label text-center">Nila</div>
                    <img class="ukuran1" src="<?= BASEURL ?>/public/Asset/Nila.png" alt="">
                </a>
            </div>
            <div class="label-jenis">
                <a href="<?= BASEURL; ?>/admin/tambahBasisAturanGurame" class="Ikan">
                    <img class="ukuran1" src="<?= BASEURL ?>/public/Asset/Gurame.png" alt="">
                </a>
            </div>
            <div class="label-jenis">
                <a href="<?= BASEURL; ?>/admin/tambahBasisAturanLele" class="Ikan">
                    <img class="ukuran1" src="<?= BASEURL ?>/public/Asset/Lele.png" alt="">
                </a>
            </div>
        </div>
   </div>
</div>