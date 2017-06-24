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
$angebotPos = new AngebotPosition();
echo "<table  class='table table-striped'>
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
        $angebotPos->setKosten($duplicateCount[$v->getArtikelNr()]*$v->getVerkaufspreis());
        $angebotPos->setMenge($duplicateCount[$v->getArtikelNr()]);
        $angebotPos->setAngebotsposition($v->getArtikelname());
        $angebotPos->insertAngebotPosition();
        echo"
    <tr>
        <td>".$v->getArtikelname()."</td>
        <td>".$duplicateCount[$v->getArtikelNr()]."</td>
        <td>".$duplicateCount[$v->getArtikelNr()]*$v->getVerkaufspreis()." .-€</td>
        </tr>";
        $gesamtPreis=$gesamtPreis+$duplicateCount[$v->getArtikelNr()]*$v->getVerkaufspreis();
    }
}
    
    echo"
    <tr>
        <td colspan='2'>Gesamtpreis</td>
        <td>".$gesamtPreis." .-€</td>
    </tr>";

echo"</table>";
echo "<script>warenkorbLöschen()</script>";
