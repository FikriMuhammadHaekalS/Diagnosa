<?php
if (!session_id()) {
    session_start();
}
?>
<div class="main p-3">
    <div class="container-hero">
        <div class="d-flex justify-content-start ">
            <div class="justify-content-center align-item-center detail-penyakit " style="width: 100%;">
                <h2 class="text-center">Hasil Konsultasi</h2>
                <div class="row">
                    <div class="col-lg-6">
                  
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama User</label>
                            <input type="text" class="form-control" value="<?= $data['konsultasi'][0]['nama']; ?>" readonly>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <!-- Tabel List Gejala -->
                    <label for="">
                        <h2 class="text-center">Gejala Penyakit yang dipilih</h2>
                    </label>
                    <table class="table table-bordered tabel-gejala">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gejala pada penyakit</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no = 1; ?>
                            <?php foreach ($data['konsultasi'] as $gejala): ?>
                                <?php
                                $daftar_gejala = explode(', ', $gejala['nama_gejala']);
                                foreach ($daftar_gejala as $nama_gejala):
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?= $nama_gejala; ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div>
                        <!-- Hasil konsultasi -->
                        <label for="">
                            <h2 class="text-center">Hasil Konsultasi</h2>
                        </label>
                        <table class="table table-bordered tabel-gejala">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama penyakit</th>
                                    <!-- <th>Persentase</th> -->
                                    <th>Solusi penyakit</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1;
                                foreach ($data['penyakit'] as $penyakit) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $penyakit['nama_penyakit']; ?></td>
                                        <!-- <td><?= $penyakit['bobot']; ?></td> -->
                                        <td><?= $penyakit['solusi']; ?></td>

                                        <td>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="<?= BASEURL; ?>/user/konsultasi" class="btn btn-danger">Kembali</a>

                    </div>
                </div>
            </div>
        </div>
        <!-- <button class="btn btn-diagnosa justify-content-end">Diagnosa</button> -->
    </div>
</div>