

<h2>Angebot erstellen</h2>

<form class="form-horizontal">
      <div class="form-group form-group-md">
    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kundennummer</label>
    <div class="col-sm-9">
      <input type="text"  class="form-control" id="SS" placeholder="Suche..." onkeyup="searchKunde(this.value);" />
    </div>
  </div>
</form>
<a class="btn btn-md btn-primary" href="index.php?site=kundenverwaltung&type=1">Kunden anlegen</a>

<div id="searchresult"></div>

<?php
if(isset($_GET['KID'])){
    include 'newAngebotForm.inc.php';
}
?>

