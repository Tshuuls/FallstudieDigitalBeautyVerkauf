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
        <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/theme.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <script src="ajax/ajax.js"></script><!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
        <script src="ajax/myJS.js"></script>
        <?php
             session_start();
            include 'model/Database.class.php';
            include 'model/Customer.class.php';
            include 'model/User.class.php';
            include 'model/auftrag.class.php';
            include 'model/Angebot.class.php';
            include 'model/Artikel.class.php';
            include 'model/AngebotPosition.class.php';
            include 'model/AuftragsPosition.class.php';
        ?>
    </head>
    <body>
    <?php 

    //
    if(!isset($_GET['site'])){
        $_GET['site']="Home";
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
    
    if($_GET['site']!="Home"&&$_GET['site']!="home"){
        include 'inc/navBar.inc.php';
    }
    ?>
        
        
        
    <div class="container">
<?php

            //var_dump($_SESSION);
        include $_SESSION['href'];

        ?>

    </div> <!-- /container -->
        
        
    </body>
</html>
