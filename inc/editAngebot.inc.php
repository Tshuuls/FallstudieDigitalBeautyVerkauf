
<?php
$db = new Database();

$user = new Customer();
$user=$db->getCustomer($_GET['KID']);
$angebot= new Angebot();
$angebot= $db->selectOneAngebot($_GET['AID']);
$angebotsPositionsListe= $db->selectAngebotsPositionen($_GET['AID']);

if($_GET['type']==3){

    echo "<h3>".$user->getVorname()." ".$user->getNachname()."</h3>";
    echo "<h4>Angebotsnummer: ".$_GET['AID']."</h4>";
    echo "<h4>Erstellungsdatum: ".$angebot->getErstelldatum()."</h4>";

     echo "<table  class='table table-striped'>
        <tr>
            <th>Name</th>
            <th>Anzahl</th>
            <th>Preis</th>
        </tr>
        ";
     $gesamtPreis=0;
    foreach ($angebotsPositionsListe as $position){
       echo" <tr>
            <td>".$position->getAngebotsposition()."</td>
            <td>".$position->getMenge()."</td>
            <td>".$position->getKosten()." .-€</td>
            </tr>";
            $gesamtPreis=$gesamtPreis+$position->getKosten();
    }
    echo"
        <tr>
            <td colspan='2'>Gesamtpreis</td>
            <td>".$gesamtPreis." .-€</td>
        </tr>";

    echo"</table>";
    echo '<a class="btn btn-primary" href="index.php?site=angebot&type=4&AID='.$_GET['AID'].'&KID='.$_GET['KID'].'">In Auftrag umwandeln</a>';
}else if($_GET['type']==4){
    $aufnr=$db->insertAuftrag($angebot);
    var_dump($angebot);
    $auftragsPos = new AuftragsPosition();
    foreach ($angebotsPositionsListe as $position){
       $auftragsPos->setAuftragsposition($position->getAngebotsposition());
       $auftragsPos->setAuftragssNr($aufnr);
       $auftragsPos->setKosten($position->getKosten());
       $auftragsPos->setMenge($position->getMenge());
       $auftragsPos->setArtikelNr($position->getArtikelNr());
       $auftragsPos->insertAuftragPosition();
       $position->deleteAngebotsPosition();
    }
    $angebot->deleteAngebot();
    
    echo'<div class="alert alert-success">
  Angebot wurde in Auftrag umgewandelt
</div>';
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

