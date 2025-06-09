<?php
class Aturan_model
{
    private $table = 'basis_aturan';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllAturan()
    {
        $this->db->query("SELECT basis_aturan.id_aturan,basis_aturan.id_penyakit ,penyakit.nama_penyakit,penyakit.keterangan_penyakit FROM basis_aturan INNER JOIN penyakit ON basis_aturan.id_penyakit=penyakit.id_penyakit ORDER BY nama_penyakit ASC");
        $this->db->resultSet();
        return $this->db->resultSet();
    }
    public function TambahDataAturan($data)
    {
        if (isset($_POST['simpan_aturan'])) {
            // ngambil data dari form
            $nama_penyakit = $_POST['nama_penyakit'];

            // validasi nama penyakit
            $query = $this->db->query("SELECT basis_aturan.id_aturan,basis_aturan.id_penyakit, penyakit.nama_penyakit FROM basis_aturan INNER JOIN penyakit ON basis_aturan.id_penyakit = penyakit.id_penyakit WHERE penyakit.nama_penyakit = :nama_penyakit");
            $this->db->bind('nama_penyakit', $nama_penyakit);
            $this->db->execute();
            $row = $this->db->rowCount();
            if ($row) {
                echo "<script>alert('Penyakit sudah ada')</script>";
            } else if (empty($nama_penyakit)) {
                echo "<script>alert('Nama penyakit tidak boleh kosong');</script>";
                return;
            } else {
                // Mengambil data penyakit
                $this->db->query("SELECT * FROM penyakit WHERE nama_penyakit=:nama_penyakit");
                $this->db->bind('nama_penyakit', $nama_penyakit);
                $this->db->execute();
                $idPenyakit = $this->db->singleResult();
                $id_penyakit = $idPenyakit['id_penyakit'];

                // Menyimpan basis aturan
                $this->db->query("INSERT INTO  basis_aturan VALUES ('',:id_penyakit)");
                $this->db->bind('id_penyakit', $id_penyakit);
                $this->db->execute();

                // Mengambil data gejala pada html dari id gejala
                $id_gejala = $_POST['id_gejala'];

                // Mengambil data id aturan pada html
                $this->db->query("SELECT * FROM basis_aturan ORDER BY id_aturan DESC");
                $this->db->execute();
                $idGejala = $this->db->singleResult();
                $id_aturan = $idGejala['id_aturan'];

                // Banyaknya data yg dipilih
                foreach ($id_gejala as $count_gejala) {
                    $this->db->query("INSERT INTO basis_aturan_gejala VALUES (:id_aturan, :count_gejala)");
                    $this->db->bind('count_gejala', $count_gejala);
                    $this->db->bind('id_aturan', $id_aturan);
                    $this->db->execute();
                }
                header('location:' . BASEURL . '/admin/basis');
            }
        }
    }
    public function hapusBasis($id_aturan)
    {
        $this->db->query('DELETE FROM basis_aturan WHERE id_aturan = :id_aturan');
        $this->db->bind('id_aturan', $id_aturan);
        $this->db->execute();
        return $this->db->rowCount();
    }





