<?php

include_once "Config.php";
include_once "Database.php";

class OcjenaModel
{
    private $conn;
    private $table="ocjene";

    public $predmet;
    public $ocjena;
    public $studenti_id;

    public function __construct()
    {
        $config=new Config('./config.ini');
        $database=Database::getInstance($config);
        $this->conn=$database->getConnection();
    }

    // query za upis nove ocjene u bazu
    public function dodajOcjenu()
    {
        $stmt=$this->conn->prepare("INSERT INTO ".$this->table."(predmet, ocjena, studenti_id) VALUES (:predmet, :ocjena, :studenti_id)");

        $this->ime=htmlspecialchars(strip_tags($this->predmet));
        $this->ocjena=$ocjena;
        $this->student_id=$student_id;

        $stmt->bindParam(":predmet", $predmet);
        $stmt->bindParam(":ocjena", $ocjena);
        $stmt->bindParam(":studenti_id", $student_id);

        if($stmt->execute())
        {
            return true;
        }
        return false;

    }

    // dohvat svih ocjena iz baze
    public function dohvatiSveOcjene()
    {
        $stmt=$this->conn->prepare("SELECT * FROM ".$this->table);
        $stmt->execute();
        return $stmt;

    }





}


?>