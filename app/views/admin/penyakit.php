<?php
if (!session_id()) {
    session_start();
}
?>
<div class="main p-3">
    <div class="container-hero">
        <div class="d-flex justify-content-start ">
            <!-- <img class="ukuran" src="<?= BASEURL ?>/public/Asset/ikan.png" alt=""> -->
            <div class="justify-content-center align-item-center custom-penyakit ">
                <h2 class="text-center">Penyakit Ikan</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <?php Flasher::flash(); ?>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary tambahPenyakit" data-bs-toggle="modal" data-bs-target="#formPenyakit">
                    Tambah Data Penyakit
                </button>
                <table class="table table-bordered tabel-penyakit" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penyakit</th>
                            <th>Keterangan Penyakit</th>
                            <th>Solusi</th>
                            <th>Nama Ikan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- letakkan proses menampilkan disini -->
                        <?php $no = 1;
                        foreach ($data['penyakit'] as $penyakit) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $penyakit['nama_penyakit']; ?></td>
                                <td><?= $penyakit['keterangan_penyakit']; ?></td>
                                <td><?= $penyakit['solusi']; ?></td>
                                <td><?= $penyakit['nama_ikan'];?></td>
                                <td>
                                    <!-- <div class="d-flex flex-row mb-3"> -->
                                    <a href="<?= BASEURL; ?>/admin/getUbahPenyakit" class="badge text-center text-bg-primary ubahPenyakit" data-bs-toggle="modal" data-bs-target="#formPenyakit" data-penyakit="<?= $penyakit['id_penyakit']; ?>">Ubah</a>
                                    <a href="<?= BASEURL; ?>/admin/hapusPenyakit/<?= $penyakit['id_penyakit']; ?>" class="badge text-center text-bg-danger ubahPenyakit" onclick="return confirm('Hapus data');">Hapus</a>
                                    <!-- </div> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <button class="btn btn-diagnosa justify-content-end">Diagnosa</button> -->
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="formPenyakit" tabindex="-1" aria-labelledby="TambahDataPenyakit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="TambahDataPenyakit">Tambah Data Penyakit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/tambahPenyakit" method="post">
                    <input type="hidden" name="id_penyakit" id="idPenyakit">
                    <div class="mb-3">
                        <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
                        <input type="text" class="form-control" id="namaPenyakit" name="nama_penyakit">
                        <div id="NamaPenyakitHelp" class="form-text">Isi Nama Penyakit</div>
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea id="keteranganPenyakit" name="keterangan_penyakit" class="form-control" placeholder="" style="height: 80px"></textarea>
                        <label for="keterangan_penyakit" class="form-label">Keterangan Penyakit</label>
                        <div id="KeteranganPenyakitHelp" class="form-text">Isi Keterangan Penyakit</div>
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea id="solusiPenyakit" name="solusi" class="form-control" placeholder="" style="height: 80px"></textarea>
                        <label for="solusi_penyakit" class="form-label">Solusi Penyakit</label>
                        <div id="SolusiPenyakitHelp" class="form-text">Isi Solusi Penyakit</div>
                    </div>
                    <select name="nama_ikan" id="nama_ikan" required>
                        <?php foreach ($data['ikan'] as $ikan) : ?>
                            <option value="<?= $ikan['nama_ikan']; ?>"><?= $ikan['nama_ikan']; ?></option>
                            <?php endforeach; ?>
                        </select><br><br>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Penyakit</button>
                </form>
            </div>
        </div>
    </div>
</div>