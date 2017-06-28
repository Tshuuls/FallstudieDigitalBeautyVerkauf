<?php     //include './inc/getAuftragsposition.inc.php';
          //include '../model/Auftrag.class.php';
//Liste anzeigen lassen der versendeten Aufträge samt Auftragsnummer
 if(isset($_GET['type']))
        {
        if($_GET['type']=="1" && isset($_GET['OID'])&& isset ($_GET['KID']))
            {
            include './inc/editAuftrag.inc.php';
            }
        
        else if($_GET['type']=="2" && isset($_GET['OID']))
            {
               $db = new Database();
               $db->ackAuftrag($_GET['OID']);
               Echo "<div class='alert alert-success' role='alert'>Auftrag wurde zur Kommissionierung freigegeben.</div>"; 
               include './inc/listAuftrag.inc.php';
            }
            else if($_GET['type']=="3" && isset($_GET['OID'])&& isset ($_GET['KID']))
            {
                
                $db = new Database();
                $db->makeRechnung($_GET['OID']);
                include './inc/showrechnung.inc.php';
            }
                else if($_GET['type']=="4" && isset($_GET['OID'])&& isset ($_GET['KID']))
                {
                    include './inc/showrechnung.inc.php';
                }else if($_GET['type']=="5" && isset($_GET['OID'])&& isset ($_GET['KID']))
                    {   //rechnung per email senden
                    
                        include './inc/editAuftrag.inc.php';
                    }
      }  
 else {
     include './inc/listAuftrag.inc.php';
   
 }

//wenn ich den Auftrag anklicke, dass er die Auftragspositionen aufmacht
//0=Auftrag offen; 1=Auftrag bereit zur Kommissionierung; 2=Auftrag kommissioniert und versendet
//kommissionierungsnr erstellen, damit es weiter geht ans Lager

               
              
           