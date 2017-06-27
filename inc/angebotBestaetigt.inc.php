<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$db = new Database();

$user = new Customer();
$user=$db->getCustomer($_GET['KID']);
echo "<h3>".$user->getVorname()." ".$user->getNachname()."</h3>";
$gesamtPreis=0;
$ergebnis = $db->getallArtikel();
$duplicateCount = array_count_values($_SESSION['warenkorb']);
$AID=$db->insertAngebot($_GET['KID']);
$kundenRabatt=$db->getRabatt($user->getKundenstatusID());
$rabatt=1-($kundenRabatt/100);
$angebotPos = new AngebotPosition();
$lieferzeit=0;
echo "<form action='mailto:".$user->getEmail()."' method='post' enctype='text/plain'><table  class='table table-striped'>
    <tr>
        <th>Name</th>
        <th>Anzahl</th>
        <th>Preis</th>
    </tr>
    ";
foreach ($ergebnis as $v) {
    
    if(($key = array_search($v->getArtikelNr(), $_SESSION['warenkorb'])) !== false){
        $angebotPos->setAngebotsNr($AID);
        $angebotPos->setArtikelNr($v->getArtikelNr());
        $angebotPos->setKosten($duplicateCount[$v->getArtikelNr()]*$v->getVerkaufspreis()*$rabatt);
        $angebotPos->setMenge($duplicateCount[$v->getArtikelNr()]);
        $angebotPos->setAngebotsposition($v->getArtikelname());
        $angebotPos->insertAngebotPosition();
        echo"
    <tr>
        <td>".$v->getArtikelname()."</td>
            <input type='text' name='Artikelname' style='display:none' value='".$v->getArtikelname()."'>
        <td>".$duplicateCount[$v->getArtikelNr()]."</td>
            <input type='number' name='Anzahl' style='display:none' value='".$duplicateCount[$v->getArtikelNr()]."'>
        <td>".$duplicateCount[$v->getArtikelNr()]*$v->getVerkaufspreis()*$rabatt." .-€</td>
            <input type='number' name='Preis' style='display:none' value='".$duplicateCount[$v->getArtikelNr()]*$v->getVerkaufspreis()."'>
        </tr>";
        $gesamtPreis=$gesamtPreis+$duplicateCount[$v->getArtikelNr()]*$v->getVerkaufspreis()*$rabatt;
        if($v->getLieferdauerstatus()>$lieferzeit){
            $lieferzeit=$v->getLieferdauerstatus();
        }
    }
}
    
    echo"
    <tr>
        <td colspan='2'>Gesamtpreis</td>
        <td>".$gesamtPreis." .-€</td>
            <input type='number' name='Gesamtpreis' style='display:none' value='".$gesamtPreis."'>
    </tr>";
    echo"
    <tr>
        <td colspan='2'>Lieferzeit</td>
        <td>ca. ".$lieferzeit." Tage</td>
        <td></td>
    </tr>";

echo"</table><input type='submit' value='Angebot per Email senden'></form>";
echo "<script>warenkorbLöschen()</script>";
