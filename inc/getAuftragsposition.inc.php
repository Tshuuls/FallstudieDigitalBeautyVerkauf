<?php
    $db = new Database();
    
    $ergebnis = $db->getOrderPosition();
    
echo "<h3>Auftragspositionen</h3>";


    if (!empty($_GET['type'])) {
        $type= $_GET['type'];
        $ergebnis = AuftragsPosition::getPosition($type);

        
    }
echo "<table class='table table-striped'>";

        echo "<th>ID</th>";
        echo "<th>Auftragsposition</th>";
        echo "<th>Menge</th>";
        echo "<th>Kosten</th>";
        echo "<th>ArtikelNr</th>";
        echo "<th>AuftragsNr</th>";
  
             foreach ($ergebnis as $position){
                echo"<tr>";
                    echo"<td>".$position->getID()."</td>";
                    echo"<td>".$position->getAuftragsposition()."</td>";
                    echo"<td>".$position->getMenge()."</td>";
                    echo"<td>".$position->getKosten()."</td>";
                    echo"<td>".$position->getArtikelNr()."</td>";
                    echo"<td>".$position->getAuftragsNr()."</td>";
                echo"</tr>";
             }
     
echo "</table>";


