<?php
    
    $TempForm2='';
    $TempForm1 = '</div>
        <div class="col-md-6 col-md-offset-3">
        <h2>Kunden bearbeiten</h2><br>
        <form class="form-horizontal" method="POST" action="index.php?site=kundenverwaltung&type=2&PID='.$custedit->getKundenNr().'">
         
            <div class="form-group">
              <label for="CustVName" class="col-sm-2 control-label">Vorname*</label>
              <div class="col-sm-10">
                  <input type="text" required class="form-control" id="CustVName" value="'.$custedit->getVorname().'" name="CustVName">
              </div>
            </div>
            <div class="form-group">
              <label for="CustNName" class="col-sm-2 control-label">Nachname*</label>
              <div class="col-sm-10">
                  <input type="text" required class="form-control" id="CustNName" value="'.$custedit->getNachname().'" name="CustNName">
              </div>
            </div>

            <div class="form-group">
              <label for="CustStrasse" class="col-sm-2 control-label">Strasse*</label>
              <div class="col-sm-10">
                  <textarea required class="form-control" rows="2" id="CustStrasse" name="CustStrasse">"'.$custedit->getStrasse().'"</textarea>
              </div>
            </div>
             <div class="form-group">
              <label for="CustPLZ" class="col-sm-2 control-label">Postleitzahl*</label>
              <div class="col-sm-10">
                  <input type="number" required class="form-control" id="CustPLZ" value="'.$custedit->getPLZ().'" name="CustPLZ">
              </div>
            
            <div class="form-group">
              <label for="CustLand" class="col-sm-2 control-label">Land</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="CustLand" value="'.$custedit->getLand().'" name="CustLand" >
              </div>
            </div>
            
            <div class="form-group">
              <label for="CustEmail" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="CustEmail" value="'.$custedit->getEmail().'"  name="CustEmail" >
              </div>
            </div>
            
            <div class="form-group">
              <label for="CustTel" class="col-sm-2 control-label">Telefonnummer</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="CustTel" value="'.$custedit->getTel().'" name="CustTel">
              </div>
            </div>
            
            <div class="form-group">
              <label for="CustZahlungsbedingungen" class="col-sm-2 control-label">Zahlungsbedingungen*</label>
              <div class="col-sm-10">
                  <textarea required class="form-control" rows="2" id="CustZahlungsbedingungen" name="CustZahlungsbedingungen" >"'.$custedit->getZahlungsbedingungen().'"</textarea>
              </div>
            </div>
            
            <div class="form-group">
              <label for="CustStatus" class="col-sm-2 control-label">Kundenstatus</label>
              <div class="col-sm-10">
                  <select class="form-control" id="CustStatus" name="CustStatus">'; 
                    $db = new Database();
                    $statuslist = $db->getallstatus();
                    foreach($statuslist as $stat){
                    if($custedit->getKundenstatusID() == $stat->getKundenstatusID()) {$TempForm2 = $TempForm2 .'"<option value="'.$stat->getKundenstatusID().'" selected="selected">'.$stat->getRabatt().'</option>"';}
                    else { $TempForm2 = $TempForm2 . "<option value=".$stat->getKundenstatusID().">" . $stat->getRabatt() . "</option>";}
                    }
                    $registerForm3 = $TempForm1 . $TempForm2 . '
                  </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Speichern</button>
              </div>
            </div>
          </form>
            </div>'; 
        echo $registerForm3;
        ?>