<?php
//Liste anzeigen lassen der versendeten Aufträge samt Auftragsnummer--
//echo"blbla";
echo "<h3>Liste der Aufträge</h3>";
echo "<table class='table table-striped'>";

        echo "<th>Auftragsnummer</th>";
        echo "<th>Auftrag</th>";
        echo "<th>Kundennummer</th>";
        echo "<th>Kommissionierung</th>";
        echo "<th>Bezeichnung</th>";
  
echo "</table>";

//Auftrag erstellen - hole mir die AuftragsListe von Julia
    $Auftrag = Auftrag::getAll();

//wenn ich den Auftrag anklicke, dass er die Auftragspositionen aufmacht

//kommissionierungsnr erstellen, damit es weiter geht ans Lager