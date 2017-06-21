<?php
$db = new Database();
$user = new Customer();
$user=$db->getCustomer($_GET['KID']);
echo "<h3>".$user->getVorname()." ".$user->getNachname()."</h3>";
?>
<form class="form-horizontal">
      <div class="form-group form-group-md">
    <label class="col-sm-2 control-label" for="formGroupInputLarge">Produkt</label>
    <div class="col-sm-9">
      <input type="text"  class="form-control" id="SS" placeholder="Suche..." onkeyup="searchProdukt(this.value);" />
    </div>
  </div>
</form>
<div id="searchresultProdukt"></div>
<h2>Warenkorb  <span style="float: right" id="warenkorbCount"></span></h2>

<div id="WarenkorbDIV"></div>
<button class="btn btn-primary" onclick="warenkorbLöschen()">Warenkorb leeren</button>


<?php
echo "<script>document.getElementById('WarenkorbDIV').onload = updateWarenkorbCount(".count($_SESSION['warenkorb']).");
document.getElementById('WarenkorbDIV').onload = updateWarenkorb();</script>";