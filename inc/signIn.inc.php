
        <?php
        // put your code here
        $loginForm='
                <div class="container col-md-4 col-md-offset-4">
             <form class="form-signin" method="post" action="index.php?site=Home" >
            <h2 style="text-align:center">Willkommen bei<br />Digitaly Beautiful</h2>
            <label for="benutzername" class="sr-only">Benutzername</label>
            <input type="text" id="inputBenutzername" name="inputBenutzername" class="form-control" placeholder="Benutzername" required autofocus>
            <label for="inputPassword" class="sr-only" style="margin-top:5px">Passwort</label>
            <input type="password" id="inputPasswort" name="inputPasswort" class="form-control" placeholder="Passwort" required>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me" name="rememberMe"> Login merken
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Einloggen</button>
          </form>
          <a class="btn btn-lg btn-primary btn-block" href="index.php?site=Home&register=true" style="margin-top:10px">Registrieren</a>
            </div>';
        
        if (isset($_POST['inputBenutzername'])&&isset($_POST['inputPasswort'])){
            $loginUser =new User();
            $passwordHashed = password_hash((String)$_POST['inputPasswort'], PASSWORD_DEFAULT);
            $loginUser->setBenutzerName($_POST['inputBenutzername']);
            $loginUser->setPasswort($passwordHashed);
            
            $result=$loginUser->loginUser();
            //echo $passwordHashed;
            //var_dump($_POST) ;
            if($result!=false){
                
                if(isset($_POST['rememberMe'])){
                    
                    setcookie("name", $_POST['inputBenutzername'], time() + 7200);
                    setcookie("login", $passwordHashed, time() + 7200); 
                    

                }
                header("Refresh:0");
            }else{
                echo $loginForm;
            }
        }else{
            echo $loginForm;
            
        }
        
        
        //var_dump($_POST);
        ?>

