
<?php
    $TempForm2='';
    $TempForm1 = '</div>
        <div class="col-md-6 col-md-offset-3">
        <h2>Neuen Kunden anlegen</h2><br>
        <form class="form-horizontal" method="POST" action="index.php?site=kundenverwaltung&type=1">
         
            <div class="form-group">
              <label for="CustVName" class="col-sm-2 control-label">Vorname*</label>
              <div class="col-sm-10">
                  <input type="text" required class="form-control" id="CustVName" name="CustVName" placeholder="Vorname">
              </div>
            </div>
            <div class="form-group">
              <label for="CustNName" class="col-sm-2 control-label">Nachname*</label>
              <div class="col-sm-10">
                  <input type="text" required class="form-control" id="CustNName" name="CustNName" placeholder="Nachname">
              </div>
            </div>

            <div class="form-group">
              <label for="CustStrasse" class="col-sm-2 control-label">Strasse*</label>
              <div class="col-sm-10">
                  <textarea required class="form-control" rows="2" id="CustStrasse" name="CustStrasse" placeholder="Strasse"></textarea>
              </div>
            </div>
             <div class="form-group">
              <label for="CustPLZ" class="col-sm-2 control-label">Postleitzahl*</label>
              <div class="col-sm-10">
                  <input type="number" required class="form-control" id="CustPLZ" name="CustPLZ" placeholder="PLZ">
              </div>
            </div>
            <div class="form-group">
              <label for="CustLand" class="col-sm-2 control-label">Land</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="CustLand" name="CustLand" placeholder="Land">
              </div>
            </div>
                
            <div class="form-group">
              <label for="CustEmail" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="CustEmail" name="CustEmail" placeholder="Email">
              </div>
            </div>
            
            <div class="form-group">
              <label for="CustTel" class="col-sm-2 control-label">TelefonNr</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="CustTel" name="CustTel" placeholder="Tel">
              </div>
            </div>

            <div class="form-group">
              <label for="CustZahlungsbedingungen" class="col-sm-2 control-label">Zahlungs-<br>bedingungen*</label>
              <div class="col-sm-10">
                  <textarea required class="form-control" rows="2" id="CustZahlungsbedingungen" name="CustZahlungsbedingungen" placeholder="Zahlungsbedingungen"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="CustStatus" class="col-sm-2 control-label">Kundenstatus</label>
              <div class="col-sm-10">
                  <select class="form-control" id="CustStatus" name="CustStatus">'; 
                    $db = new Database();
                    $statuslist = $db->getallstatus();
                    foreach($statuslist as $stat){
                    $TempForm2 = $TempForm2 . "<option value=".$stat->getKundenstatusID().">" . $stat->getRabatt() . " ".$stat->getWert()."% </option>";
                    }
                    $registerForm2 = $TempForm1 . $TempForm2 . '
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
        echo $registerForm2;
        ?>
