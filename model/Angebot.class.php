<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Angebot
 *
 * @author julia
 */
class Angebot {
    //put your code here
    private $AngebotsNr ;
    private $KundenNr ;
    private $Erstelldatum ;
    function getAngebotsNr() {
        return $this->AngebotsNr;
    }

    function getKundenNr() {
        return $this->KundenNr;
    }

    function getErstelldatum() {
        return $this->Erstelldatum;
    }

    function setAngebotsNr($AngebotsNr) {
        $this->AngebotsNr = $AngebotsNr;
    }

    function setKundenNr($KundenNr) {
        $this->KundenNr = $KundenNr;
    }

    function setErstelldatum($Erstelldatum) {
        $this->Erstelldatum = $Erstelldatum;
    }

    function addAllValues($AngebotsNr, $KundenNr, $Erstelldatum) {
        $this->setAngebotsNr($AngebotsNr);
        $this->setKundenNr($KundenNr);
        $this->setErstelldatum ($Erstelldatum);
    }

    function __construct() {

    }

}
