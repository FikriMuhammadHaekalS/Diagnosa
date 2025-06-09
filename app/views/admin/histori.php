<?php
if (!session_id()) {
    session_start();
}
?>
<div class="main p-3">
    <div class="container-hero">
        <div class="d-flex justify-content-start ">
            <div class="justify-content-center align-item-center custom-penyakit ">
                <h2 class="text-center">Data Riwayat Konsultasi Ikan</h2>
                <!-- Button trigger modal -->
                <table class="table table-bordered tabel-gejala" id="">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Ikan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- letakkan proses menampilkan disini -->
                        <?php $no = 1;
                        foreach ($data['konsultasi'] as $konsultasi) :?>    
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $konsultasi['tgl']; ?></td>
                                <td><?= $konsultasi['nama'];?></td>
                                
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
