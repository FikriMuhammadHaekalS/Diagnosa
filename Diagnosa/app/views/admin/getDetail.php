<?php
if (!session_id()) {
    session_start();
}
?>
<div class="main p-3">
    <div class="container-hero">
        <div class="d-flex justify-content-start ">
            <div class="justify-content-center align-item-center detail-penyakit " style="width: 100%;">
                <h2 class="text-center">Halaman Detail</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <?php Flasher::flash(); ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Penyakit</label>
                            <input type="text" class="form-control" value="<?= $data['detail_gejala']['nama_penyakit']; ?>" name="sakit" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea class="form-control" value="" name="ket" readonly><?= $data['detail_gejala']['keterangan_penyakit']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <!-- Tabel List Gejala -->
                    <label for="">
                        <h2 class="text-center">Gejala Penyakit</h2>
                    </label>
                    <table class="table table-bordered tabel-gejala">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gejala pada penyakit</th>
                                <!-- <th>aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no = 1;
                            foreach ($data['list_gejala'] as $gejala) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $gejala['nama_gejala']; ?></td>
                                    <td>
                                        <!-- <div class="d-flex flex-row mb-3"> -->
                                        <!-- <a href="<?= BASEURL; ?>/admin/getUbahGejala" class="badge text-center text-bg-primary ubahGejala" data-bs-toggle="modal" data-bs-target="#formGejala" data-gejala="<?= $gejala['id_gejala']; ?>">Ubah</a> -->

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="<?= BASEURL; ?>/admin/basis/" class="btn btn-danger badge text-center fs-6 ubahGejala" style="width: 100px; height: 30px; text-decoration:none;">Kembali</a>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- <button class="btn btn-diagnosa justify-content-end">Diagnosa</button> -->
    </div>
</div>