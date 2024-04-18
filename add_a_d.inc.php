<?php
if (isset($_SESSION['einloggen'])) {
    $a_d_id = $_POST['a_d_id'];
    if ((trim($a_d_id) == '') OR (!is_numeric($a_d_id)))
    {
        echo "<h2>Entschuldigung, Sie müssen eine gültige Artikelnummer angeben.</h2>\n";
    } else
    {
        $benennung = $_POST['benennung'];
        $beschreibung = $_POST['beschreibung'];
        $wiederverkaufspreis = $_POST['wiederverkaufspreis'];
        $gewinneder_bieter = $_POST['gewinneder_bieter'];
        $gewinnender_preis = $_POST['gewinnender_preis'];

        $ein_a_d = new AD($a_d_id, $benennung, $beschreibung, $wiederverkaufspreis,
                    $gewinneder_bieter, $gewinnender_preis);
        $ergebnis = $ein_a_d->a_d_save();
        if ($ergebnis)
            echo "<h2>Die Hinzufügung des neuen Artikels mit der ID $a_d_id war erfolgreich.</h2>\n";
        else
            echo "<h2>Leider ist ein Fehler beim Hinzufügen des Artikels aufgetreten.</h2>\n";
    }
} else {
    echo "<h2>Bitte zuerst einloggen</h2>\n";
}
?>