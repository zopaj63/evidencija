<?php

// singleton connect
    class Database
    {
        private static $instance=null;
        private $conn;


        private function __construct($config)
        {
            $host=$config->get("host", "database");
            $dbname=$config->get("dbname", "database");
            $username=$config->get("username", "database");
            $password=$config->get("password", "database");
        

        try
        {
            $this->conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOEXception $e)
        {
            die("Greška pri spajanja na bazu ".$e->getMessage());
        }
    }

    public static function getInstance($config)
    {
        if (self::$instance==null)
        {
            self::$instance=new Database($config);
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}


?>