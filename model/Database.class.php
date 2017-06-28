
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author julia
 */
class Database {
    
    private $host="wi-projectdb.technikum-wien.at";
    private $username="s17-bbb2-fst-42";
    private $password="DbPass4b242";
    private $dbname="s17-bbb2-fst-40";
    
    private function connect2DB(){
        $this->conn = new mysqli($this->host,$this->username,$this->password,$this->dbname);
        //$db->set_charset("utf8");
        return $this->conn;
    }
    
    function insert($statement){
    $db= $this->connect2DB();
    if(!$db->query($statement)){
        echo "Errormessage: ".$db->error;
        }
    $db->close();
    }
    
    function deleteIt($statement){
    $db= $this->connect2DB();
    if(!$db->query($statement)){
        echo "Errormessage: ".$db->error;
        }
    $db->close();
    }
    /*
    function select ($statement){
        
    $db= $this->connect2DB();
    $ergebniss = $db->query($statement);

        $user=array();
        while($zeile=$ergebniss->fetch_object()){
            $user1=new User();
            $user1.addAllValues($zeile->UserID, $zeile->Anrede, $zeile->Vorname, $zeile->Nachname, $zeile->Adresse, 
                $zeile->PLZ, $zeile->Ort, $zeile->Email, $zeile->Benutzername, $zeile->Passwort, $zeile->Admin);
            $user1->displayUser();
            echo "<br />";
            array_push($user, $user1); 
        }
    
    $ergebniss->close();
    $db->close();
    return $user;
    }
    */
    function count ($statement){
        
    $db= $this->connect2DB();
    $ergebniss = $db->query($statement);
    return $ergebniss;
    }
    
    function selectOneUser ($statement){
    $db= $this->connect2DB();
    $user=false;
        $ergebniss = $db->query($statement);
        if ($ergebniss!=false){
            while($zeile=$ergebniss->fetch_object()){
                $user=new User();
                $user->addAllValues($zeile->email, $zeile->username, $zeile->password);
                //$user->displayUser();
                //echo "<br />";
            }
        }
    
    if(!empty($ergebniss)){$ergebniss->close();}
    $db->close();
    return $user;
    }
    
    function getallBenutzernamen(){
        $db= $this->connect2DB();
        $statement ="Select username from benutzer";
        $ergebniss = $db->query($statement);
        $Namen=array();
        if ($ergebniss!=false){
            while($zeile=$ergebniss->fetch_object()){
                array_push($Namen, $zeile->username);
            }
        }
        return $Namen;
    }
    
    function getallArtikel(){
        $db= $this->connect2DB();
        $statement ="Select * from artikel";
        $ergebniss = $db->query($statement);
        $Artikel=array();
        if ($ergebniss!=false){
            while($zeile=$ergebniss->fetch_object()){
                $newArtikel = new Artikel();
                $newArtikel->addAllValues($zeile->ArtikelNr, $zeile->Artikelname, $zeile->Artikelgruppe, $zeile->Lagerplatz, $zeile->Einkaufspreis, $zeile->Verkaufspreis, $zeile->Mindestbestand, $zeile->Basiseinheit, $zeile->Verpackung, $zeile->Lieferdauerstatus, $zeile->Bestand);
            
                array_push($Artikel, $newArtikel);
                
            }
        }
        return $Artikel;
    }
    
    function getallCustomer(){
        //include 'Customer.class.php';
        $customlist = array();
        $db= $this->connect2DB();
        $Abfrage = "select * from kunde join kundenstatus using (KundenstatusID) order by Nachname";
        $result = $db->query($Abfrage);
        if(!empty($result)){
            while ($row = $result->fetch_assoc()) {
                $customer = new Customer();
                $customer->withparam($row['KundenNr'], $row['Vorname'], $row['Nachname'], $row['Zahlungsbedingungen'], $row['Strasse'], $row['PLZ'], $row['Land'], $row['EMail'], $row['Tel'], $row['KundenstatusID'], $row['Rabatt']);
                array_push($customlist, $customer);
            }
        }
        //$db->close;
        //$result->close;
        return $customlist;
        }
       function searchCustomer($string){
       // include 'Customer.class.php';
        $customlist = array();
        $db= $this->connect2DB();
        $Abfrage = 'select * from kunde join kundenstatus using (KundenstatusID) where KundenNr like "'.$string.'"';
        $result = $db->query($Abfrage);
        if(!empty($result)){
            while ($row = $result->fetch_assoc()) {
                $customer = new Customer();
                $customer->withparam($row['KundenNr'], $row['Vorname'], $row['Nachname'], $row['Zahlungsbedingungen'], $row['Strasse'], $row['PLZ'], $row['Land'], $row['EMail'], $row['Tel'], $row['KundenstatusID'], $row['Rabatt']);
                array_push($customlist, $customer);
            }
        }
        //$db->close;
        //$result->close;
        return $customlist;
        } 
    
