<?php
class Gejala_model
{
    private $table = 'gejala';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllGejala()
    {
        $this->db->query("SELECT * FROM " . $this->table . " INNER JOIN ikan ON gejala.id_ikan = ikan.id_ikan ORDER BY nama_gejala ASC");
        return $this->db->resultSet();
        // return $row_gejala;

    }
    public function getGejalaById($id_gejala)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_gejala=:id_gejala');
        $this->db->bind('id_gejala', $id_gejala);
        return $this->db->singleResult();
    }
    

    public function tambahDataGejala($data)
    {
        $nama_ikan = $_POST['nama_ikan'];
        $id_ikan = $this->db->query("SELECT id_ikan FROM ikan WHERE nama_ikan = '$nama_ikan'");
        $query = "INSERT INTO gejala values ('', :nama_gejala,:id_ikan)";
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
        $this->db->bind('nama_gejala', $data['nama_gejala']);
        $this->db->bind('id_ikan', $id_ikan);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusDataGejala($id_gejala)
    {
        $query = "DELETE FROM gejala WHERE id_gejala=:id_gejala";
        $this->db->query($query);
        $this->db->bind('id_gejala', $id_gejala);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataGejala($data)
    {
        $query = "UPDATE gejala set nama_gejala = :nama_gejala WHERE id_gejala = :id_gejala";
        $this->db->query($query);
        $this->db->bind('nama_gejala', $data['nama_gejala']);
        $this->db->bind('id_gejala', $data['id_gejala']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getNamaGejala()
    {
        $this->db->query("SELECT id_gejala,nama_gejala FROM " . $this->table . " WHERE id_ikan=1 ORDER BY nama_gejala ASC");
        return $this->db->resultSet();
        // return $row_gejala;
    }
    public function getNamaGejalaNila()
    {
        $this->db->query("SELECT id_gejala,nama_gejala FROM " . $this->table . " WHERE id_ikan=1 ORDER BY nama_gejala ASC");
        return $this->db->resultSet();
        // return $row_gejala;
    }
    public function getNamaGejalaGurame()
    {
        $this->db->query("SELECT id_gejala,nama_gejala FROM " . $this->table . " WHERE id_ikan=2 ORDER BY nama_gejala ASC");
        return $this->db->resultSet();
        // return $row_gejala;
    }
    public function getNamaGejalaLele()
    {
        $this->db->query("SELECT id_gejala,nama_gejala FROM " . $this->table . " WHERE id_ikan=3 ORDER BY nama_gejala ASC");
        return $this->db->resultSet();
        // return $row_gejala;
    }
}
