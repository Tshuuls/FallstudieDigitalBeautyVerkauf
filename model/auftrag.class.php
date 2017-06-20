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

public static function getAll() {
        //alle Aufträge aus der DB laden
        $db =new Database();
        
        $sql = "select * from auftrag order by AuftragsNr";
        $db->select($sql);
        $result=$db->query($sql); 
        
        $aufträge = array();
        
         while($zeile=$result->fetch_object()){

            $auftrag = new Auftrag();
            $auftrag->setAuftragsNr($zeile->AuftragsNr);
            $auftrag->setKundenNr($zeile->KundenNr);
            $auftrag->setAuftrag($zeile->Auftrag);
            $auftrag->setKommission($zeile->Kommission);
            $aufträge[] = $auftrag;
        }
        
        return $aufträge;
		
    }
    public function setAuftragsNr($auftragsNr) {
        $this->auftragsNr = $auftragsNr;
    }
    public function getAuftragsNr() {
        return $this->auftragsNr;
    }
    
    public function setKundenNr($kundenNr) {
        $this->kundenNr = $kundenNr;
    }
    
    public function getKundenNr() {
        return $this->kundenNr;
    }
    
    public function setAuftrag($auftrag) {
        $this->auftrag = $auftrag;
    }
    
     public function getAuftrag() {
        return $this->auftrag;
    }
    public function setKommission($kommission) {
        $this->kommission = $kommission;
    }
    
     public function getKommission() {
        return $this->kommission;
    }
}
