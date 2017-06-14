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
    
    

    
    public function __construct($KundenstatusID, $Rabatt) {
        $this->KundenstatusID = $KundenstatusID;
        $this->Rabatt = $Rabatt;
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

}
