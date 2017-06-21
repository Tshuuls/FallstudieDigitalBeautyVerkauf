<?php

/**
 * Description of Product
 *
 * @author Stefan
 */
class Customer {
    //put your code here
    private $KundenNr;
    private $Vorname;
    private $Nachname;
    private $Zahlungsbedingungen;
    private $Strasse;
    private $PLZ;
    private $Land;
    private $Email;
    private $Tel;
    private $KundenstatusID;
    private $Kundenstatus;


    
        function __construct(){
        
    }
      
    function withparam($KundenNr,$Vorname,$Nachname,$Zahlungsbedingungen,$Strasse,$PLZ,$Land,$Email,$Tel,$KundenstatusID,$Kundenstatus) {
        $this->KundenNr = $KundenNr;
        $this->Vorname = $Vorname;
        $this->Nachname = $Nachname;
        $this->Zahlungsbedingungen = $Zahlungsbedingungen;
        $this->Strasse = $Strasse;
        $this->PLZ = $PLZ;
        $this->Land = $Land;     
        $this->Email = $Email;
        $this->Tel = $Tel; 
        $this->KundenstatusID = $KundenstatusID;
        $this->Kundenstatus = $Kundenstatus;
        
    }
    
    function getKundenstatus() {
        return $this->Kundenstatus;
    }

    function setKundenstatus($Kundenstatus) {
        $this->Kundenstatus = $Kundenstatus;
    }
    
    function getKundenNr() {
        return $this->KundenNr;
    }

    function getVorname() {
        return $this->Vorname;
    }

    function getNachname() {
        return $this->Nachname;
    }

    function getZahlungsbedingungen() {
        return $this->Zahlungsbedingungen;
    }

    function getStrasse() {
        return $this->Strasse;
    }

    function getPLZ() {
        return $this->PLZ;
    }

    function getLand() {
        return $this->Land;
    }

    function getEmail() {
        return $this->Email;
    }

    function getTel() {
        return $this->Tel;
    }

    function getKundenstatusID() {
        return $this->KundenstatusID;
    }

    function setKundenNr($KundenNr) {
        $this->KundenNr = $KundenNr;
    }

    function setVorname($Vorname) {
        $this->Vorname = $Vorname;
    }

    function setNachname($Nachname) {
        $this->Nachname = $Nachname;
    }

    function setZahlungsbedingungen($Zahlungsbedingungen) {
        $this->Zahlungsbedingungen = $Zahlungsbedingungen;
    }

    function setStrasse($Strasse) {
        $this->Strasse = $Strasse;
    }

    function setPLZ($PLZ) {
        $this->PLZ = $PLZ;
    }

    function setLand($Land) {
        $this->Land = $Land;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setTel($Tel) {
        $this->Tel = $Tel;
    }

    function setKundenstatusID($KundenstatusID) {
        $this->KundenstatusID = $KundenstatusID;
    }
    
    
    function insertCustomer(){
        $db =new Database();
        $query="INSERT INTO `kunde`(`Vorname`, `Nachname`, `Zahlungsbedingungen`, `Strasse`, `PLZ`, `Land`,`Email`,`Tel`,`KundenstatusID`) VALUES "
                ."('".$this->Vorname."','".$this->Nachname."','".$this->Zahlungsbedingungen."','".$this->Strasse."','".$this->PLZ."','".$this->Land."','".$this->Email."','".$this->Tel."','".$this->KundenstatusID."')";
        $db->insert($query);
    }
    
    function deleteCustomer(){
        $db =new Database();
        if ($db->checkifcustomerisinposition($this->KundenNr)){
            $stmt = "DELETE FROM `kunde` WHERE `KundenNr`=".$this->KundenNr;
            $db->deleteIt($stmt);
            return true;
        }
        else {return false;}
        
    }
    
    function updateCustomer(){
        $db =new Database();
        $query="UPDATE `kunde` SET `Vorname`='".$this->Vorname."',`Nachname`='".$this->Nachname."',`Zahlungsbedingungen`='".$this->Zahlungsbedingungen."',`Strasse`='".$this->Strasse."',`PLZ`='".$this->PLZ."',`Land`='".$this->Land."',`Email`='".$this->Email."',`Tel`='".$this->Tel."',`KundenstatusID`='".$this->KundenstatusID."' WHERE `KundenNr`=".$this->KundenNr;
        $db->insert($query);
    }
    
}
