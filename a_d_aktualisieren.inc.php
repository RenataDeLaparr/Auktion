<?php
if (!isset($_POST['a_d_id']) OR (!is_numeric($_POST['a_d_id']))) {
    echo "<h2>Du hast keine gültige Artikelkennung ausgewählt.</h2>\n";
    echo "<a href=\"index.php?inhalt=bieter_liste\">Bieter auflisten</a>\n";
} else {
    $a_d_id = $_POST['a_d_id'];
    $ein_a_d = AD::a_d_search($a_d_id); 7// a tetel az lehet hogy itt is el van irva, vagy mast kellene
    if ($ein_a_d) {
        echo "<h2>$ein_a_d->a_d_id aktualisieren </h2>\n";
        echo "<form name=\"artikel_dienstleistung\" action=\"index.php\" method=\"post\">\n";
        echo "<table>\n";
        echo "<tr><td>Artikel ID </td><td>$ein_a_d->a_d_id</td></tr>\n";
        echo "<tr><td>Benennung</td><td><input type=\"text\" name=\"bennenung\" " .
             "value=\"$ein_a_d->bennenung\"></td></tr>\n";
        echo "<tr><td>Beschreibung</td><td><input type=\"text\" " .
             "name=\"beschreibung\" value=\"$ein_a_dbeschreibung\"></td></tr>\n";
        echo "<tr><td>Wiederverkaufspreis</td><td><input type=\"text\" " .
             "name=\"wiederverkaufspreis\" value=\"$ein_a_d->wiederverkaufspreis\"></td></tr>\n";
        echo "<tr><td>Gewinneder Bieter</td><td><input type=\"text\" " .
             "name=\"gewinneder_bieter\" value=\"$ein_a_d->gewinneder_bieter\"></td></tr>\n";
        echo "<tr><td>Gewinnender Preis</td><td><input type=\"text\" " .
             "name=\"gewinnender_preis\" value=\"$ein_a_d->gewinnender_preis\"></td></tr>\n";
        echo "</table><br><br>\n";
        echo "<input type=\"submit\" name=\"antwort\" " .
             "value=\"artikel, Dienstleistung aktualisieren.\">\n";
        echo "<input type=\"submit\" name=\"anwort\" value=\"Mégse\"></td></tr>\n";
        echo "<input type=\"hidden\" name=\"a_d_id\" value=\"$a_d_id\">\n";
        echo "<input type=\"hidden\" name=\"inhalt\" value=\"a_d_aendern\">\n";
        echo "</form>\n";
    } else {
        echo "<h2>Leider konnte das $a_d_id und dem Namen $ein_a_d nicht gefunden werden."</h2>\n";
        echo "<a href=\"index.php?inhalt=bieter_liste\">Bieter auflisten</a>\n";
    }
}
?>
<script language="javascript">
document.artikel_dienstleistung.gewinneder_bieter.focus();
document.artikel_dienstleistung.gewinneder_bieter.select();
</script>