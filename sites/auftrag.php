<?php    // include '../model/Database.class.php';
          //include '../model/Auftrag.class.php';
//Liste anzeigen lassen der versendeten Aufträge samt Auftragsnummer

    $db = new Database();
    
    $ergebnis = $db->getOrders();
    
echo "<h3>Auftragsliste</h3>";
echo "<table class='table table-striped'>";

        echo "<th>Auftragsnummer</th>";
        echo "<th>Kundennummer</th>";
        echo "<th>Auftrag</th>";
        echo "<th>Kommissionierung</th>";
        echo "<th>Bezeichnung</th>";
        echo "<th>Erstelldatum</th>";
  
             foreach ($ergebnis as $order){
                $active = "";
                //if($cat == $Kategorie->getKategorieID()) {
                    $active = "active";
                //}
                echo"<tr>";
                    echo"<td <a href='index.php?page=getAuftragsposition>".$order->getAuftragsNr()."></a></td>";
                    echo"<td>".$order->getKundenNr()."</td>";
                    echo"<td>".$order->getAuftrag()."</td>";
                    echo"<td>".$order->getKommission()."</td>";
                    echo"<td>".$order->getBezeichnung()."</td>";
                    echo"<td>".$order->getDatum()."</td>";
                echo"</tr>";
             }
     
echo "</table>";


//wenn ich den Auftrag anklicke, dass er die Auftragspositionen aufmacht
//0=Auftrag offen; 1=Auftrag bereit zur Kommissionierung; 2=Auftrag kommissioniert und versendet
//kommissionierungsnr erstellen, damit es weiter geht ans Lager

               
               //echo "<li role='presentation' class='$active'><a href='index.php?page=produkte&cat=" .$Kategorie->getKategorieID() ."'>" . $Kategorie->getKategorieName() . "</a></li>";
           