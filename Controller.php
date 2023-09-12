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

    /*
    prebačeno i index.php
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
    */


    // prikaz svih ocjena 5 iz baze
    public function prikaziSveOcjene5()
    {
        $sve_ocjene5=$this->model->dohvatiSveOcjene5()->fetchAll(PDO::FETCH_ASSOC);
        $this->view->prikaziOcjene5($sve_ocjene5);
    }

        // prikaz svih studenata
        public function prikaziSveStudente()
        {
            $svi_studenti=$this->model->dohvatiSveStudente()->fetchAll(PDO::FETCH_ASSOC);
            $this->view->prikaziSveStudente($svi_studenti);
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
            $this->model->predmet=$predmet;
            $this->model->ocjena=$ocjena;
            $this->model->studenti_id=$studenti_id;

            $this->model->dodajOcjenu();
    }

        // obrada forme za upis studenta
        public function upisiNoviStudent($ime, $prezime, $id)
        {   
                $this->model->ime=$ime;
                $this->model->prezime=$prezime;
                $this->model->id=$id;
    
                $this->model->dodajStudent();
        }



}



?>