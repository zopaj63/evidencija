<?php

include_once "./Model.php";
include_once "./View.php";

global $message_good;
global $message_bad;



class EvidencijaController
{
    private $model;
    private $view;

    public function __construct($model, $view)
    {
        $this->model=$model;
        $this->view=$view;
    }

    // dohvat podataka s forme za registraciju
    public function dohvatiOcjene()
    {
        if (isset($_POST['submit']))
        {
            $predmet=$_POST['predmet'];
            $ocjena=$_POST['ocjena'];
            $student_id=$_POST['student_id'];

        }
        else
        {
            $message_bad="Popunite sva polja";
        }
    }



    // prikaz svih ocjena iz baze
    public function prikaziSveOcjene()
    {
        $sve_ocjene=$this->model->dohvatiSveOcjene()->fetchAll(PDO::FETCH_ASSOC);
        $this->view->prikaziOcjene($sve_ocjene);
    }

    // prikaz evidencije iz baze
    public function prikaziEvidencija()
    {
        $evidencija=$this->model->dohvatiEvidencija()->fetchAll(PDO::FETCH_ASSOC);
        $this->view->prikaziEvidencija($evidencija);
    }

    // obrada forme za upis ocjene
    public function upisiNovuOcjenu($predmet, $ocjena, $studenti_id)
    {
        if (isset($_POST['submit']))
        {     
            $this->model->predmet=$predmet;
            $this->model->ocjena=$ocjena;
            $this->model->studenti_id=$studenti_id;

            $this->model->dodajOcjenu();

            $message_good="Uspješna registracija!";
        }
        else
        {
            $message_bad="Korisnik s tim e-mailom već postoji!";
        }
    }


}



?>