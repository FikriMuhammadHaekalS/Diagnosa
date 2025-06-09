<?php
class Diagnosa_model
{
    private $table = 'gejala';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllDiagnosa()
    {
        $this->db->query("SELECT * FROM " . $this->table . " ORDER BY nama_gejala ASC");
        return $this->db->resultSet();
    }
    public function getAturanById($id_Aturan)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id_Aturan);
        return $this->db->singleResult();
    }
    public function tambahDataAturan($data)
    {
        $query = "INSERT INTO Aturan values ('', :nama, :nim, :jurusan)";
        $this->db->query($query);
        //  $this->db->bind('nama', $data['nama']);
        //  $this->db->bind('nim', $data['nim']);
        //  $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusDataAturan($id)
    {
        $query = "DELETE FROM Aturan WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataAturan($data)
    {
        $query = "UPDATE Aturan set nama = :nama, nim = :nim, jurusan = :jurusan WHERE id = :id";
        //  $this->db->query($query);
        //  $this->db->bind('nama', $data['nama']);
        //  $this->db->bind('nim', $data['nim']);
        //  $this->db->bind('jurusan', $data['jurusan']);
        //  $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
