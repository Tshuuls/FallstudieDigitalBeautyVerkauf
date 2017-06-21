<?php
        $db = new Database();
        $allCust = $db->getallCustomer();
        echo "<div class='col-md-6 col-md-offset-1'>";
        echo "<h2>Kunden bearbeiten</h2><br>";
        echo "<br>";
        echo "<div class='col-sm-offset-0 col-sm-10'><form class='form-horizontal' method='POST' action='index.php?site=kundenverwaltung&type=1'><button type='submit' class='btn btn-primary'>Neuen Kunden hinzufügen</button></form><br></div>";
        if(!empty($allCust)){
            echo"<table class='table striped-table'> <tr><th>Nummer</th><th>Vorname</th><th>Nachname</th><th>Strasse</th><th>PLZ</th><th>Land</th><th>Email</th><th>Telefon</th><th>Zahlungsbedingungen</th><th>Status</th><th>Aktion</th></tr>";
            foreach ($allCust as $custObj){
                echo "<tr>";
                echo "<td>".$custObj->getKundenNr()."</td>";  
                echo "<td>".$custObj->getVorname()."</td>"; 
                echo "<td>".$custObj->getNachname()."</td>";
                echo "<td>".$custObj->getStrasse()."</td>";
                echo "<td>".$custObj->getPLZ()."</td>";
                echo "<td>".$custObj->getLand()."</td>"; 
                echo "<td>".$custObj->getEmail()."</td>";
                echo "<td>".$custObj->getTel()."</td>";
                echo "<td>".$custObj->getZahlungsbedingungen()."</td>";
                echo "<td>".$custObj->getKundenstatus()."</td>";
                echo "<td class='actiongr'> <a class='glyphicon glyphicon-pencil' href='index.php?site=kundenverwaltung&type=2&KNR=".$custObj->getKundenNr()."'></a> <a class='glyphicon glyphicon-remove' href='index.php?site=kundenverwaltung&type=3&KNR=".$custObj->getKundenNr()."'></a></td>"; 
                echo "</tr>";
                }  
            echo "</table>";
            }
   
            
        else {
           echo "<div class='col-md-12'>";
                echo "<div class='alert alert-danger'> Keine Kunden gefunden. </div>";
           echo "</div>";
        }