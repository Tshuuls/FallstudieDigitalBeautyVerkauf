<?php
 $db = new Database();
    
    $ergebnis = $db->getOrders();
    
        echo "<h3>Auftragsliste</h3>";
        
        
        
        echo "<table class='table table-striped'>";
        
        echo "<th>Auftrag</th>";
        echo "<th>Kunde</th>";
        echo "<th>Kommissionierung</th>";
        echo "<th>Status</th>";
        echo "<th>Erstelldatum</th>";
  
             foreach ($ergebnis as $order){
                echo"<tr>";
                    $help = "";
                     $help2 = "";
                    echo"<td><a href='index.php?site=auftrag&type=1&OID=".$order->getAuftragsNr()."&KID=".$order->getKundenNr()."'>".$order->getBezeichnung()."</a></td>";
                    echo"<td>".$order->getKundenname()."</td>";
                    if ($order->getKommission() == 0 ){$help = "noch nicht bestätigt";}
                    if ($order->getKommission() == 1 ) {$help = "wird komissioniert";}
                    if ($order->getKommission() == 2 ) {$help = "Ware wurde versendet";}
                    if ($order->getAuftrag() == 0 ){$help2 = "Auftrag";}
                    if ($order->getAuftrag() > 0 ) {$help2 = "Rechnung";}
                    echo"<td>".$help."</td>";
                    echo"<td>".$help2."</td>";
                    echo"<td>".$order->getDatum()."</td>";
                echo"</tr>";
             }
     
        echo "</table>";