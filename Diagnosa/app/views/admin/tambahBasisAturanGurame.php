<?php
if (!session_id()) {
    session_start();
}
?>
<div class="main p-3">
    <div class="container-basis">
        <div class="custom-aturan">
            <form action="<?= BASEURL; ?>/admin/tambahAturanGurame" method="post" name="form">
                <h2 class="card-header mb-3 p-2 bg-primary">Penyakit Ikan</h2>
                <div class="card-body">
                    <div class="select-penyakit">
                        <label for="nama_aturan" class="form-label">Nama Penyakit</label>
                        <select class="form-control chosen" data-placeholder="Pilih Nama Penyakit" name="nama_penyakit">
                            <option value=""></option>
                            <?php foreach ($data['penyakit'] as $penyakit) : ?>
                                <option value="<?= $penyakit['nama_penyakit']; ?>"><?= $penyakit['nama_penyakit']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Tabel Data Gejala -->
                    <div class="form-group">
                        <label for="nama_aturan" class="form-label">Pilih Gejala</label>
                        <table class="table table-bordered tabel-aturan">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>No</th>
                                    <th>Nama Gejala</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- letakkan proses menampilkan disini -->
                                <?php $no = 1;
                                foreach ($data['gejala'] as $gejala) : ?>
                                    <tr>
                                        <td align="center"><input type="checkbox" name="id_gejala[]" value="<?= $gejala['id_gejala']; ?>" class="check-item"></td>
                                        <td><?= $no++; ?></td>
                                        <td><?= $gejala['nama_gejala']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan_aturan">Simpan</button>
                    <a href="<?= BASEURL; ?>/admin/aturanNila" class="btn btn-danger">Batal</a>
                </div>
        </div>
        </form>
    </div>
</div>
</div>