    public function getAturanById($id_aturan)
    {
        $this->db->query("SELECT basis_aturan.id_aturan,basis_aturan.id_penyakit ,penyakit.nama_penyakit,penyakit.keterangan_penyakit FROM basis_aturan INNER JOIN penyakit ON basis_aturan.id_penyakit=penyakit.id_penyakit WHERE id_aturan=:id_aturan ORDER BY nama_penyakit ASC ");
        $this->db->bind('id_aturan', $id_aturan);
        return $this->db->singleResult();
    }
    public function getCheckGejala($id_aturan)
    {
        // Ambil id gejala
        $this->db->query("SELECT gejala.nama_gejala, basis_aturan_gejala.id_gejala FROM basis_aturan_gejala INNER JOIN gejala ON basis_aturan_gejala.id_gejala = gejala.id_gejala WHERE id_aturan=$id_aturan");
        $idGejala = $this->db->resultSet();
        return $idGejala;
        $gejala = $idGejala['id_gejala'];
        $this->db->query("SELECT * FROM basis_aturan_gejala WHERE id_aturan=:id_aturan AND id_gejala=:id_gejala");
        $this->db->bind('id_aturan', $id_aturan);
        $this->db->bind('id_gejala', $id_gejala);
        return $this->db->resultSet();
    }
    public function hapusAturanGejala($id_aturan, $id_gejala)
    {
        $this->db->query('DELETE FROM basis_aturan_gejala WHERE id_aturan = :id_aturan AND id_gejala = :id_gejala');
        $this->db->bind('id_aturan', $id_aturan);
        $this->db->bind('id_gejala', $id_gejala);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updateAturanGejala($data, $id_aturan)
    {
        $gejala = $_POST['id_gejala'];
        $this->db->query("DELETE FROM basis_aturan_gejala WHERE id_aturan = :id_aturan");
        $this->db->bind('id_aturan', $id_aturan);
        $this->db->execute();
        // Insert relasi gejala yang baru
        foreach ($gejala as $id_gejala) {
            $this->db->query("INSERT INTO basis_aturan_gejala (id_aturan, id_gejala) VALUES (:id_aturan, :id_gejala)");
            $this->db->bind('id_aturan', $id_aturan);
            $this->db->bind('id_gejala', $id_gejala);
            $this->db->execute();
        }

        return $this->db->rowCount(); // Penting untuk memeriksa keberhasilan
    }


    public function hapusDataAturan($id)
    {
        $query = "DELETE FROM Aturan WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function Inner()
    {
        $query = ("SELECT penyakit.nama_penyakit, GROUP_CONCAT(gejala.nama_gejala SEPARATOR ', ') AS gejala FROM basis_aturan INNER JOIN basis_aturan_gejala ON basis_aturan.id_aturan = basis_aturan_gejala.id_aturan INNER JOIN penyakit ON basis_aturan.id_penyakit = penyakit.id_penyakit INNER JOIN gejala ON basis_aturan_gejala.id_gejala = gejala.id_gejala GROUP BY gejala.nama_gejala");
        $query = ("SELECT penyakit.nama_penyakit, GROUP_CONCAT(gejala.nama_gejala SEPARATOR ', ') AS gejala FROM basis_aturan INNER JOIN basis_aturan_gejala ON basis_aturan.id_aturan = basis_aturan_gejala.id_aturan INNER JOIN penyakit ON basis_aturan.id_penyakit = penyakit.id_penyakit INNER JOIN gejala ON basis_aturan_gejala.id_gejala = gejala.id_gejala GROUP BY penyakit.nama_penyakit");
        $this->db->query($query);
        return $this->db->resultSet();
    }
    // Halaman Detail
    public function detailAturan($id_aturan)
    {
        $query = "SELECT basis_aturan_gejala.id_aturan,basis_aturan_gejala.id_gejala,gejala.nama_gejala FROM basis_aturan_gejala INNER JOIN gejala ON basis_aturan_gejala.id_gejala=gejala.id_gejala WHERE basis_aturan_gejala.id_aturan='$id_aturan'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function hasilDetail()
    {
        $this->db->query("SELECT * FROM basis_aturan_gejala");
        return $this->db->resultSet();

        $this->db->query("SELECT basis_aturan.id_aturan,basis_aturan.id_penyakit ,penyakit.nama_penyakit,penyakit.keterangan_penyakit FROM basis_aturan INNER JOIN penyakit ON basis_aturan.id_penyakit=penyakit.id_penyakit WHERE id_aturan=:id_aturan ORDER BY nama_penyakit ASC ");
        $this->db->bind('id_aturan', $id_aturan);
        return $this->db->singleResult();
    }



    // Nila
    public function TambahDataAturanLele($data)
    {
        if (isset($_POST['simpan_aturan'])) {
            // ngambil data dari form
            $nama_penyakit = $_POST['nama_penyakit'];

            // validasi nama penyakit
            $query = $this->db->query("SELECT basis_aturan.id_aturan,basis_aturan.id_penyakit, penyakit.nama_penyakit FROM basis_aturan INNER JOIN penyakit ON basis_aturan.id_penyakit = penyakit.id_penyakit WHERE id_ikan=1, penyakit.nama_penyakit = :nama_penyakit");
            $this->db->bind('nama_penyakit', $nama_penyakit);
            $this->db->execute();
            $row = $this->db->rowCount();
            if ($row) {
                echo "<script>alert('Penyakit sudah ada')</script>";
            } else if (empty($nama_penyakit)) {
                echo "<script>alert('Nama penyakit tidak boleh kosong');</script>";
            } else {
                // Mengambil data penyakit
                $this->db->query("SELECT * FROM penyakit WHERE nama_penyakit=:nama_penyakit");
                $this->db->bind('nama_penyakit', $nama_penyakit);
                $this->db->execute();
                $idPenyakit = $this->db->singleResult();
                $id_penyakit = $idPenyakit['id_penyakit'];

                // Menyimpan basis aturan
                $this->db->query("INSERT INTO  basis_aturan VALUES ('',:id_penyakit)");
                $this->db->bind('id_penyakit', $id_penyakit);
                $this->db->execute();

                // Mengambil data gejala pada html dari id gejala
                $id_gejala = $_POST['id_gejala'];

                // Mengambil data id aturan pada html
                $this->db->query("SELECT * FROM basis_aturan ORDER BY id_aturan DESC");
                $this->db->execute();
                $idGejala = $this->db->singleResult();
                $id_aturan = $idGejala['id_aturan'];

                // Banyaknya data yg dipilih
                foreach ($id_gejala as $count_gejala) {
                    $this->db->query("INSERT INTO basis_aturan_gejala VALUES (:id_aturan, :count_gejala)");
                    $this->db->bind('count_gejala', $count_gejala);
                    $this->db->bind('id_aturan', $id_aturan);
                    $this->db->execute();
                }
                header('location:' . BASEURL . '/admin/basis');
            }
        }
    }
    
}
