
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
                $user->addAllValues($zeile->UserID, $zeile->Anrede, $zeile->Vorname, $zeile->Nachname, $zeile->Adresse, 
                    $zeile->PLZ, $zeile->Ort, $zeile->Email, $zeile->Benutzername, $zeile->Passwort, $zeile->Admin);
                //$user->displayUser();
                //echo "<br />";
            }
        }
    
    $ergebniss->close();
    $db->close();
    return $user;
    }
    
    function getallBenutzernamen(){
        $db= $this->connect2DB();
        $statement ="Select Benutzername from User";
        $ergebniss = $db->query($statement);
        $Namen=array();
        if ($ergebniss!=false){
            while($zeile=$ergebniss->fetch_object()){
                array_push($Namen, $zeile->Benutzername);
                echo $zeile->Benutzername .'<br />';
            }
        }
    }
    
    function getallCustomer(){
        include 'Customer.class.php';
        $customlist = array();
        $db= $this->connect2DB();
        $Abfrage = "select * from kunde join kundenstatus on Kundenstatus_KundenstausID=KundenstausID";
        $result = $db->query($Abfrage);
        if(!empty($result)){
            while ($row = $result->fetch_assoc()) {
                $customer = new Customer();
                $customer->withparam($row['KundenNr'], $row['Vorname'], $row['Nachname'], $row['Zahlungsbedingungen'], $row['Strasse'], $row['PLZ'], $row['Land'], $row['EMail'], $row['Tel'], $row['Kundenstatus_KundenstausID'], $row['Rabatt']);
                array_push($customlist, $customer);
            }
        }
        //$db->close;
        //$result->close;
        return $customlist;
        }
       function searchCustomer($string){
        include 'Customer.class.php';
        $customlist = array();
        $db= $this->connect2DB();
        $Abfrage = 'select * from kunde join kundenstatus on Kundenstatus_KundenstausID=KundenstausID where KundenNr like "'.$string.'"';
        $result = $db->query($Abfrage);
        if(!empty($result)){
            while ($row = $result->fetch_assoc()) {
                $customer = new Customer();
                $customer->withparam($row['KundenNr'], $row['Vorname'], $row['Nachname'], $row['Zahlungsbedingungen'], $row['Strasse'], $row['PLZ'], $row['Land'], $row['EMail'], $row['Tel'], $row['Kundenstatus_KundenstausID'], $row['Rabatt']);
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
        $Abfrage = "select * from kunde join kundenstatus on Kundenstatus_KundenstausID=KundenstausID where KundenNr=".$KundenNr;
        if($result = $db->query($Abfrage)){
            while ($row = $result->fetch_assoc()) {
            $customer->withparam($row['KundenNr'], $row['Vorname'], $row['Nachname'], $row['Zahlungsbedingungen'], $row['Strasse'], $row['PLZ'], $row['Land'], $row['EMail'], $row['Tel'], $row['Kundenstatus_KundenstausID'], $row['Rabatt']);
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
            $status = new CustomerStatus($row['KundenstatusID'],$row['Rabat']);
            array_push($statuslist, $status);
            }
        return $statuslist;    
        }    
    }
    
}
