<?php
if (!session_id()) {
    session_start();
}
?>
<div class="main p-3">
    <div class="container-basis">
        <div class="custom-aturan">
            <form action="<?= BASEURL; ?>/admin/updateAturan/<?= $data['aturan']['id_aturan']; ?>" method="post" name="form">
                <h2 class="card-header mb-3 p-2 bg-primary">Penyakit Ikan</h2>
                <div class="card-body">
                    <div class="select-penyakit">
                        <input type="hidden" name="id_aturan" value="<?= $data['aturan']['id_aturan']; ?>">
                        <label for="nama_aturan" class="form-label">Nama Penyakit</label>
                        <input type="text" name="nama_penyakit" class="form-control" value="<?= $data['aturan']['nama_penyakit']; ?>" readonly>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- letakkan proses menampilkan disini -->
                                <?php $no = 1;
                                foreach ($data['gejala'] as $gejala) : ?>
                                    <tr>
                                        <td align="center"><input type="checkbox" name="id_gejala[]" value="<?= $gejala['id_gejala']; ?>" id="gejala<?= $gejala['id_gejala']; ?>" class="check-item" <?php if (in_array($gejala['id_gejala'], array_column($data['check_box'], 'id_gejala'))) echo 'checked'; ?>></td>

                                        <td><?= $no++; ?></td>
                                        <td><?= $gejala['nama_gejala']; ?></td>
                                        <td>
                                            <a href="<?= BASEURL; ?>/admin/hapusBasisAturanGejala/<?= $data['aturan']['id_aturan']; ?>/<?= $gejala['id_gejala']; ?>" class="badge text-center text-bg-danger ubahAturanGejala" onclick="return confirm('Hapus data?');">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_aturan">Update</button>
                    <a href="<?= BASEURL; ?>/admin/basis" class="btn btn-danger">Batal</a>
                </div>
        </div>
        </form>
    </div>
</div>
</div>