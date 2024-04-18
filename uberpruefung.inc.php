<?php
$benutzer_id= $_POST['benutzer_id'];
$passwort= $_POST['passwort'];
$abfrage ="SELECT benutzer_name FROM benutzer WHERE benutzer_id = ? AND passwort = SHA2(?,256)";
$database= new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql");
$path = $database->prepare($abfrage);
$path->bind_param("ss", $benutzer_id, $passwort);
$path->execute();
$path->bind_result($benutzer_name);
$path->fetch();
if (isset($benutzer_name)) {
    echo "<h2>Das Team der Online- und Stillen Auktion begrüßt Sie.</h2>\n";
    $_SESSION['einloggen'] = $benutzer_name;
    header("Location: index.php");
} else {
    echo "<h2>Die Anmeldedaten sind leider falsch</h2>\n";
    echo "<a href=\"index.php\">Bitte versuchen Sie es erneut</a>\n";
}
?>