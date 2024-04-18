<?php
$ein_bieter_id = $_POST['ein_bieter_id'];
$alle_bieter= Bieter::bieter_refresh($ein_bieter_id);
if ($alle_bieter) {
    echo "Aktualisierung des Bieters mit der ID $ein_bieter_id</h2>\n";
    echo "<form name=\"alle_bieter\" action=\"index.php\" method=\"post\">\n";
    echo "<table>\n";
    echo "<tr><td>Bieter-ID</td><td>$alle_bieter->ein_bieter_id</td></tr>\n";
    echo "<tr><td>Nachname</td><td><input type=\"text\" name=\"nachname\" " .
        "value=\"$alle_bieter->nachname\"></td></tr>\n";
    echo "<tr><td>Vorname</td><td><input type=\"text\" " .
          "name=\"vorname\" value=\"$alle_bieter->vorname\"></td></tr>\n";
    echo "<tr><td>Cím</td><td><input type=\"text\" " .
          "name=\"adresse\" value=\"$alle_bieter->adresse\"></td></tr>\n";
    echo "<tr><td>Telefon</td><td><input type=\"text\" " .
          "name=\"telefon\" value=\"$alle_bieter->telefon\"></td></tr>\n";
    echo "</table><br><br>\n";
    echo "<input type=\"submit\" name=\"antwort\" value=\"Aktualisierung des Bieters.\"></td></tr>\n";
    echo "<input type=\"submit\" name=\"antwort\" value=\"Abbrechen\"></td></tr>\n";
    echo "<input type=\"hidden\" name=\"ein_bieter_id\" value=\"$ein_bieter_id\"></td></tr>\n";
    echo "<input type=\"hidden\" name=\"inhalt\" value=\"bieteraenderung\">\n";
    echo "</form>\n";
} else {
    echo "<h2>Leider kann der Bieter mit der ID: $ein_bieter_id, nicht gefunden werden.</h2>\n";
}
?>
<script language="javascript">
document.alle_bieter.nachname.focus();
document.alle_bieter.nachname.select();
</script>