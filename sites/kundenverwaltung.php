
    <?php
    
    if(isset($_GET['type']))
        {
        include './model/Customer.class.php';
        if($_GET['type']=="1")
            {
              
            if(isset($_POST['CustVName'])&&isset($_POST['CustNName'])&&isset($_POST['CustStrasse'])){
                //neuen Kunden anlegen
                
                $cust = new Customer();
                
                //Übergebene Parameter überprüfen und zuweisen
                if(isset($_POST['CustVName'])&&!empty(trim($_POST['CustVName']))){ 
                    $cust->setVorname(trim($_POST['CustVName']));
                    }
                if(isset($_POST['CustNName'])&&!empty(trim($_POST['CustNName']))){ 
                    $cust->setNachname(trim($_POST['CustNName']));
                    }
                if(isset($_POST['CustStrasse'])&&!empty(trim($_POST['CustStrasse']))){ 
                    $cust->setStrasse($_POST['CustStrasse']);
                    }
                $cust->setPLZ($_POST['CustPLZ']);
                $cust->setLAND($_POST['CustLand']);
                $cust->setZahlungsbedingungen($_POST['CustZahlungsbedingungen']);
                $cust->setEmail($_POST['CustEmail']);
                $cust->setTel($_POST['CustTel']);
                $cust->setKundenstatusID($_POST['CustKundenstatusID']);
                
                //Kunden in Datenbank insterten
                $cust->insertCustomer();
                Echo "<H3>Kunde erfolgreich hinzugefügt</h3>";
            }
            
            else {
                //Neues Produktformular aufrufen
                include './inc/newcustomer.inc.php';
            }
        }    
        if($_GET['type']=="2" and isset($_GET['KNR']))
        {
                                   
            if(isset($_POST['CustVName'])&&isset($_POST['CustNName'])&&isset($_POST['CustStrasse'])){
                $prod = new Product();
                $cust->setKundenNr($_GET['KNR']);
               //Übergebene Parameter überprüfen und zuweisen
                if(isset($_POST['CustVName'])&&!empty(trim($_POST['CustVName']))){ 
                    $cust->setName(trim($_POST['CustVName']));
                    }
                if(isset($_POST['CustNName'])&&!empty(trim($_POST['CustNName']))){ 
                    $cust->setBeschreibung(trim($_POST['CustNName']));
                    }
                if(isset($_POST['CustStrasse'])&&!empty(trim($_POST['CustStrasse']))){ 
                    $cust->setPreis($_POST['CustStrasse']);
                    }
                $cust->setPLZ($_POST['CustPLZ']);
                $cust->setLAND($_POST['CustLand']);
                $cust->setZahlungsbedingungen($_POST['CustZahlungsbedingungen']);
                $cust->setEmail($_POST['CustEmail']);
                $cust->setTel($_POST['CustTel']);
                $cust->setKundenstatusID($_POST['CustKundenstatusID']);
                $cust->updateCustomer();
                Echo "<H3>Kunde erfolgreich aktualisiert</h3>";
            }
            else {
                $custedit = new Customer();
                $db = new Database();
                $custedit = $db->getCustomer($_GET['KNR']);
                include './inc/editcustomer.inc.php';
            }
                
        } 
            
        if($_GET['type']=="3"&&isset($_GET['KNR']))
        {
         $db = new Database;
         $delcustomer = $db->getCustomer($_GET['KNR']);
         $delcustomer->deleteCustomer();
        Echo "<H2>Produkt wurde gelöscht</h2>";
        
        }
            
        
    }
    else {
        // Produktliste Anzeigen
        $db = new Database();
        $allCust = $db->getallCustomer();
        echo "<div class='col-md-6 col-md-offset-2'>";
        echo "<h2>Kunden bearbeiten</h2><br>";
        echo "<br>";
        echo "<div class='col-sm-offset-0 col-sm-10'><form class='form-horizontal' method='POST' action='index.php?site=kundenverwalten&type=1'><button type='submit' class='btn btn-primary'>Neuen Kunden hinzufügen</button></form><br></div>";
        if(!empty($allCust)){
            echo"<table class='table striped-table'> <tr><th>Nummer</th><th>Vorname</th><th>Nachname</th><th>Strasse</th><th>PLZ</th><th>Land</th><th>Email</th><th>Telefon</th><th>Email</th><th>Zahlungsbedingungen</th><th>Status</th><th>Aktion</th></tr>";
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
    }
    
        
    ?>