    function getCustomer($KundenNr){
        $customer = new Customer();
        $db= $this->connect2DB();
        $Abfrage = "select * from kunde join kundenstatus using (KundenstatusID) where KundenNr=".$KundenNr;
        if($result = $db->query($Abfrage)){
            while ($row = $result->fetch_assoc()) {
            $customer->withparam($row['KundenNr'], $row['Vorname'], $row['Nachname'], $row['Zahlungsbedingungen'], $row['Strasse'], $row['PLZ'], $row['Land'], $row['EMail'], $row['Tel'], $row['KundenstatusID'], $row['Rabatt']);
            }
        }
        return $customer;
        
    }   
        
    function getallstatus(){
        include 'CustomerStatus.class.php';
        $db= $this->connect2DB();
        $statuslist = array();
        $Abfrage = "select * from kundenstatus";
        $st = $db->prepare($Abfrage);
        $st->execute();
        $rows = $st->get_result();
        if(!empty($rows)){
            while($row = $rows->fetch_assoc()){
            $status = new CustomerStatus($row['KundenstatusID'],$row['Rabatt'],$row['Wert']);
            array_push($statuslist, $status);
            }
        return $statuslist;    
        }    
    }
    function checkifcustomerisinposition($custid){
       $db = $this->connect2DB();
       $trigger = false;
       $query="SELECT count(*) as counter from angebot where KundenNR= '".$custid."'";
       $query2="SELECT count(*) as counter from auftrag where KundenNR= '".$custid."'";
       $result=$db->query($query);
       $result2=$db->query($query2);        
       if(!empty($result)&&!empty($result2)) {
       while($zeile=$result->fetch_object()){
            if($zeile->counter == 0){ $trigger = true;}
            else {$trigger=false;}
        }
        while($zeile2=$result2->fetch_object()){
            if($zeile2->counter == 0){ $trigger = true;}
            else {$trigger=false;}
        }
       }
       return $trigger;

     }
     
    function searchProdukt($String){
        $productlist = array();
        $db= $this->connect2DB();
        $Abfrage = "select * from artikel where Artikelname like '".$String."'";
        if($result = $db->query($Abfrage)){
            while ($row = $result->fetch_object()) {
                $prod = new Artikel();
                $prod->addAllValues($row->ArtikelNr, $row->Artikelname, $row->Artikelgruppe, $row->Lagerplatz, $row->Einkaufspreis, $row->Verkaufspreis, $row->Mindestbestand, $row->Basiseinheit, $row->Verpackung, $row->Lieferdauerstatus, $row->Bestand);
                array_push($productlist, $prod);
                }
            $result->close();
            }
        $db->close();
        return $productlist;
    }


    function insertAngebot($KID){
        $today = date("Y-m-d H:i:s");
        $db= $this->connect2DB();
        $abfrage="INSERT INTO `angebot` ( `KundenNr`, `Erstelldatum`) VALUES ('$KID', '$today')";
        $db->query($abfrage);
        $abfrage="select AngebotsNr from  `angebot` where KundenNr = '$KID' and `Erstelldatum`='$today'";
        
        if($result = $db->query($abfrage)){
            while ($row = $result->fetch_object()) {
                $AngebotsNr= $row->AngebotsNr;
                }
            $result->close();
            }
            
      
        $db->close();
        return $AngebotsNr;
        
    }
    
    function selectAngebotsPositionen($AID){
    
        $positionlist = array();
        $db= $this->connect2DB();
        $Abfrage = "select * from angebotspositionen where AngebotsNr = '".$AID."'";
        if($result = $db->query($Abfrage)){
            while ($row = $result->fetch_object()) {
                $prod = new AngebotPosition();
                $prod->addAllValues($row->ID, $row->Angebotsposition, $row->Menge, $row->Kosten, $row->ArtikelNr, $row->AngebotsNr);
                array_push($positionlist, $prod);
                }
            $result->close();
            }
        $db->close();
        return $positionlist;
        
    }
    
    function selectAllAngebote(){
        $angebotlist = array();
        $db= $this->connect2DB();
        $Abfrage = "select * from angebot order by Erstelldatum DESC";
        if($result = $db->query($Abfrage)){
            while ($row = $result->fetch_object()) {
                $prod = new Angebot();
                $prod->addAllValues($row->AngebotsNr, $row->KundenNr, $row->Erstelldatum);
                array_push($angebotlist, $prod);
                }
            $result->close();
            }
        $db->close();
        return $angebotlist;
    }
    
