<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidencija</title>
    <link href="./style.css" rel="stylesheet">
</head>

<body>

    <div class="wrapper">
    <h1>Evidencija ocjena, grupna vježba</h1>
    <p><a href="https://github.com/zopaj63/evidencija" target="_blank">GitHub</a></p><br>

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
        

        // ispis svih odlikaša
        $controller->prikaziSveOcjene5();
        $message_good="Uspješan prikaz svih odlikaša";

        // ispis svih studenata


        // ispis evidencije
        $controller->prikaziEvidencija();
        $message_good="Uspješan prikaz evidencije :)";


    ?>

    <!-- ispis poruka -->
    <?php if ($message_good) ?>
    <h3 style="color: green";><?php echo $message_good; ?></h3>
    <php endif; ?>
    
    <?php if ($message_bad) ?>
    <h3  style="color: red";><?php echo $message_bad; ?></h3>
    <php endif; ?>  

    


    </div>
    
</body>
</html>