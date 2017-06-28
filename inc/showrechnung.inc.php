<?php

if (isset($_GET['OID']) && isset($_GET['KID']) ) {
    $anr = $_GET['OID'];
    $kun = $_GET['KID'];
}
$db = new Database();
$user = new Customer();
$user=$db->getCustomer($kun);
$auftrag = new Auftrag();
$auftrag= $db->selectOneAuftrag($anr);
$auftragsPositionsListe= $db->getOrderPosition($anr);
?>
<form action="mailto:<?php echo $user->getEmail() ?>" method="post" enctype="text/plain">
<div class='col-md-10 col-md-offset-1'>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-6">

                <div class="row">
                    <div class="col-xs-12"><h3>Rechnung</h3></div></div>
                <div class="row"> <div class="col-xs-12"> <h4>Auftrag <?php echo $auftrag->getBezeichnung() ?> </h4></div></div>
                <input type="text" style="display: none" name="Auftrag" value="<?php echo $auftrag->getBezeichnung() ?>">

            </div>
            <div class="col-xs-6 text-right">
                <address>
                    <strong>Digital Beauty</strong><br>
                    Beautystrasse 1/10<br>
                    1010 Wien<br>
                    Österreich<br>

                </address>
                <input type="text" style="display: none" name="Adresse" value="Digital Beauty;Beautystrasse 1/10;1010 Wien;Österreich">

            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <address>
                    <strong>Rechnungsadresse:</strong><br>
                    <?php echo $user->getVorname() . " " . $user->getNachname() ?><br>
                    <?php echo $user->getStrasse() ?><br>
                    <?php echo $user->getPLZ() ?><br>
                    <?php echo $user->getLand() ?>
                </address>
                <input type="text" style="display: none" name="Rechnungsadresse" value="
                    <?php echo $user->getVorname() . " " . $user->getNachname() ?>;<?php echo $user->getStrasse() ?>;<?php echo $user->getPLZ() ?>;<?php echo $user->getLand() ?>">
            </div>
            <div class="col-xs-6 text-right">
                <address>
                    <strong>Lieferadresse:</strong><br>
                    <?php echo $user->getVorname() . " " . $user->getNachname() ?><br>
                    <?php echo $user->getStrasse() ?><br>
                    <?php echo $user->getPLZ() ?><br>
                    <?php echo $user->getLand() ?>
                <input type="text" style="display: none" name="Lieferadresse" value="<?php echo $user->getVorname() . " " . $user->getNachname() ?>;<?php echo $user->getStrasse() ?>;<?php echo $user->getPLZ() ?>;<?php echo $user->getLand() ?>">
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">

            </div>
            <div class="col-xs-6 text-right">
                <address>
                    <strong>Bestelldatum:</strong><br>
                    <?php
                    if ($auftrag->getErstelldatum() && $auftrag->getErstelldatum() != ""){
                        echo date('d.m.Y', strtotime($auftrag->getErstelldatum()));
                        echo' <input type="text" style="display: none" name="Bestelldatum" value="';
                        echo date('d.m.Y', strtotime($auftrag->getErstelldatum()));
                        echo'">';
                    }else {
                        echo date('d.m.Y');
                        echo' <input type="text" style="display: none" name="Bestelldatum" value="';
                        echo date('d.m.Y');
                        echo'">';
                    }
                    ?><br><br>
                </address>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Bestellung </strong></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Position</strong></td>
                                <td class="text-center"><strong>Artikel Nr.</strong></td>
                                <td class="text-center"><strong>Artikel Name</strong></td>
                                <td class="text-center"><strong>Menge</strong></td>
                                <td class="text-center"><strong>Kosten</strong></td>
                                <td class="text-right"><strong>Total</strong></td>
                            </tr>
                            <tr>       
                        </thead>
                        <tbody>
                            
                <input type="text" style="display: none" name="=====" value="=======">
                            <?php
                            $totalSum = 0;

                            for ($x = 0; $x < count($auftragsPositionsListe); $x++) {
                                $auftragsPosId = $auftragsPositionsListe[$x]->getAuftragsposition();
                                ?>
                                <tr> 

                                    <td> <?php echo $auftragsPositionsListe[$x]->getAuftragsposition() ?> </td>
                <input type="text" style="display: none" name="Position" value="<?php echo $auftragsPositionsListe[$x]->getAuftragsposition() ?>">
                                    <td> <?php echo $auftragsPositionsListe[$x]->getArtikelNr() ?> </td>
                <input type="text" style="display: none" name="Artikel Nr." value="<?php echo $auftragsPositionsListe[$x]->getArtikelNr() ?>">
                                    <td> <?php echo $auftragsPositionsListe[$x]->getArtikelname() ?> </td>
                <input type="text" style="display: none" name="Artikel Name" value="<?php echo $auftragsPositionsListe[$x]->getArtikelname() ?>">

                                    <td> <?php echo $auftragsPositionsListe[$x]->getMenge() ?> </td>
                <input type="text" style="display: none" name="Menge" value="<?php echo $auftragsPositionsListe[$x]->getMenge() ?>">
                                    <td> <?php echo number_format($auftragsPositionsListe[$x]->getKosten(), 2, ',', ' ') ?> €</td>  
                <input type="text" style="display: none" name="Kosten" value="<?php echo number_format($auftragsPositionsListe[$x]->getKosten(), 2, ',', ' ')?>">                      
                                    <td class="text-right"> <?php echo number_format(($auftragsPositionsListe[$x]->getMenge() * $auftragsPositionsListe[$x]->getKosten()), 2, ',', ' '); ?> €</td>
                <input type="text" style="display: none" name="Total" value="<?php echo number_format(($auftragsPositionsListe[$x]->getMenge() * $auftragsPositionsListe[$x]->getKosten()), 2, ',', ' ');  ?>">
                                    <?php $totalSum += ($auftragsPositionsListe[$x]->getMenge() * $auftragsPositionsListe[$x]->getKosten()); ?>
                <input type="text" style="display: none" name="=====" value="=======">


                                </tr>

                            <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td ><strong>Summe:</strong></td>
                                <td class="text-right"> <?php echo number_format($totalSum, 2, ",", ' ') ?> €</td>
                <input type="text" style="display: none" name="Summe" value="<?php echo number_format($totalSum, 2, ",", ' ')?>">
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
   <input type="submit" value="Rechnung senden">
    </form>