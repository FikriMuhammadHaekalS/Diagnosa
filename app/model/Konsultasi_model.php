<?php
class Konsultasi_model
{
    private $table = 'konsultasi';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function tambahDataKonsultasi($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        // mengambil data dari from
        $nama_user = $_POST['nama_user'];
        $tgl = date('Y/m/d');
        $this->db->query("INSERT INTO konsultasi VALUES ('', :nama,:tgl)");
        $this->db->bind('nama', $nama_user);
        $this->db->bind('tgl', $tgl);
        $this->db->execute();
        // Mengambil data gejala pada html dari id gejala
        $id_gejala = $_POST['id_gejala'];
        // Mengambil data id konsultasi pada html
        $this->db->query("SELECT * FROM konsultasi ORDER BY id_konsultasi DESC");
        $this->db->execute();
        $idGejala = $this->db->singleResult();
        $id_konsultasi = $idGejala['id_konsultasi'];

        // Banyaknya data yg dipilih
        foreach ($id_gejala as $count_gejala) {
            $this->db->query("INSERT INTO detail_konsultasi VALUES (:id_konsultasi, :id_gejala)");
            $this->db->bind('id_gejala', $count_gejala);
            $this->db->bind('id_konsultasi', $id_konsultasi);
            $this->db->execute();
        }
        // session_start(); // Pastikan session sudah dimulai, atau letakkan di awal controller
        // $_SESSION['id_konsultasi_terakhir'] = $id_konsultasi;
        // mengambil data dari penyakit
        $this->db->query("SELECT * FROM penyakit");
        $penyakit = $this->db->resultSet();
        if ($penyakit) { // Pastikan $penyakit tidak kosong
            foreach ($penyakit as $row_penyakit) {
                $id_penyakit = $row_penyakit['id_penyakit'];
                $nama_penyakit = $row_penyakit['nama_penyakit'];
                $jikaAda = 0;
                // mencari jumlah gejala di baris penyakit
                $this->db->query("SELECT COUNT(id_penyakit) AS jml_gejala FROM basis_aturan INNER JOIN basis_aturan_gejala ON basis_aturan.id_aturan=basis_aturan_gejala.id_aturan WHERE id_penyakit=:id_penyakit");
                $this->db->bind('id_penyakit', $id_penyakit);
                $jml_gejala = $this->db->singleResult()['jml_gejala'];
                // var_dump($jml_gejala);
                // mencari gejala pada barris aturan
                $this->db->query("SELECT id_penyakit,id_gejala FROM basis_aturan INNER JOIN basis_aturan_gejala ON basis_aturan.id_aturan=basis_aturan_gejala.id_aturan WHERE id_penyakit=:id_penyakit");
                $this->db->bind('id_penyakit', $id_penyakit);
                $gejala = $this->db->resultSet();
                foreach ($gejala as $row_gejala) {
                    $idgejala = $row_gejala['id_gejala'];
                    // membandingkan apakah gejala yang dipilih konsultasi sesuai
                    $this->db->query("SELECT id_gejala FROM detail_konsultasi WHERE id_konsultasi=:id_konsultasi AND id_gejala=:id_gejala");
                    $this->db->bind('id_konsultasi', $id_konsultasi);
                    $this->db->bind('id_gejala', $idgejala);
                    $this->db->execute();
                    $cek = $this->db->rowCount();
                    if ($cek > 0) {
                        $jikaAda += 1;
                    }
                }
                // mencari persentase
                if ($jml_gejala > 0) {
                    $peluang = round(($jikaAda / $jml_gejala) * 100, 2);
                } else {
                    $peluang = 0;
                }
                if ($peluang > 0) {
                    $this->db->query("INSERT INTO detail_penyakit VALUES (:id_konsultasi,:id_penyakit,:bobot)");
                    $this->db->bind('id_konsultasi', $id_konsultasi);
                    $this->db->bind('id_penyakit', $id_penyakit);
                    $this->db->bind('bobot', $peluang);
                    $this->db->execute();
                    $success = true;  // Set to true if at least one insertion succeeded
                }
            }
            return $success;  // Return the final result
        } else {
            echo "Data penyakit tidak ditemukan.";
        }
    }
    public function idkonsul()
    {
        $this->db->query("SELECT * FROM konsultasi");
        $this->db->execute();
        $idkonsultasi = $this->db->singleResult();
        $id_konsultasi = $idkonsultasi['id_konsultasi'];
    }
    public function namaKonsul()
    {
        $this->db->query("SELECT MAX(id_konsultasi) as last_id FROM konsultasi");
        $result = $this->db->singleResult();
        $id_konsultasi = $result['last_id'];
        $this->db->query("SELECT konsultasi.nama,GROUP_CONCAT(gejala.nama_gejala SEPARATOR ', ') as nama_gejala  FROM konsultasi INNER JOIN detail_konsultasi ON konsultasi.id_konsultasi=detail_konsultasi.id_konsultasi INNER JOIN gejala ON detail_konsultasi.id_gejala=gejala.id_gejala WHERE konsultasi.id_konsultasi=:id_konsultasi");
        $this->db->bind('id_konsultasi', $id_konsultasi);
        $result = $this->db->resultSet();
        return $result;
    }
    public function penyakitKonsul()
    {
        $this->db->query("SELECT MAX(id_konsultasi) as last_id FROM konsultasi");
        $result = $this->db->singleResult();
        $id_konsultasi = $result['last_id'];
        // $this->db->query("SELECT keterangan_penyakit,nama_penyakit,solusi,bobot FROM detail_penyakit INNER JOIN penyakit ON  detail_penyakit.id_penyakit=penyakit.id_penyakit WHERE id_konsultasi=:id_konsultasi");
        $this->db->query("SELECT keterangan_penyakit, nama_penyakit, solusi, bobot 
                      FROM detail_penyakit 
                      INNER JOIN penyakit ON detail_penyakit.id_penyakit = penyakit.id_penyakit 
                      WHERE id_konsultasi = :id_konsultasi 
                      ORDER BY bobot DESC LIMIT 1");
        $this->db->bind('id_konsultasi', $id_konsultasi);
        $result = $this->db->resultSet();
        return $result;
    }
    public function hasilGejala()
    {
        $this->db->query("SELECT MAX(id_konsultasi) as last_id FROM konsultasi");
        $result = $this->db->singleResult();
        $id_konsultasi = $result['last_id'];
        $this->db->query("SELECT gejala.nama_gejala FROM detail_konsultasi INNER JOIN gejala ON detail_konsultasi.id_gejala=gejala.id_gejala WHERE id_konsultasi=:id_konsultasi ");
        $this->db->bind('id_konsultasi', $id_konsultasi);
        $gejala = $this->db->resultSet();
        return $gejala;
    }
    public function getLastKonsultasiId()
    {
        $this->db->query("SELECT MAX(id_konsultasi) as last_id FROM konsultasi");
        $result = $this->db->singleResult();
        return $result['last_id'];
    }

    
}
