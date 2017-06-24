<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArtikelPosition
 *
 * @author julia
 */
class AngebotPosition {
    //put your code here
    private $ID ;
    private $Angebotsposition ;
    private $Menge ;
    private $Kosten ;
    private $ArtikelNr ;
    private $AngebotsNr ;
    function getID() {
        return $this->ID;
    }

    function getAngebotsposition() {
        return $this->Angebotsposition;
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

    function getAngebotsNr() {
        return $this->AngebotsNr;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setAngebotsposition($Angebotsposition) {
        $this->Angebotsposition = $Angebotsposition;
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

    function setAngebotsNr($AngebotsNr) {
        $this->AngebotsNr = $AngebotsNr;
    }

    function addAllValues($ID, $Angebotsposition, $Menge, $Kosten, $ArtikelNr, $AngebotsNr) {
        $this->setID($ID);
        $this->setAngebotsposition($Angebotsposition);
        $this->setMenge($Menge);
        $this->setKosten ($Kosten);
        $this->setArtikelNr($ArtikelNr);
        $this->setAngebotsNr($AngebotsNr);
    }
    
    function __construct() {
        
    }

    function insertAngebotPosition(){
        $db = new Database();
        $quere="INSERT INTO `angebotspositionen`(`Angebotsposition`, `Menge`, `Kosten`, `ArtikelNr`, `AngebotsNr`) VALUES ('".$this->Angebotsposition."','".$this->Menge."','".$this->Kosten."','".$this->ArtikelNr."','".$this->AngebotsNr."')";
        $db->insert($quere);
    }
}
