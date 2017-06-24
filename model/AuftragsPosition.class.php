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
    private $AuftragssNr ;
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

    function getAuftragssNr() {
        return $this->AuftragssNr;
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

    function setAuftragssNr($AuftragssNr) {
        $this->AuftragssNr = $AuftragssNr;
    }

    function addAllValues($ID, $Auftragsposition, $Menge, $Kosten, $ArtikelNr, $AuftragssNr) {
        $this->setID($ID);
        $this->setAuftragsposition($Auftragsposition);
        $this->setMenge($Menge);
        $this->setKosten ($Kosten);
        $this->setArtikelNr($ArtikelNr);
        $this->setAuftragssNr($AuftragssNr);
    }
    
    function __construct() {
        
    }

    function insertAuftragPosition(){
        $db = new Database();
        $quere="INSERT INTO `auftragspositionen`(`Auftragspositionen`, `Menge`, `Kosten`, `ArtikelNr`, `AuftragsNr`) VALUES ('".$this->Auftragsposition."','".$this->Menge."','".$this->Kosten."','".$this->ArtikelNr."','".$this->AuftragssNr."')";
        $db->insert($quere);
    }
}
