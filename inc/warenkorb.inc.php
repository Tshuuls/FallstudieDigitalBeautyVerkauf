
        <?php
        session_start();
        //Produkt zum Warenkorb hinzufügen
        if(isset($_POST['operation']) && $_POST['operation'] == 'add')
        {
            array_push($_SESSION['warenkorb'], $_POST['PID']);
            echo "<script>updateWarenkorbCount(".count($_SESSION['warenkorb']).")</script>";
        }
        //Produkt löschen; entweder nut entfernen oder Warenkorb leeren, wenn letztes Produkt gelöscht werden soll
        elseif(isset($_POST['operation']) &&$_POST['operation'] == 'löschen')
        {
            $key = array_search($_POST['PID'], $_SESSION['warenkorb']);
           if($key != false) {
              // if(count($_SESSION['warenkorb']==1)){
              //     $_SESSION['warenkorb']=array();
              // }else{
                    unset($_SESSION['warenkorb'][$key]);
                    
              // }
            }
            echo "<script>updateWarenkorbCount(".count($_SESSION['warenkorb']).")</script>";
        }
        //Ganzen Warenkorb löschen
        elseif(isset($_POST['operation']) &&$_POST['operation'] == 'alleslöschen')
        {
           $_SESSION['warenkorb']=array();
           echo "<script>updateWarenkorbCount(".count($_SESSION['warenkorb']).")</script>";
           
        }
        
        //Function zum händling einer Anzahl änderung
        elseif(isset($_POST['operation']) &&$_POST['operation'] == 'change')
        {
            
            $duplicateCount = array_count_values($_SESSION['warenkorb']);
            if(count($duplicateCount)>0){
                $ProdCount=$duplicateCount[$_POST['produkt']];
                //Anzahl wurde erhöht
               if ($_POST['change']>$ProdCount){
                   array_push($_SESSION['warenkorb'], $_POST['produkt']);
                //echo "<script>updateWarenkorbCount(".count($_SESSION['warenkorb']).")</script>";

               }else{//anzahl wurde erniedrigt
                   if(($key = array_search($_POST['produkt'], $_SESSION['warenkorb'])) !== false) {
                    unset($_SESSION['warenkorb'][$key]);
                   }
                }
                
                echo "<script>updateWarenkorbCount(".count($_SESSION['warenkorb']).")</script>";
                $duplicateCount = array_count_values($_SESSION['warenkorb']);
                if(count($duplicateCount)>0 && $key = array_search($_POST['produkt'], $_SESSION['warenkorb']) !== false){
                    $ProdCount=$duplicateCount[$_POST['produkt']];
                    
                    echo "<script>updateProduktPreis(".$_POST['produkt'].",".$_POST['preis'].",".$ProdCount.",".$_POST['change'].")</script>";
                }else{
                    
                    echo "<script>updateProduktPreis(".$_POST['produkt'].",".$_POST['preis'].",0)</script>";
                }
                 
                  
                
               }
            
            else{
                
            }
        }
        ?>




<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../model/Database.class.php';
include '../model/Artikel.class.php';
include '../model/Customer.class.php';
$db = new Database();
$gesamtPreis=0;
$ergebnis = $db->getallArtikel();
$duplicateCount = array_count_values($_SESSION['warenkorb']);
$user = $db->getCustomer($_SESSION['KID']);
$kundenRabatt=$db->getRabatt($user->getKundenstatusID());
$rabatt=1-($kundenRabatt/100);
echo "<table  class='table table-striped'>
    <tr>
        <th>Name</th>
        <th>Anzahl</th>
        <th>Preis</th>
        <th>Aktion</th>
    </tr>
    ";
foreach ($ergebnis as $v) {
    
    if(($key = array_search($v->getArtikelNr(), $_SESSION['warenkorb'])) !== false){
        echo"
    <tr>
        <td>".$v->getArtikelname()."</td>
        <td>".$duplicateCount[$v->getArtikelNr()]."</td>
        <td>".$duplicateCount[$v->getArtikelNr()]*$v->getVerkaufspreis()*$rabatt." €</td>
        <td><span class='fa fa-plus' aria-hidden='true' onclick='addProduktToCart(".$v->getArtikelNr().")'></span><span onclick='takeProduktFromCart(".$v->getArtikelNr().")' class='fa fa-minus' style='margin-left:10px' aria-hidden='true'></span></td>
    </tr>";
        $gesamtPreis=$gesamtPreis+$duplicateCount[$v->getArtikelNr()]*$v->getVerkaufspreis()*$rabatt;
    }
}
    
    echo"
    <tr>
        <td colspan='2'>Gesamtpreis</td>
        <td>".$gesamtPreis." €</td>
        <td></td>
    </tr>";

echo"</table>";


