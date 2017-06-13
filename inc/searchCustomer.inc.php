<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if(isset($_POST['SS']) && !empty(trim($_POST['SS']))){
  
        $String = $_POST['SS']."%";
   
    // Customer und Datenbank Klasse müssen nochmal inkludiert werden, da das PHP Formular nur von Javascript aufgerufen wird und daher die Klassen nicht vererbt bekommt. 
    include '../model/Customer.class.php';
    include '../model/Database.class.php';
    $db = new Database();
    echo '<ul>';
    
     $ergebnis = $db->searchCustomer($String);
     foreach ($ergebnis as $Kunde){
         echo '<li><a href="index.php?site=angebot&type=1&KID='.$Kunde->getKundenNr().'">'.$Kunde->getKundenNr().': '.$Kunde->getVorname().' '.$Kunde->getNachname().'</a></li>';
     }
     
    echo '</ul>';
}