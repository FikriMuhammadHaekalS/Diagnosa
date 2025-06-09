<?php
class Ikan_model
{
    private $table = 'ikan';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllIkan()
    {
        $this->db->query("SELECT * FROM " . $this->table . " ORDER BY nama_ikan ASC");
        return $this->db->resultSet();
        // return $row_gejala;

    }

    public function getAllHistori()
    {
        $this->db->query("SELECT * FROM konsultasi ORDER BY tgl ASC");
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
        $query = "INSERT INTO gejala values ('', :nama_gejala)";
        $this->db->query($query);
        $this->db->bind('nama_gejala', $data['nama_gejala']);
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
