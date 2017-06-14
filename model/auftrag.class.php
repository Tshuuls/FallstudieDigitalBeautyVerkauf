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
    private $Kunde_KundenNr;
    private $Auftrag;
    private $Kommission;

public static function getAll() {
        //alle Aufträge aus der DB laden
        $db =new Database();
        
        $sql = "select * from auftrag order by AuftragsNr";
        $db->select($sql);
        $result=$db->query($sql); 
        
        $aufträge = array();
        
         while($zeile=$result->fetch_object()){

            $auftrag = new Auftrag();
            $auftrag->setAuftragsNr($db["AuftragsNr"]);
            $auftrag->setKundenNr($db["KundenNr"]);
            $auftrag->setAuftrag($db["Auftrag"]);
            $auftrag->setKommission($db["Kommission"]);
            $aufträge[] = $auftrag;
        }
        
        return $aufträge;
		
    }
    public function setAuftragsNr($auftragsNr) {
        $this->auftragsNr = $auftragsNr;
    }
    public function setKundenNr($kundenNr) {
        $this->kundenNr = $kundenNr;
    }
    public function setAuftrag($auftrag) {
        $this->auftrag = $auftrag;
    }
    public function setKommission($kommission) {
        $this->kommission = $kommission;
    }
}