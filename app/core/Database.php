<?php
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $statement;
    public function __construct()
    {
        // data source name
        $dsm = 'mysql:host=' . $this->host . ';port=3307;dbname=' . $this->db_name;
        $option = [
            PDO::ATTR_PERSISTENT => TRUE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->dbh = new PDO($dsm, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function query($query)
    {
        $this->statement = $this->dbh->prepare($query);
    }
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }
    public function execute()
    {
        return $this->statement->execute();
    }
    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function singleResult()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
    public function rowCount()
    {
        return $this->statement->rowCount();
    }
    private function lastInsertId()
    {
        return $this->db->query("SELECT LAST_INSERT_ID()")->fetch(PDO::FETCH_ASSOC)['LAST_INSERT_ID()'];
    }
}
