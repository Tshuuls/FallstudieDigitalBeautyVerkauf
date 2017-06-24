
<?php
$db = new Database();

$user = new Customer();
$user=$db->getCustomer($_GET['KID']);
$angebot= new Angebot();
$angebot= $db->selectOneAngebot($_GET['AID']);
echo "<h3>".$user->getVorname()." ".$user->getNachname()."</h3>";
echo "<h4>Angebotsnummer: ".$_GET['AID']."</h4>";
echo "<h4>Erstellungsdatum: ".$angebot->getErstelldatum()."</h4>";

$angebotsPositionsListe= $db->selectAngebotsPositionen($_GET['AID']);
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
echo '<button class="btn btn-primary" onclick="warenkorbLöschen()">In Auftrag umwandeln</button>';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

