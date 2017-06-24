<?php    // include '../model/Database.class.php';
          //include '../model/Auftrag.class.php';
//Liste anzeigen lassen der versendeten Aufträge samt Auftragsnummer--
//echo"blbla";

    $db = new Database();
    
    $ergebnis = $db->getOrders();
    
echo "<h3>Liste der Aufträge</h3>";
echo "<table class='table table-striped'>";

        echo "<th>Auftragsnummer</th>";
        echo "<th>Kundennummer</th>";
        echo "<th>Auftrag</th>";
        echo "<th>Kommissionierung</th>";
        echo "<th>Bezeichnung</th>";
  
             foreach ($ergebnis as $order){
                echo"<tr>";
                    echo"<td>".$order->getAuftragsNr()."</td>";
                    echo"<td>".$order->getKundenNr()."</td>";
                    echo"<td>".$a->getAuftrag()."</td>";
                    echo"<td>".$a->getKommission()."</td>";
                    echo"<td>".$a->getBezeichnung()."</td>";
                echo"</tr>";
             }
     
echo "</table>";


//Auftrag erstellen - hole mir die AuftragsListe von Julia
    //$Auftrag = Auftrag::getAll();

//wenn ich den Auftrag anklicke, dass er die Auftragspositionen aufmacht

//kommissionierungsnr erstellen, damit es weiter geht ans Lager