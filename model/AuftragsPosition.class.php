<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuftragsPosition
 *
 * @author julia
 */
class AuftragsPosition {
    //put your code here
     //put your code here
    private $ID ;
    private $Auftragsposition ;
    private $Menge ;
    private $Kosten ;
    private $ArtikelNr ;
    private $AuftragsNr ;
    function getID() {
        return $this->ID;
    }

    function getAuftragsposition() {
        return $this->Auftragsposition;
    }

    function getMenge() {
        return $this->Menge;
    }

    function getKosten() {
        return $this->Kosten;
    }

    function getArtikelNr() {
        return $this->ArtikelNr;
    }

    function getAuftragsNr() {
        return $this->AuftragsNr;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setAuftragsposition($Auftragsposition) {
        $this->Auftragsposition = $Auftragsposition;
    }

    function setMenge($Menge) {
        $this->Menge = $Menge;
    }

    function setKosten($Kosten) {
        $this->Kosten = $Kosten;
    }

    function setArtikelNr($ArtikelNr) {
        $this->ArtikelNr = $ArtikelNr;
    }

    function setAuftragsNr($AuftragsNr) {
        $this->AuftragsNr = $AuftragsNr;
    }

    function addAllValues($ID, $Auftragsposition, $Menge, $Kosten, $ArtikelNr, $AuftragsNr) {
        $this->setID($ID);
        $this->setAuftragsposition($Auftragsposition);
        $this->setMenge($Menge);
        $this->setKosten ($Kosten);
        $this->setArtikelNr($ArtikelNr);
        $this->setAuftragsNr($AuftragsNr);
    }
    
    function __construct() {
        
    }

    function insertAuftragPosition(){
        $db = new Database();
        $quere="INSERT INTO `auftragspositionen`(`Auftragspositionen`, `Menge`, `Kosten`, `ArtikelNr`, `AuftragsNr`) VALUES ('".$this->Auftragsposition."','".$this->Menge."','".$this->Kosten."','".$this->ArtikelNr."','".$this->AuftragsNr."')";
        $db->insert($quere);
    }
       function getPosition($ID, $Auftragsposition, $Menge, $Kosten, $ArtikelNr, $AuftragsNr) {
        $this->setID($ID)  ;
        $this->setAuftragsposition($Auftragsposition)  ;
        $this->setMenge($Menge)  ;
        $this->setKosten($Kosten)  ;
        $this->setArtikelNr($ArtikelNr)  ;
        $this->setAuftragsNr($AuftragsNr) ;
     }
}
