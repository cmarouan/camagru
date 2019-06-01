<?php
class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $error;
    private $req;

    public function __construct()
    {
        $chaine = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        try{
            $this->dbh = new PDO($chaine, $this->user, $this->pass);
        }catch (PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function insert_prepare($sql)
    {
        $this->req = $this->dbh->prepare($sql);
    }

    public function affect_type($param, $value, $type = null)
    {
        if (is_int($value))
            $type = PDO::PARAM_INT;
        else if (is_bool($value))
            $type = PDO::PARAM_BOOL;
        else if (is_null($value))
            $type = PDO::PARAM_NULL;
        else if (is_string($value))
            $type = PDO::PARAM_STR;
        $this->req->bindValue($param, $value, $type);
    }

    public function execute_my_requete()
    {
        return ($this->req->execute());
    }

    public function rowCount()
    {
        return $this->req->rowCount();
    }

    public function single_data()
    {
        $this->execute();
        return ($this->req->fetch(PDO::FETCH_OBJ));
    }

    public function all_data()
    {
        $this->execute();
        return ($this->req->fetchAll(PDO::FETCH_OBJ));
    }
}
?>