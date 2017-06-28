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
<div class='col-md-10 col-md-offset-1'>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-6">

                <div class="row">
                    <div class="col-xs-12"><h3>Rechnung</h3></div></div>
                <div class="row"> <div class="col-xs-12"> <h4>Auftrag <?php echo $auftrag->getBezeichnung() ?> </h4></div></div>


            </div>
            <div class="col-xs-6 text-right">
                <address>
                    <strong>Digital Beauty</strong><br>
                    Beautystrasse 1/10<br>
                    1010 Wien<br>
                    Österreich<br>

                </address>
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
            </div>
            <div class="col-xs-6 text-right">
                <address>
                    <strong>Lieferadresse:</strong><br>
                    <?php echo $user->getVorname() . " " . $user->getNachname() ?><br>
                    <?php echo $user->getStrasse() ?><br>
                    <?php echo $user->getPLZ() ?><br>
                    <?php echo $user->getLand() ?>
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
                    if ($auftrag->getErstelldatum() && $auftrag->getErstelldatum() != "")
                        echo date('d.m.Y', strtotime($auftrag->getErstelldatum()));
                    else {
                        echo date('d.m.Y');
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
                            <?php
                            $totalSum = 0;

                            for ($x = 0; $x < count($auftragsPositionsListe); $x++) {
                                $auftragsPosId = $auftragsPositionsListe[$x]->getAuftragsposition();
                                ?>
                                <tr> 

                                    <td> <?php echo $auftragsPositionsListe[$x]->getAuftragsposition() ?> </td>
                                    <td> <?php echo $auftragsPositionsListe[$x]->getArtikelNr() ?> </td>
                                    <td> <?php echo $auftragsPositionsListe[$x]->getArtikelname() ?> </td>

                                    <td> <?php echo $auftragsPositionsListe[$x]->getMenge() ?> </td>
                                    <td> <?php echo number_format($auftragsPositionsListe[$x]->getKosten(), 2, ',', ' ') ?> €</td>                        
                                    <td class="text-right"> <?php echo number_format(($auftragsPositionsListe[$x]->getMenge() * $auftragsPositionsListe[$x]->getKosten()), 2, ',', ' '); ?> €</td>
                                    <?php $totalSum += ($auftragsPositionsListe[$x]->getMenge() * $auftragsPositionsListe[$x]->getKosten()); ?>


                                </tr>

                            <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td ><strong>Summe:</strong></td>
                                <td class="text-right"> <?php echo number_format($totalSum, 2, ",", ' ') ?> €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>