    function selectOneAngebot($AID){
        
        $db= $this->connect2DB();
        $Abfrage = "select * from angebot where AngebotsNr ='$AID'";
        $prod = new Angebot();
        if($result = $db->query($Abfrage)){
            while ($row = $result->fetch_object()) {
                $prod->addAllValues($row->AngebotsNr, $row->KundenNr, $row->Erstelldatum);
                }
            $result->close();
            }
        $db->close();
        return $prod;
    }
    
        function selectOneAuftrag($OID){
        
        $db= $this->connect2DB();
        $Abfrage = "select * from auftrag where AuftragsNr ='$OID'";
        $auftrag = new Auftrag();
        if($result = $db->query($Abfrage)){
            while ($zeile = $result->fetch_object()) {
                $auftrag->getAll($zeile->AuftragsNr, $zeile->KundenNr, $zeile->Auftrag, $zeile->Kommission, $zeile->Bezeichnung, $zeile->Erstelldatum,"");
                }
            $result->close();
            }
        $db->close();
        return $auftrag;
    }
    
    
            

    public function getOrders(){
        $orderList = array();
        $db= $this->connect2DB();

        $sql = "select * from auftrag join kunde using (KundenNr) order by Erstelldatum DESC";
            if ($result = $db->query($sql)) {
                 while($zeile=$result->fetch_object()) {

                    $auftrag = new Auftrag();
                    $auftrag->getAll($zeile->AuftragsNr, $zeile->KundenNr, $zeile->Auftrag, $zeile->Kommission, $zeile->Bezeichnung, $zeile->Erstelldatum,$zeile->Vorname.' '.$zeile->Nachname );
                    array_push($orderList, $auftrag);
                  }
                     $result->close();
            }
            $db->close();
            return $orderList;
	}
        
    function insertAuftrag($angebot){
        $db= $this->connect2DB();
        $today = date("Y-m-d H:i:s");
        $Chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        
        $code = "";
        for($i=1; $i <=5;$i++){
        $code.= sprintf('%s', $Chars[rand(0, 61)]);
        }
        
        $user = new Customer();
        $user=$this->getCustomer($angebot->getKundenNr());
        $AuftragssNr=0;
        
        $Abfrage= "INSERT INTO `auftrag` ( `KundenNr`, `Auftrag`, `Kommission`, `Bezeichnung`, `Erstelldatum`) 
            VALUES ('".$angebot->getKundenNr()."', '".$code."', '0', '".$user->getNachname()."-".$code."', '$today')";
        $db->query($Abfrage);
        $Abfrage= "select AuftragsNr from  `auftrag` where `KundenNr`='".$angebot->getKundenNr()."' and `Erstelldatum` = '$today'";
        if($result = $db->query($Abfrage)){
            while ($row = $result->fetch_object()) {
                $AuftragssNr= $row->AuftragsNr;
                }
            $result->close();
            }
            
      
        $db->close();
        return $AuftragssNr;
    }
    
    function getOrderPosition($AuftragsNr){
        $orderPosition = array();
        $db= $this->connect2DB();

        $sql = "select * from auftragspositionen join Artikel using (ArtikelNr) WHERE AuftragsNr= '".$AuftragsNr."'";
            if ($result = $db->query($sql)) {
                 while($zeile=$result->fetch_object()) {

                    $position = new AuftragsPosition();
                    $position->setPosition($zeile->ID, $zeile->Auftragspositionen, $zeile->Menge, $zeile->Kosten, $zeile->ArtikelNr, $zeile->AuftragsNr, $zeile->Artikelname );
                    array_push($orderPosition, $position);
                  }
                     $result->close();
            }
            $db->close();
            return $orderPosition;
	}

    function getRabatt($KundenstatusID){
        $db= $this->connect2DB();
        $rabat=0;
        $sql="SELECT Wert FROM kundenstatus where KundenstatusID = '".$KundenstatusID."'";
        if ($result = $db->query($sql)) {
                 while($zeile=$result->fetch_object()) {
                    $rabat = $zeile->Wert;
                  }
                     $result->close();
            }
            $db->close();
            return $rabat;
    }
    
    function ackAuftrag($AuftragID){
        $db= $this->connect2DB();
        $sql = "UPDATE auftrag SET Kommission = '1' WHERE AuftragsNr= '".$AuftragID."'";
        $db->query($sql);
        $db->close();
    }
}

