<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$registerForm = '</div>
        <div class="col-md-6 col-md-offset-3" style="margin-top:20px">
        <form class="form-signin" method="post" action="index.php?site=Home" >
            <h2 style="text-align:center">Willkommen bei<br /><img src="res/img/logo-font.svg" style="height:50px"></h2>
        <form class="form-horizontal" method="POST" action="index.php?site=Home&register=true">
            
            <div class="form-group">
              <label for="registerEmail" class="col-sm-3 control-label">Email*</label>
              <div class="col-sm-9">
                  <input type="email" required class="form-control" id="registerEmail" name="registerEmail" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="registerBenutzername" class="col-sm-3 control-label">Benutzername*</label>
              <div class="col-sm-9">
                  <input type="text" required class="form-control" id="registerBenutzername" name="registerBenutzername" placeholder="Benutzername">
              </div>
            </div>
            <div class="form-group">
              <label for="registerPasswort" class="col-sm-3 control-label">Passwort*</label>
              <div class="col-sm-9">
                  <input type="password" required pattern=".{5,15}" class="form-control" id="registerPasswort" name="registerPasswort" placeholder="Passwort">
              </div>
            </div>
            <div class="form-group">
              <label for="registerPasswort2" class="col-sm-3 control-label">Passwort wiederholen*</label>
              <div class="col-sm-9">
                  <input type="password" required pattern=".{5,15}" class="form-control" id="registerPasswort2" name="registerPasswort2" placeholder="Passwort">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Sign in</button>
              </div>
            </div>
          </form>
          <a href="index.php" class="btn btn-primary" style="float:right">Back</a>
            </div>';

if (isset($_POST['registerBenutzername'])){
    $check=false;
    if($_POST['registerPasswort']===$_POST['registerPasswort2']){
        $passwordHashed = password_hash((String)$_POST['registerPasswort'], PASSWORD_DEFAULT);
        $user = new User();
        $user->addAllValues($_POST['registerEmail'], $_POST['registerBenutzername'], $passwordHashed);
        $usercheck=$user->validateUser();
        if ($usercheck==true){
            $db =new Database();
            $result=$db->getallBenutzernamen();
            if (in_array($user->getUsername(),(array)$result)){
                //Username exists
                echo "<div class='alert alert-danger col-md-6 col-md-offset-3'> Benutzername existiert schon </div>";
                 echo $registerForm;

            }else{
                //insert user in DB, return to login 
                $ID=$user->insertUser();
                Echo "<div class='alert alert-success' role='alert'>Registrierung war erfolgreich<div>";
                include 'signIn.inc.php';
                
            }
    
        }else{
        //invalid userInput
        echo "<div class='well'> Invalid Input </div>";
        echo $registerForm;
        
        }
    }
}else{
    echo $registerForm;
}

