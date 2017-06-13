
<?php
echo "<div class='col-md-10 col-md-offset-1'>";
    if(isset($_GET['type'])){
        //Angebot erstellen
        if($_GET['type']==1){
        
        include'./inc/newAngebot.inc.php';
        
        }//Angebot bearbeiten
        if($_GET['type']==2){
        
        include'./inc/editAngebot.inc.php';
        
        }
        
        
    }else{
        
        include'./inc/angebot.inc.php';
    }
    echo "</div>";
?>