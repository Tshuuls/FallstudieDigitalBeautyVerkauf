<?php
$db = new Database();
$user = new Customer();
$_SESSION['KID']=$_GET['KID'];
$user=$db->getCustomer($_GET['KID']);
$kundenRabatt=$db->getRabatt($user->getKundenstatusID());
echo "<h3>".$user->getVorname()." ".$user->getNachname()."</h3>";
echo "<h4>Kundenrabatt: ".$kundenRabatt."%</h4>";
if($_GET['type']==6){
    
        echo "<h4>Angebotsnummer: ".$_GET['AID']."</h4>";
        echo "<h4>Erstellungsdatum: ".$angebot->getErstelldatum()."</h4>";
}
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
if($_GET['type']==1){
    echo '<a class="btn btn-primary" href="index.php?site=angebot&type=2&KID='.$_GET['KID'].'"  style="float: right">Angebot bestätigen</a>';
}
if($_GET['type']==6){
    echo '<a class="btn btn-primary" href="index.php?site=angebot&type=7&KID='.$_GET['KID'].'&AID='.$_GET['AID'].'"  style="float: right">Angebot ändern</a>';
}
if(isset($_SESSION['warenkorb'])){
    echo "<script>document.getElementById('WarenkorbDIV').onload = updateWarenkorbCount(".count($_SESSION['warenkorb']).");
document.getElementById('WarenkorbDIV').onload = updateWarenkorb(".$_GET['KID'].");</script>";
}else{
    $_SESSION['warenkorb']=array();
    echo "<script>document.getElementById('WarenkorbDIV').onload = updateWarenkorbCount(".count($_SESSION['warenkorb']).");
document.getElementById('WarenkorbDIV').onload = updateWarenkorb(".$_GET['KID'].");</script>";
}

