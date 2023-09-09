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

    // dohvat evidencije iz baze
    public function dohvatiEvidencija()
    {
        $stmt=$this->conn->prepare("SELECT studenti.ime, studenti.prezime, ocjene.studenti_id, ocjene.predmet, ocjene.ocjena FROM ".$this->table." INNER JOIN studenti ON ".$this->table.".studenti_id=studenti.id");
        $stmt->execute();
        return $stmt;
    
    }





}


?>