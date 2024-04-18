<?php

if (!isset($_REQUEST['ein_bieter_id']) OR (!is_numeric($_REQUEST['ein_bieter_id'])))
{
    echo "<h2>Du hast keine gültige Bieterkennung für die Anzeige ausgewählt.</h2>\n";
    echo "<a href=\"index.php?tartalom=bieter_liste\">Auflistung der Bieter.</a>\n";
} else
{
    $ein_bieter_id= $_REQUEST['ein_bieter_id'];
    $alle_bieter= Bieter::bieter_suchen($ein_bieter_id);
    if ($ein_bieter) {
        echo $ein_bieter;
        echo "<br><br>\n";
        // auflisten 
        $artikel_dienstleistung = AD::a_d_Abfrage_laut_bieter($ein_bieter_id);
        if ($artikel_dienstleistung) {
            echo "<b>Gewonnene Artikel:</b><br>\n";
            echo "<table>\n";
            echo "<tr><td><b>Artikel oder Dienstleistung</b></td><td><b>Benennung</b></td>" .
            "<td><b>Beschreibung</b></td><td><b>Summe</b></td></tr>\n";
            $ad_summe = 0;
            foreach($artikel_dienstleistung as $ein_ad) {
                printf("<tr><td>%s</td>", $ein_ad->a_d_id);
                printf("<td>%s</td>", $ein_ad->benennung);
                printf("<td>%s</td>", $ein_ad->beschreibung);
                printf("<td>%.0f</td></tr>\n", $ein_ad->gewinnender_preis);
                $ad_summe = $ad_summe + $ein_ad->gewinnender_preis;
            }
            echo "<tr><td></td><td></td><td><b>Summe</b></td>";
            printf("<td><b>%.0f</b></td></tr>\n", $ad_summe);
            echo "</table>\n";
            } else {
            echo "<h2>Derzeit gibt es keine gewonnenen Artikel.</h2>\n";
        }
    } else {
        echo "<h2>Leider konnte der Bieter mit der Kennung $ein_bieter_id nicht gefunden werden.</h2>\n";
    }
}
?>