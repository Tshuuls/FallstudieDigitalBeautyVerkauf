<?php

/**
 * Description of CustomerStatus
 *
 * @author Stefan Seyer
 */
class CustomerStatus {
    //put your code here
    private $KundenstatusID;
    private $Rabatt;
    private $Wert;
    


    
    
    public function __construct($KundenstatusID, $Rabatt, $Wert) {
        $this->KundenstatusID = $KundenstatusID;
        $this->Rabatt = $Rabatt;
        $this->Wert = $Wert;
    }
    
    
    function getKundenstatusID() {
        return $this->KundenstatusID;
    }

    function getRabatt() {
        return $this->Rabatt;
    }

    function setKundenstatusID($KundenstatusID) {
        $this->KundenstatusID = $KundenstatusID;
    }

    function setRabatt($Rabatt) {
        $this->Rabatt = $Rabatt;
    }

    function getWert() {
        return $this->Wert;
    }

    function setWert($Wert) {
        $this->Wert = $Wert;
    }
}
