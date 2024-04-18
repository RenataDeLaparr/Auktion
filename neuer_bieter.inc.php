<h2>Geben Sie die Daten des neuen Bieters ein.</h2>
<form name="neuer_bieter" action="index.php" method="post">

<table cellpadding="1" border="0">
<tr><td>Bieter-ID</td><td><input type="text" name="ein_bieter_id" size="4">
</td></tr>
<tr><td>Vorname:</td><td><input type="text" name="vorname" size="20">
</td></tr>
<tr><td>Nachname:</td><td><input type="text" name="nachname" size="50">
</td></tr>
<tr><td>Adresse:</td><td><input type="text" name="adresse" size="75">
</td></tr>
<tr><td>Telefon:</td><td><input type="text" name="telefon" size="12">
</td></tr>
</table><br>
<input type="submit" value="Neuer Bieter senden">
<input type="hidden" name="inhalt" value="bieter_addieren">
</form>

<script language="javascript">
document.neuer_bieter.ein_bieter_id.focus();
document.neuer_bieter.ein_bieter_id.select();
</script>