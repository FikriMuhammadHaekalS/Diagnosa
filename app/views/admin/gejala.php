<?php
if (!session_id()) {
    session_start();
}
?>
<div class="main p-3">
    <div class="container-hero">
        <div class="d-flex justify-content-start ">
            <div class="justify-content-center align-item-center custom-penyakit ">
                <h2 class="text-center">Gejala Ikan</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <?php Flasher::flash(); ?>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary tambahGejala" data-bs-toggle="modal" data-bs-target="#formGejala">
                    Tambah Data Gejala
                </button>
                <table class="table table-bordered tabel-gejala" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Gejala</th>
                            <th>Nama Ikan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- letakkan proses menampilkan disini -->
                        <?php $no = 1;
                        foreach ($data['gejala'] as $gejala) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $gejala['nama_gejala']; ?></td>
                                <td><?= $gejala['nama_ikan'];?></td>
                                <td>
                                    <!-- <div class="d-flex flex-row mb-3"> -->
                                    <a href="<?= BASEURL; ?>/admin/getUbahGejala" class="badge text-center text-bg-primary ubahGejala" data-bs-toggle="modal" data-bs-target="#formGejala" data-gejala="<?= $gejala['id_gejala']; ?>">Ubah</a>
                                    <a href="<?= BASEURL; ?>/admin/hapusGejala/<?= $gejala['id_gejala']; ?>" class="badge text-center text-bg-danger ubahGejala" onclick="return confirm('Hapus data');">Hapus</a>
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
<div class="modal fade" id="formGejala" tabindex="-1" aria-labelledby="TambahDataGejala" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="TambahDataGejala">Tambah Data Gejala</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/tambahGejala" method="post">
                    <input type="hidden" name="id_gejala" id="idGejala">
                    <div class="mb-3">
                        <label for="nama_gejala" class="form-label">Nama Gejala</label>
                        <input type="text" class="form-control" id="namaGejala" name="nama_gejala">
                        <label for="role">Pilih Ikan:</label>
                        <select name="nama_ikan" id="nama_ikan" required>
                        <?php foreach ($data['ikan'] as $ikan) : ?>
                            <option value="<?= $ikan['nama_ikan']; ?>"><?= $ikan['nama_ikan']; ?></option>
                            <?php endforeach; ?>
                        </select><br><br>
                    </div>
                    <!-- <div class="mb-3">
                        <select class="form-select form-select-md mb-3 " aria-label="Large select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Nila</option>
                            <option value="2">Lele</option>
                            <option value="3">Gurame</option>
                        </select>
                    </div> -->

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Penyakit</button>
                </form>
            </div>
        </div>
    </div>
</div>