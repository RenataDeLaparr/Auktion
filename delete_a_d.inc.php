<?php
if (isset($_SESSION['einloggen'])) {
    $a_d_id = $_POST['a_d_id'];
    $ein_a_d = AD::a_d_search($a_d_id);
    $ergebnis = $ein_a_d->a_d_delete();

    if ($ergebnis)
        echo "<h2>Der Artikel mit der ID $a_d_id wurde entfernt.</h2>\n";
    else
        echo "<h2>Leider ist ein Fehler beim Entfernen des Artikels mit der ID $a_d_id aufgetreten.</h2>\n";
} else {
    echo "<h2>Bitte zuerst einloggen!</h2>\n";
}
?>