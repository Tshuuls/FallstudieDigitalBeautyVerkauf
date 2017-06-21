
    <?php
    
    if(isset($_GET['type']))
        {
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
                $cust->setKundenstatusID($_POST['CustStatus']);
                
                //Kunden in Datenbank insterten
                $cust->insertCustomer();
                Echo "<div class='alert alert-success' role='alert'>Kunde erfolgreich hinzugefügt</div>"; 
                include './inc/listcustomer.inc.php';
            }
            
            else {
                //Neues Produktformular aufrufen
                include './inc/newcustomer.inc.php';
            }
        }    
        if($_GET['type']=="2" and isset($_GET['KNR']))
        {
                                   
            if(isset($_POST['CustVName'])&&isset($_POST['CustNName'])&&isset($_POST['CustStrasse'])){
                $cust = new Customer();
                $cust->setKundenNr($_GET['KNR']);
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
                $cust->setKundenstatusID($_POST['CustStatus']);
                $cust->updateCustomer();
                Echo "<div class='alert alert-success' role='alert'>Kunde erfolgreich aktualisiert</div>";
                include './inc/listcustomer.inc.php';
                
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
         if($delcustomer->deleteCustomer()){
            Echo "<div class='alert alert-success' role='alert'>Kunde wurde gelöscht</div>";
         }
         else {
             Echo "<div class='alert alert-danger' role='alert'>Kunde konnte nicht gelöscht werden, weil Aufträge oder Angebot vorhanden sind</div>";
         }
        include './inc/listcustomer.inc.php';
        }
            
        
    }
    else {
        // Kundenliste Anzeigen
        include './inc/listcustomer.inc.php';
    }
    
        
    ?>

