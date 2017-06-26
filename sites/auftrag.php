<?php     //include './inc/getAuftragsposition.inc.php';
          //include '../model/Auftrag.class.php';
//Liste anzeigen lassen der versendeten Aufträge samt Auftragsnummer
 if(isset($_GET['type']))
        {
        if($_GET['type']=="1" && isset($_GET['OID'])&& isset ($_GET['KID']))
            {
            include './inc/editAuftrag.inc.php';
            }
        
        else if($_GET['type']=="2" && isset($_GET['OID'])&& isset ($_GET['KID']))
            {
                echo "Test";
            }
      }  
 else {
     include './inc/listAuftrag.inc.php';
   
 }

//wenn ich den Auftrag anklicke, dass er die Auftragspositionen aufmacht
//0=Auftrag offen; 1=Auftrag bereit zur Kommissionierung; 2=Auftrag kommissioniert und versendet
//kommissionierungsnr erstellen, damit es weiter geht ans Lager

               
              
           