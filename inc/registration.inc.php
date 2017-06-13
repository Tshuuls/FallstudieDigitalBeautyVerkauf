<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$registerForm = '</div>
        <div class="col-md-6 col-md-offset-3">
        <form class="form-horizontal" method="POST" action="index.php?site=Home&register=true">
            
            <div class="form-group">
              <label for="registerEmail" class="col-sm-2 control-label">Email*</label>
              <div class="col-sm-10">
                  <input type="email" required class="form-control" id="registerEmail" name="registerEmail" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="registerBenutzername" class="col-sm-2 control-label">Benutzername*</label>
              <div class="col-sm-10">
                  <input type="text" required class="form-control" id="registerBenutzername" name="registerBenutzername" placeholder="Benutzername">
              </div>
            </div>
            <div class="form-group">
              <label for="registerPasswort" class="col-sm-2 control-label">Passwort*</label>
              <div class="col-sm-10">
                  <input type="password" required pattern=".{5,15}" class="form-control" id="registerPasswort" name="registerPasswort" placeholder="Passwort">
              </div>
            </div>
            <div class="form-group">
              <label for="registerPasswort2" class="col-sm-2 control-label">Passwort wiederholen*</label>
              <div class="col-sm-10">
                  <input type="password" required pattern=".{5,15}" class="form-control" id="registerPasswort2" name="registerPasswort2" placeholder="Passwort">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Sign in</button>
              </div>
            </div>
          </form>
            </div>';

if (isset($_POST['registerVorname'])){
    $check=false;
    if(isset($_POST['registergender'])&& $_POST['registergender']=="Frau"){
        $anrede="Frau";
    }else{
        $anrede= "Mann";
    }
    if($_POST['registerPasswort']===$_POST['registerPasswort2']){
        $user = new User(0, $anrede, $_POST['registerVorname'], $_POST['registerNachname'], $_POST['registerAdresse'],
                $_POST['registerPLZ'], $_POST['registerOrt'], $_POST['registerEmail'], $_POST['registerBenutzername'], $_POST['registerPasswort'], false);
        $usercheck=$user->validateUser();
        if ($usercheck==true){
            $db =new Database();
            $result=$db->getallBenutzernamen();
            if (in_array($user->getBenutzerName(),(array)$result)){
                //Username exists


            }
            if($check==true){
                //insert user in DB, return to login 
                
                
            }else{
                echo $registerForm;
        }
    
        }else{
        //invalid userInput
        
        }
    }
}else{
    echo $registerForm;
}

