<?php
class Penyakit_model
{
    private $table = 'penyakit';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllPenyakit()
    {
        $this->db->query("SELECT * FROM " . $this->table . " INNER JOIN ikan ON penyakit.id_ikan = ikan.id_ikan ORDER BY nama_penyakit ASC");
        return $this->db->resultSet();
        // return $row_penyakit;

    }
    public function getPenyakitById($id_penyakit)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_penyakit=:id_penyakit');
        $this->db->bind('id_penyakit', $id_penyakit);
        return $this->db->singleResult();
    }
    public function tambahDataPenyakit($data)
    {
        $nama_ikan = $_POST['nama_ikan'];
        $id_ikan = $this->db->query("SELECT id_ikan FROM ikan WHERE nama_ikan = '$nama_ikan'");
        $query = "INSERT INTO penyakit values ('', :nama_penyakit, :keterangan_penyakit, :solusi, :id_ikan)";
        $result = $this->db->singleResult();  // Ambil hasil query tunggal (id_ikan)

        // Cek apakah nama ikan ditemukan
        if ($result && isset($result['id_ikan'])) {
            $id_ikan = $result['id_ikan']; // Ambil id_ikan dari hasil query
        } else {
            // Jika nama ikan tidak ditemukan, kembalikan error atau tangani sesuai kebutuhan
            echo "Nama ikan tidak ditemukan!";
            return 0;  // atau bisa return error lain yang sesuai
        }
        $this->db->query($query);
        $this->db->bind('nama_penyakit', $data['nama_penyakit']);
        $this->db->bind('keterangan_penyakit', $data['keterangan_penyakit']);
        $this->db->bind('solusi', $data['solusi']);
        $this->db->bind('id_ikan', $id_ikan);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusDataPenyakit($id_penyakit)
    {
        $query = "DELETE FROM penyakit WHERE id_penyakit=:id_penyakit";
        $this->db->query($query);
        $this->db->bind('id_penyakit', $id_penyakit);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataPenyakit($data)
    {
        $query = "UPDATE penyakit SET 
            nama_penyakit = :nama_penyakit, 
            keterangan_penyakit = :keterangan_penyakit, 
            solusi = :solusi WHERE 
            id_penyakit = :id_penyakit";
        $this->db->query($query);
        $this->db->bind('nama_penyakit', $data['nama_penyakit']);
        $this->db->bind('keterangan_penyakit', $data['keterangan_penyakit']);
        $this->db->bind('solusi', $data['solusi']);
        $this->db->bind('id_penyakit', $data['id_penyakit']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getNamaPenyakit()
    {
        $this->db->query("SELECT nama_penyakit FROM " . $this->table . " ORDER BY nama_penyakit ASC");
        return $this->db->resultSet();
        // return $row_penyakit;

    }

    public function getNamaPenyakitNila()
    {
        $this->db->query("SELECT nama_penyakit FROM " . $this->table . " WHERE id_ikan=1 ORDER BY nama_penyakit ASC");
        return $this->db->resultSet();
        // return $row_penyakit;

    }  public function getNamaPenyakitGurame()
    {
        $this->db->query("SELECT nama_penyakit FROM " . $this->table . " WHERE id_ikan=2 ORDER BY nama_penyakit ASC");
        return $this->db->resultSet();
        // return $row_penyakit;

    }  public function getNamaPenyakitLele()
    {
        $this->db->query("SELECT nama_penyakit FROM " . $this->table . " WHERE id_ikan=3 ORDER BY nama_penyakit ASC");
        return $this->db->resultSet();
        // return $row_penyakit;

    }
}
