<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="res/css/myStyle.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="ajax/myJS.js"></script>
    </head>
    <body>
    <?php 
    include 'model/Database.class.php';
    include 'model/Customer.class.php';
    session_start();
    //
    if(!isset($_GET['site'])){
        $_GET['site']="home";
    }
    if(!isset($_SESSION['status'])){
        $_SESSION['status']= "visitor";
    }elseif(isset($_SESSION['status'])&&$_GET['site']=="Logout"){
        
                
        $_SESSION['user']= null;
        $_SESSION['status']= "visitor";
        
        setcookie("name", "", time() - 7200);
        setcookie("login", "", time() - 7200); 
       
    }
    
    
    $_SESSION['active']= "home";
    $_SESSION['href']= "sites/home.php";
    
    
    ?>
        
        <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php?site=home">Digitally Beautiful</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
             <?php
                $xmlFile = 'inc/menuXML.xml'; 

                if (file_exists($xmlFile)) { 
                $xml = simplexml_load_file($xmlFile);
                    foreach ( $xml->item as $item )   
                    {  
                       echo '<li><a href="index.php?site='.trim($item->id).'">'.$item->name.'</a></li>';   
                       
                       if (isset($_GET['site'])){
                            if($_GET['site']===trim($item->id)){
                                $_SESSION['href']= trim($item->href);
                                $_SESSION['active']=$_GET['site'];
                            }
                       }else{

                                $_SESSION['href']= "sites/home.php";
                                $_SESSION['active']="home";
                            }
                       
                    }  
                }
                else {
                    echo "no XML found";
                }
            ?>
            
             
              
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <?php
                if(isset($_SESSION['status'])&&($_SESSION['status']=="user"||$_SESSION['status']=="admin")){
                    echo '<li><a href="index.php?site=Logout">Log Out</a></li>';
                }else{
                    echo '<li><a href="index.php?site=home">Log in</a></li>';
                }
            ?>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
        
    <div class="container">
<?php

        
        include $_SESSION['href'];

        ?>

    </div> <!-- /container -->
        
        
    </body>
</html>
