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
    private $email;
    private $username;
    private $passwort;

   
   
    function setEmail($email) {
        if(!empty($email)){
            $this->email = $email;
        }
    }

    public function setUsername($username) {
        if(!empty($username)){
            $this->username = $username;
        
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

    function getEmail() {
        return $this->email;
    }

    function getUsername() {
        return $this->username;
    }

    function getPasswort() {
        return $this->passwort;
    }

    function getAdmin() {
        return $this->admin;
    }


    function addAllValues($email, $username, $passwort) {
        $this->setEmail($email);
        $this->setUsername($username);
        $this->setPasswort($passwort);
    }
    
    function insertUser(){
        
        
        $db =new Database();
        $query="INSERT INTO `benutzer`( `email`, `username`, `password`) "
                    ."VALUES ('".$this->email."','".$this->username."','".$this->passwort."')";
    
        $db->insert($query);
    }
    
    function selectAllUsers(){
        
        $db =new Database();
        $query="SELECT * from User";
        $db->select($query);
    }

    function checkIfUserExists(){
        $db =new Database();
        $query="SELECT count(*) as counter from benutzer where `username`like '".$this->username."' ";
        $result=$db->count($query);
        while($zeile=$result->fetch_object()){
            echo ($zeile->counter);
            $counter=$zeile->counter;
        }
        
        return $counter;
        
    }
    
    function displayUser(){
        echo ($this->userID.'<br />'.$this->anrede.'<br />'.$this->vorname.'<br />'.$this->nachname.'<br />'.$this->adresse.'<br />'.$this->plz.
                    '<br />'.$this->ort.'<br />'.$this->email.'<br />'.$this->username.'<br />'.$this->passwort.'<br />'.$this->admin);
    }
    
    function validateUser(){
        if (isset($this->email)&&isset($this->username)&&isset($this->passwort)){
            return true;
        }
        return false;
    }
    
    function loginUser(){
        $db =new Database();
            $query="SELECT *  from benutzer where `username` like '".$this->username."'";
            $result=$db->selectOneUser($query);
            
            if($result!=false){
                    if(password_verify (  $this->passwort,$result->passwort )==true){

                            $_SESSION['status']= "user";
                        $_SESSION['user']= $this->username;
                        $LoggedIn=true;
                    }else{
                        $LoggedIn="Passwort inkorrekt";
                    }
                
            }else{
                    $LoggedIn="Benutzername nicht vorhanden";
                }
            return $LoggedIn;
    }
}
