<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidencija</title>
    <style>
        table {
        border-collapse: collapse;
        width: 60%;
        }

        th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid black;
        }

        tr:hover {background-color: lightgreen;}
    </style>
</head>
<body>
    <h1>Evidencija ocjena, grupna vježba</h1>


<?php

    //privremeni debuging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //require "autoload.php";
    include_once "Database.php";
    include_once "Model.php";
    include_once "View.php";
    include_once "Controller.php";

    $config=new Config("config.ini");
    $db=Database::getInstance($config);
    $conn=$db->getConnection();

    if ($conn)
    {
        echo "Uspješno spajanje na bazu!";
    }
    else
    {
        echo "Greška pri spajanju na bazu!";
    }

    $view=new OcjenaView();
    $view->prikaziFormu();

    $model=new OcjenaModel();

    $controller=new EvidencijaController($model, $view);
    

    // ispis svih ocjena
    //$controller->prikaziSveOcjene();
    //$message_good="Uspješan prikaz svih ocjena";

    // ispis evidencije
    $controller->prikaziEvidencija();
    $message_good="Uspješan prikaz evidencije";


?>

    <!-- ispis poruka -->
    <?php if ($message_good) ?>
    <h3 style="color: green";><?php echo $message_good; ?></h3>
    <php endif; ?>
    
    <?php if ($message_bad) ?>
    <h3  style="color: red";><?php echo $message_bad; ?></h3>
    <php endif; ?>  


    
</body>
</html>