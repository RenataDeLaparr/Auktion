<?php
if (isset($_SESSION['einloggen'])) {
    $ein_bieter_id = $_POST['ein_bieter_id'];
    if ((trim($ein_bieter_id) == '') OR (!is_numeric($ein_bieter_id)))
    {
        echo "<h2>Entschuldigung, Sie müssen eine gültige Bieterkennung angeben.d</h2>\n";
    } else
    {
        $vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $adresse = $_POST['adresse'];
        $telefon = $_POST['telefon'];

        $alle_bieter = new Bieter($ein_bieter_id,$vorname,$nachname,$adresse,$telefon);
        $ergebnis = $alle_bieter->saveBieter();
        if ($ergebnis)
            echo "<h2>Die Hinzufügung des neuen Bieters mit der ID $ein_bieter_id war erfolgreich.</h2>\n";
        else
            echo "<h2>Leider ist ein Fehler beim Hinzufügen des Bieters aufgetreten.</h2>\n";
    }
} else {
    echo "<h2>Bitte zuerst einloggen</h2>\n";
}
?>