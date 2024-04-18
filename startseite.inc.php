<?php
if (!isset($_SESSION['einloggen'])) {
?>
<h2>Bitte, loggen Sie sich ein: :</h2><br>
<form name="einloggen" action="index.php" method="post">
<label>Benutzer Name:</label>
<input type="text" name="benutzer_id" size="10" />
<br>
<br>
<label>Passwort</label>
<input type="password" name="passwort" size="10" />
<br>
<br>
<input type="submit" value="Einloggen">
<input type="hidden" name="inhalt" value="uberpruefung">
</form>
<?php
} else 
{
    echo "<h2>Willkommen auf der Seite der wöchentlich aktualisierten stillen Auktionen.</h2>\n";
    echo "<br><br>\n";
    echo"<p>Diese Webseite verfolgt die Informationen der Bieter und der Auktionsartikel.</p>\n";
    echo"<p>Bitte nutzen Sie die Verweise der Navigationsleiste.</p>\n";
    echo"<p>Bitte verwenden Sie NICHT die Navigationsknöpfe des Browsers!</p>\n"; 
    
}
?>
<script language="javascript">
document.einloggen.benutzer_id.focus();
document.einloggen.benutzer_id.select();
</script>