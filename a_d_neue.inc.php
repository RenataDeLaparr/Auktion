<h2>Geben Sie die Daten des neuen Artikels ein. </h2>
<form name="a_d_neue" action="index.php" method="post">

<table cellpadding="1" border="0">
<tr><td>Artikel ID:</td><td><input type="text" name="a_d_id" size="4">
</td></tr>
<tr><td>Benennung:</td><td><input type="text" name="benennung" size="20">
</td></tr>
<tr><td>Beschreibung:</td><td><input type="text" name="beschreibung" size="50">
</td></tr>
<tr><td>Wiederverkaufspreis:</td><td><input type="text" name="wiederverkaufspreis" size="10">
</td></tr>
<tr><td>Gewinneder Bieter:</td><td><input type="text" name="gewinneder_bieter" size="4">
</td></tr>
<tr><td>Gewinnender Preis:</td><td><input type="text" name="gewinnender_preis" size="10">
</td></tr>
</table><br>
<input type="submit" value="Neuer Artikel senden">
<input type="hidden" name="inhalt" value="add_a_d">  
</form>

<script language="javascript">
document.a_d_neue.a_d_id.focus();
document.a_d_neue.a_d_id.select();
</script>