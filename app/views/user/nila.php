<?php
if (!session_id()) {
    session_start();
}
?>
<div class="main p-3">
    <div class="container-basis">
        <div class="custom-aturan bg-light">
            <form action="<?= BASEURL; ?>/user/hasil" method="post" name="form">
                <h2 class="card-header mb-3 p-2 bg-primary">Konsultasi Ikan</h2>
                <div class="card-body">
                    <label for="nama_user" class="form-label">Nama Ikan</label>
                    <input type="text" class="form-control" id="namaUser" name="nama_user" maxlength="50" value="Nila" required>
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
                <button type="submit" class="btn btn-primary" name="diagnosa_user">Diagnosa</button>
                <a href="<?= BASEURL; ?>/user/diagnosa" class="btn btn-danger">Batal</a>
        </div>
    </div>
    </form>
</div>
</div>
</div>