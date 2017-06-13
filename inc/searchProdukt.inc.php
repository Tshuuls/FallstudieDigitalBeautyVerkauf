<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['SS']) && !empty(trim($_POST['SS']))){
  
        $String = $_POST['SS']."%";
   
    // Customer und Datenbank Klasse müssen nochmal inkludiert werden, da das PHP Formular nur von Javascript aufgerufen wird und daher die Klassen nicht vererbt bekommt. 
    //include '../model/Customer.class.php';
    include '../model/Database.class.php';
    $db = new Database();
    echo '<ul>';
    
     $ergebnis = $db->searchCustomer($String);
     foreach ($ergebnis as $Kunde){
         echo '<li><a  onclick="addProduktToCart('.$Kunde->getKundenNr().')">'.$Kunde->getKundenNr().': '.$Kunde->getVorname().' '.$Kunde->getNachname().'</a></li>';
     }
     
    echo '</ul>';
}

if(isset($_POST['PID']) && !empty(trim($_POST['PID']))){
  
        $PID = $_POST['PID'];
   
    // Customer und Datenbank Klasse müssen nochmal inkludiert werden, da das PHP Formular nur von Javascript aufgerufen wird und daher die Klassen nicht vererbt bekommt. 
    //include '../model/Customer.class.php';
    include '../model/Database.class.php';
    $db = new Database();
    $db = new Database();
    $user = new Customer();
    $user=$db->getCustomer($PID);
    echo'<div class="form-group form-group-md">
    <label class="col-sm-4 control-label" for="formGroupInputLarge">'.$user->getVorname().'</label>
    <div class="col-sm-8">
      <p class="form-control-static">Produkt</p>
    </div>
  </div>
    <div class="form-group form-group-md">
    <label class="col-sm-4 control-label" for="formGroupInputSmall">'.$user->getKundenNr().'</label>
    <div class="col-sm-8">
      <p class="form-control-static">Preis</p>
    </div>
  </div>
  <div class="form-group form-group-md">
    <label class="col-sm-4 control-label" for="formGroupInputSmall">Anzahl</label>
    <div class="col-sm-3">
        <input class="form-control" type="number" min="0" id="formGroupInputSmall" placeholder="Anzahl">
        <input class="form-control" style="display: none" type="number" min="0" id="formGroupInputSmall" value="PRodID">
    </div>
  </div>
    <div class="form-group form-group-md">
    <label class="col-sm-4 control-label" for="formGroupInputSmall">Gesamt Preis</label>
    <div class="col-sm-8">
      <p class="form-control-static">Gesamt Preis</p>
    </div>
  </div>
    <hr>';
    
}