<?php
if (isset($_SESSION['einloggen'])) {
    $ein_bieter_id = $_POST['ein_bieter_id'];
    $alle_bieter = Bieter::bieter_delete($ein_bieter_id);
    $ergebnis = $alle_bieter->bieter_delete();
    if ($ergebnis)
       echo "<h2> Bieter :  $ein_bieter_id ist gelöscht. </h2>\n";
    else
       echo "<h2>Leider ist ein Fehler beim Entfernen des Bieters $ein_bieter_id aufgetreten.</h2>\n";
} else {
    echo "<h2>Bitte zuerst einloggen</h2>\n";
}
?>