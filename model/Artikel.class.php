<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Artikel
 *
 * @author julia
 */
class Artikel {
    //put your code here
    
    private $ArtikelNr ;
    private $Artikelname ;
    private $Artikelgruppe ;
    private $Lagerplatz ;
    private $Einkaufspreis ;
    private $Verkaufspreis ;
    private $Mindestbestand ;
    private $Basiseinheit ;
    private $Verpackung ;
    private $Lieferdauerstatus ;
    private $Bestand ;
    
    function getArtikelNr() {
        return $this->ArtikelNr;
    }

    function getArtikelname() {
        return $this->Artikelname;
    }

    function getArtikelgruppe() {
        return $this->Artikelgruppe;
    }

    function getLagerplatz() {
        return $this->Lagerplatz;
    }

    function getEinkaufspreis() {
        return $this->Einkaufspreis;
    }

    function getVerkaufspreis() {
        return $this->Verkaufspreis;
    }

    function getMindestbestand() {
        return $this->Mindestbestand;
    }

    function getBasiseinheit() {
        return $this->Basiseinheit;
    }

    function getVerpackung() {
        return $this->Verpackung;
    }

    function getLieferdauerstatus() {
        return $this->Lieferdauerstatus;
    }

    function getBestand() {
        return $this->Bestand;
    }

    function setArtikelNr($ArtikelNr) {
        $this->ArtikelNr = $ArtikelNr;
    }

    function setArtikelname($Artikelname) {
        $this->Artikelname = $Artikelname;
    }

    function setArtikelgruppe($Artikelgruppe) {
        $this->Artikelgruppe = $Artikelgruppe;
    }

    function setLagerplatz($Lagerplatz) {
        $this->Lagerplatz = $Lagerplatz;
    }

    function setEinkaufspreis($Einkaufspreis) {
        $this->Einkaufspreis = $Einkaufspreis;
    }

    function setVerkaufspreis($Verkaufspreis) {
        $this->Verkaufspreis = $Verkaufspreis;
    }

    function setMindestbestand($Mindestbestand) {
        $this->Mindestbestand = $Mindestbestand;
    }

    function setBasiseinheit($Basiseinheit) {
        $this->Basiseinheit = $Basiseinheit;
    }

    function setVerpackung($Verpackung) {
        $this->Verpackung = $Verpackung;
    }

    function setLieferdauerstatus($Lieferdauerstatus) {
        $this->Lieferdauerstatus = $Lieferdauerstatus;
    }

    function setBestand($Bestand) {
        $this->Bestand = $Bestand;
    }
    function addAllValues($ArtikelNr, $Artikelname, $Artikelgruppe, $Lagerplatz, $Einkaufspreis, $Verkaufspreis, $Mindestbestand, $Basiseinheit, $Verpackung, $Lieferdauerstatus, $Bestand) {
        $this->setArtikelNr($ArtikelNr)  ;
        $this->setArtikelname($Artikelname)  ;
        $this->setArtikelgruppe($Artikelgruppe)  ;
        $this->setLagerplatz($Lagerplatz)  ;
        $this->setEinkaufspreis($Einkaufspreis)  ;
        $this->setVerkaufspreis($Verkaufspreis)  ;
        $this->setMindestbestand($Mindestbestand)  ;
        $this->setBasiseinheit($Basiseinheit)  ;
        $this->setVerpackung($Verpackung)  ;
        $this->setLieferdauerstatus($Lieferdauerstatus)  ;
        $this->setBestand($Bestand)  ;
    }
    
    function __construct() {

    }

   

}
