<?php
if (isset($_SESSION['einloggen'])) {
    $ein_bieter_id = $_POST['ein_bieter_id'];
    $antwort = $_POST['antwort'];

    if ($válasz == "Aktualisierung des Bieters") {
        $alle_bieter = Bieter::bieter_suchen($ein_bieter_id);
        $alle_bieter->ein_bieter_id = $_POST['ein_bieter_id'];
        $alle_bieter->nachname = $_POST['nachname'];
        $alle_bieter->vorname = $_POST['vorname'];
        $alle_bieter->adresse = $_POST['adrsse'];
        $alle_bieter->telefon = $_POST['telefon'];
        $ergebnis = $alle_bieter->bieter_refresh();
        if ($ergebnis) {
            echo "<h2>Der Bieter mit der ID $ein_bieter_id wurde aktualisiert.</h2>\n";
        } else {
            echo "<h2>Beim Aktualisieren des Bieters mit der ID $ein_bieter_id ist ein Fehler aufgetreten.</h2>\n";
        }
    } else {
        echo "<h2>Die Aktualisierung des Bieters mit der ID $ein_bieter_id wurde abgebrochen.</h2>\n";
    }
} else {
    echo "<h2>Bitte zuerst einloggen</h2>\n";
}
?>