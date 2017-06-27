
<?php
echo "<div class='col-md-10 col-md-offset-1'>";
$db = new Database;
    if(isset($_GET['type'])&&$_GET['type']==1){
        //Angebot erstellen
        
        include'./inc/newAngebot.inc.php';
        
        
    }elseif(isset($_GET['type'])&&$_GET['type']==2){
        //Angebot bestätigt
        include'./inc/angebotBestaetigt.inc.php';
        
        
    }elseif(isset($_GET['type'])&&$_GET['type']==3){
        //Angebot bestätigt
        include'./inc/editAngebot.inc.php';
        
        
    }elseif(isset($_GET['type'])&&$_GET['type']==4){
        //Angebot bestätigt
        include'./inc/editAngebot.inc.php';
        
        
    }elseif(isset($_GET['type'])&&$_GET['type']==5){
        //Angebot löschen
        $angebot= new Angebot();
        $angebot= $db->selectOneAngebot($_GET['AID']);
        $angebotsPositionsListe= $db->selectAngebotsPositionen($_GET['AID']);
        foreach ($angebotsPositionsListe as $position){
           $position->deleteAngebotsPosition();
        }
        $angebot->deleteAngebot();
        echo '<div class="col-md-offset-3" style="margin-bottom:20px">
            <a class="btn btn-primary btn-lg_Angebot" href="index.php?site=angebot&type=1">Angebot erstellen</a>
        </div>';
        $angebotlist= $db->selectAllAngebote();
        echo "<table class='table table-striped'>
            <tr>
                <th>Nummer</th>
                <th>Kunde</th>
                <th>Datum</th>
                <th>Aktion</th>

            </tr>";
        foreach ($angebotlist as $angebot){
           $Kunde=$db->getCustomer($angebot->getKundenNr());
            echo"<tr>";
            echo "<td> ".$angebot->getAngebotsNr()."</td>";
            echo "<td>".$Kunde->getNAchname()." ".$Kunde->getVorname()."</td>";
            echo "<td> ".$angebot->getErstelldatum()."</td>";
            echo "<td class='actiongr'> <a class='glyphicon glyphicon-pencil' href='index.php?site=angebot&type=3&AID=".$angebot->getAngebotsNr()."&KID=".$angebot->getKundenNr()."'></a> <a class='glyphicon glyphicon-remove' href='index.php?site=angebot&type=5&AID=".$angebot->getAngebotsNr()."'></a></td>"; 

            echo"</tr>";
        }
        echo "</table>";
        
        
    }elseif(isset($_GET['type'])&&$_GET['type']==6){
        //Angebot bearbeiten
        $user = new Customer();
        $user=$db->getCustomer($_GET['KID']);
        $angebot= new Angebot();
        $angebot= $db->selectOneAngebot($_GET['AID']);
        $angebotsPositionsListe= $db->selectAngebotsPositionen($_GET['AID']);
        echo "<div id='AngebotbearbeitenDIV'></div>";
        $_SESSION['warenkorb']=array(); 
        foreach ($angebotsPositionsListe as $position){
            for($i = 1; $i <= $position->getMenge(); $i++){
                array_push($_SESSION['warenkorb'], $position->getArtikelNr());
            }
        }
        include './inc/newAngebotForm.inc.php';


        
        
        
        
    }elseif(isset($_GET['type'])&&$_GET['type']==7){
        //Angebot ändern
        $angebot= new Angebot();
        $angebot= $db->selectOneAngebot($_GET['AID']);
        $angebotsPositionsListe= $db->selectAngebotsPositionen($_GET['AID']);
        foreach ($angebotsPositionsListe as $position){
           $position->deleteAngebotsPosition();
        }
        $angebot->deleteAngebot();
        include'./inc/angebotBestaetigt.inc.php';
        
        
    }else{
        echo '<div class="col-md-offset-3" style="margin-bottom:20px">
            <a class="btn btn-primary btn-lg_Angebot" href="index.php?site=angebot&type=1">Angebot erstellen</a>
        </div>';
        $angebotlist= $db->selectAllAngebote();
        echo "<table class='table table-striped'>
            <tr>
                <th>Nummer</th>
                <th>Kunde</th>
                <th>Datum</th>
                <th>Aktion</th>

            </tr>";
        foreach ($angebotlist as $angebot){
           $Kunde=$db->getCustomer($angebot->getKundenNr());
            echo"<tr>";
            echo "<td> ".$angebot->getAngebotsNr()."</td>";
            echo "<td>".$Kunde->getNAchname()." ".$Kunde->getVorname()."</td>";
            echo "<td> ".$angebot->getErstelldatum()."</td>";
            echo "<td class='actiongr'> <a class='glyphicon glyphicon-pencil' href='index.php?site=angebot&type=3&AID=".$angebot->getAngebotsNr()."&KID=".$angebot->getKundenNr()."'></a> <a class='glyphicon glyphicon-remove' href='index.php?site=angebot&type=5&AID=".$angebot->getAngebotsNr()."'></a></td>"; 

            echo"</tr>";
        }
        echo "</table>";
    }
    echo "</div>";
?>