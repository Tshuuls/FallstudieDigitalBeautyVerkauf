<?php
 //include 'Database.class.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author julia
 */
class User {
    //put your code here
    private $userID;
    private $anrede;
    private $vorname;
    private $nachname;
    private $adresse;
    private $plz;
    private $ort;
    private $email;
    private $benutzerName;
    private $passwort;
    private $admin;

   
   

    function setUserID($userID) {
        if(!empty($userID)){
            $this->userID = $userID;
        }
    }

    function setVorname($vorname) {
        if(!empty($vorname)){
            $this->vorname = $vorname;
        }
    }

    function setNachname($nachname) {
        if(!empty($nachname)){
            $this->nachname = $nachname;
        }
    }
    function setAnrede($anrede) {
        if(!empty($anrede)){
            $this->anrede = $anrede;
        }
    }

    function setAdresse($adresse) {
        if(!empty($adresse)){
            $this->adresse = $adresse;
        }
    }

    function setPlz($plz) {
        if(!empty($plz)){
            $this->plz = $plz;
        }
    }

    function setOrt($ort) {
        if(!empty($ort)){
            $this->ort = $ort;
        }
    }

    function setEmail($email) {
        if(!empty($email)){
            $this->email = $email;
        }
    }

    public function setBenutzerName($benutzerName) {
        if(!empty($benutzerName)){
            $this->benutzerName = $benutzerName;
        
        }
    }

    public function setPasswort($passwort) {
        if(!empty($passwort)){
            $this->passwort = $passwort;
        }
    }

    function setAdmin($admin) {
        if(!empty($admin)){
        $this->admin = $admin;
        
        }
    }

        function getVorname() {
        return $this->vorname;
    }

    function getNachname() {
        return $this->nachname;
    }
    
    function getUserID() {
        return $this->userID;
    }

    function getAnrede() {
        return $this->anrede;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getPlz() {
        return $this->plz;
    }

    function getOrt() {
        return $this->ort;
    }

    function getEmail() {
        return $this->email;
    }

    function getBenutzerName() {
        return $this->benutzerName;
    }

    function getPasswort() {
        return $this->passwort;
    }

    function getAdmin() {
        return $this->admin;
    }


    function addAllValues($userID, $anrede, $vorname, $nachname, $adresse, 
            $plz, $ort, $email, $benutzerName, $passwort, $admin) {
        $this->setUserID($userID);
        $this->setAnrede($anrede); 
        $this->setVorname($vorname);
        $this->setNachname($nachname);
        $this->setAdresse($adresse);
        $this->setPlz($plz);
        $this->setOrt($ort);
        $this->setEmail($email);
        $this->setBenutzerName($benutzerName);
        $this->setPasswort($passwort);
        $this->setAdmin($admin);
    }
    
    function insertUser(){
        
        
        $db =new Database();
        $query="INSERT INTO `User`(`Anrede`, `Vorname`, `Nachname`, `Adresse`, `PLZ`, `Ort`, `Email`, `Benutzername`, `Passwort`, `Admin`) "
                    ."VALUES ('".$this->anrede."','".$this->vorname."','".$this->nachname."','".$this->adresse."','".$this->plz."','"
                    .$this->ort."','".$this->email."','".$this->benutzerName."','".$this->passwort."','".$this->admin."')";
    
        $db->insert($query);
    }
    
    function selectAllUsers(){
        
        $db =new Database();
        $query="SELECT * from User";
        $db->select($query);
    }

    function checkIfUserExists(){
        $db =new Database();
        $query="SELECT count(*) as counter from User where `Vorname`like '".$this->vorname."' and `Nachname`like '".$this->nachname."'";
        $result=$db->count($query);
        while($zeile=$result->fetch_object()){
            echo ($zeile->counter);
            $counter=$zeile->counter;
        }
        
        return $counter;
        
    }
    
    function displayUser(){
        echo ($this->userID.'<br />'.$this->anrede.'<br />'.$this->vorname.'<br />'.$this->nachname.'<br />'.$this->adresse.'<br />'.$this->plz.
                    '<br />'.$this->ort.'<br />'.$this->email.'<br />'.$this->benutzerName.'<br />'.$this->passwort.'<br />'.$this->admin);
    }
    
    function validateUser(){
        if (isset($this->vorname)&&isset($this->nachname)&&isset($this->email)&&
                isset($this->benutzerName)&&isset($this->passwort)){
            return true;
        }
        return false;
    }
    
    function loginUser(){
        $db =new Database();
            $query="SELECT *  from User where `Benutzername` like '".$this->benutzerName."'";
            $result=$db->selectOneUser($query);
            
            if($result!=false){
                if(password_verify ( $result->passwort ,$this->passwort )==true){
                    if($result->admin==1){
                        $_SESSION['status']= "admin";
                    }else{
                        $_SESSION['status']= "user";
                    }
                    
                    $_SESSION['user']= $this->benutzerName;
                    $LoggedIn=true;
                }else{
                    $LoggedIn=false;
                }
                
            }else{
                    $LoggedIn=false;
                }
            return $LoggedIn;
    }
}
