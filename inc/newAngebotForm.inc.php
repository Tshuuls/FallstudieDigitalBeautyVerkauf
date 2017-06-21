<?php
$db = new Database();
$user = new Customer();
$user=$db->getCustomer($_GET['KID']);
echo "<h3>".$user->getVorname()." ".$user->getNachname()."</h3>";

include 'searchProdukt.inc.php';
$Artikel=$db->getallArtikel();
echo"<table  class='table table-striped'><tr><th>Name</th><th>Preis</th><th>Kategorie</th><th>Aktion</th></tr>";

foreach ($Artikel as $a){
    echo"<tr>";
    echo"<td>".$a->getArtikelname()."</td>";
    echo"<td>".$a->getVerkaufspreis()."</td>";
    echo"<td>".$a->getArtikelgruppe()."</td>";
    echo"<td><span class='fa fa-plus' aria-hidden='true' onclick='' style='cursor:pointer'></span></td>";
    echo"</tr>";
}
echo"</table>";
?>

<form class="form-horizontal" id="positionsList">
  <div class="form-group form-group-md">
    <label class="col-sm-4 control-label" for="formGroupInputLarge">Produkt</label>
    <div class="col-sm-8">
      <p class="form-control-static">Produkt</p>
    </div>
  </div>
    <div class="form-group form-group-md">
    <label class="col-sm-4 control-label" for="formGroupInputSmall">Preis</label>
    <div class="col-sm-8">
      <p class="form-control-static">Preis</p>
    </div>
  </div>
  <div class="form-group form-group-md">
    <label class="col-sm-4 control-label" for="formGroupInputSmall">Anzahl</label>
    <div class="col-sm-3">
        <input class="form-control" type="number" min="0" id="formGroupInputSmall" placeholder="Anzahl">
        <input class="form-control" style="display: none" type="number" min="0" id="formGroupInputSmall" value="PRodID">
    </div>
  </div>
    <div class="form-group form-group-md">
    <label class="col-sm-4 control-label" for="formGroupInputSmall">Gesamt Preis</label>
    <div class="col-sm-8">
      <p class="form-control-static">Gesamt Preis</p>
    </div>
  </div>
    <hr>
</form>

<form class="form-horizontal">
      <div class="form-group form-group-md">
    <label class="col-sm-2 control-label" for="formGroupInputLarge">Produkt</label>
    <div class="col-sm-9">
      <input type="text"  class="form-control" id="SS" placeholder="Suche..." onkeyup="searchProdukt(this.value);" />
    </div>
  </div>
</form>
<div id="searchresultProdukt"></div>


<?php
