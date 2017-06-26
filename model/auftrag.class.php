<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auftrag
 *
 * @author julijapalatin
 */
class auftrag {
    private $AuftragsNr;
    private $KundenNr;
    private $Auftrag;
    private $Kommission; //boolean, setzen wenn Auftrag da ->an Lager zur Kommissionierung
    private $Bezeichnung;
    private $Erstelldatum;
    private $Kundenname;
    
    function getKundenname() {
        return $this->Kundenname;
    }

    function setKundenname($Kundenname) {
        $this->Kundenname = $Kundenname;
    }

        function getErstelldatum() {
        return $this->Erstelldatum;
    }

   

    function setErstelldatum($Erstelldatum) {
        $this->Erstelldatum = $Erstelldatum;
    }

    

    public function setAuftragsNr($AuftragsNr) {
        $this->AuftragsNr = $AuftragsNr;
    }
    public function getAuftragsNr() {
        return $this->AuftragsNr;
    }
    
    public function setKundenNr($KundenNr) {
        $this->KundenNr = $KundenNr;
    }
    
    public function getKundenNr() {
        return $this->KundenNr;
    }
    
    public function setAuftrag($Auftrag) {
        $this->Auftrag = $Auftrag;
    }
    
     public function getAuftrag() {
        return $this->Auftrag;
    }
    public function setKommission($Kommission) {
        $this->Kommission = $Kommission;
    }
    
     public function getKommission() {
        return $this->Kommission;
    }
    public function setBezeichnung($Bezeichnung) {
        $this->Bezeichnung = $Bezeichnung;
    }
    
    public function getBezeichnung() {
        return $this->Bezeichnung;
    }
    public function setDatum($Erstelldatum) {
        $this->Erstelldatum = $Erstelldatum;
    }
    
    public function getDatum() {
        return $this->Erstelldatum;
    }


    function getAll($AuftragsNr, $KundenNr, $Auftrag, $Kommission, $Bezeichnung, $Erstelldatum,$Kundenname) {
        $this->setAuftragsNr($AuftragsNr)  ;
        $this->setKundenNr($KundenNr)  ;
        $this->setAuftrag($Auftrag)  ;
        $this->setKommission($Kommission)  ;
        $this->setBezeichnung($Bezeichnung)  ;
        $this->setDatum($Erstelldatum) ;
        $this->setKundenname($Kundenname);
     }
     
     function __construct() {

    }
    
    
    
 }
