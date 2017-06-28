<?php

$db = new Database();

$user = new Customer();
$user=$db->getCustomer($_GET['KID']);
$auftrag = new Auftrag();
$auftrag= $db->selectOneAuftrag($_GET['OID']);
$auftragsPositionsListe= $db->getOrderPosition($_GET['OID']);

if($_GET['type']==1){

    echo "<h3>".$user->getVorname()." ".$user->getNachname()."</h3>";
    echo "<h4>Auftragssnummer: ".$auftrag->getBezeichnung()."</h4>";
    echo "<h4>Erstellungsdatum: ".$auftrag->getErstelldatum()."</h4>";

     echo "<table  class='table table-striped'>
        <tr>
            <th>Position</th>
            <th>Name</th>
            <th>Anzahl</th>
            <th>Preis</th>
        </tr>
        ";
     $gesamtPreis=0;
    foreach ($auftragsPositionsListe as $position){
       echo" <tr>
            <td>".$position->getAuftragsposition()."</td>
            <td>".$position->getArtikelname()."</td>
            <td>".$position->getMenge()."</td>
            <td>".$position->getKosten()." €</td>
            </tr>";
            $gesamtPreis=$gesamtPreis+$position->getKosten();
    }
    echo"
        <tr>
            <td colspan='3'>Gesamtpreis</td>
            <td>".$gesamtPreis.".-€</td>
        </tr>";

    echo"</table>";
    if($auftrag->getKommission()==0) {echo '<a class="btn btn-primary" href="index.php?site=auftrag&type=2&OID='.$_GET['OID'].'">Auftrag bestätigen</a>';}
    if($auftrag->getKommission()==2 && $auftrag->getAuftrag() == 0) echo '<a class="btn btn-primary Abstand" href="index.php?site=auftrag&type=3&OID='.$_GET['OID'].'&KID='.$_GET['KID'].'">Rechnung erstellen</a>';
    echo '<a class="btn btn-primary Abstand" href="index.php?site=auftrag&type=4&OID='.$_GET['OID'].'&KID='.$_GET['KID'].'">Rechnung anzeigen</a>';
    }