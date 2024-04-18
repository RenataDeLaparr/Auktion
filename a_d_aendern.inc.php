<?php
if (isset($_SESSION['einloggen'])) {
    $a_d_id = $_POST['a_d_id'];
    $antwort = $_POST['antwort'];

    if ($antwort == "Artikel aktualisieren") {
        $ein_a_d = AD::a_d_search($a_d_id);
        $ein_a_d->a_d_id= $_POST['a_d_id']; // hmhmhmh  a_d_id
        $ein_a_d->bennenung = $_POST['bennenung'];
        $ein_a_d->beschreibung = $_POST['beschreibung'];
        $ein_a_d->wiederverkaufspreis = $_POST['wiederverkaufspreis'];
        $ein_a_d->gewinneder_bieter = $_POST['gewinneder_bieter'];
        $ein_a_d->gewinnender_preis = $_POST['gewinnender_preis'];
        $ergebnis = $ein_a_d->a_d_refresh();
        if ($ergebnis) {
            echo "<h2> $a_d_id $ein_a_d wurde aktualisiert.</h2>\n";
        } else {
            echo "<h2>Es gab einen Fehler beim Aktualisieren des Elements mit der ID $a_d_id und dem Namen $ein_a_d.</h2>\n";
        }
    } else {
        echo "<h2>Das Aktualisieren  $a_d_id $ein_a_d wurde abgebrochen.</h2>\n";
    }
} else {
    echo "<h2>Bitte zuerst einloggen.</h2>\n";
}
?>