<?php
// Diese Datei überprüft das 'Einloggen' benannte Session-Cookie und bestimmt,
// ob der Besucher der Webseite eingeloggt ist oder nicht. Falls nicht,
// werden die Navigationspunkte angezeigt.
?>

<table width="100%" cellpadding="3">
<tr>
<?php
    if (!isset($_SESSION['einloggen']))
        echo "<td></td>\n";
    else {
        echo "<td><h3>Wilkommen {$_SESSION['einloggen']}</h3></td>\n";
 ?>
</tr>

<tr>
    <td>
        <a href="index.php">
            <strong>Startseite</strong>
        </a>
    </td>
</tr>

<tr>
    <td><strong>Bieter:</strong></td> <!-- a <strong> lezárása elrontottam -->
</tr>

<tr>
    <td>
        &nbsp;&nbsp;&nbsp;
        <a href="index.php?inhalt=bieter_liste">
            <strong>Auflistung der Bieter</strong>
        </a>
    </td>
</tr>

<tr>
    <td>
        &nbsp;&nbsp;&nbsp;
        <a href="index.php?inhalt=neuer_bieter">
            <strong>Hinzufügen eines neuen Bieters</strong>
        </a>
    </td>
</tr>

<tr>
    <td><strong>Artikel und Dienstleistungen:</strong></td>
</tr>

<tr>
    <td>
        &nbsp;&nbsp;&nbsp;
        <a href="index.php?inhalt=a_d_liste">
            <strong>Auflistung der Artikel</strong>
        </a>
    </td>
</tr>

<tr>
    <td>
        &nbsp;&nbsp;&nbsp;
        <a href="index.php?inhalt=a_d_neue">
            <strong>neue Artikel und Dienstleistungen</strong>
        </a>
    </td>
</tr>

<tr><td><hr/></td></tr>

<tr>
    <td>
        &nbsp;&nbsp;&nbsp;
        <a href="index.php?inhalt=ausloggen">
            <strong>Ausloggen</strong>
        </a>
    </td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
    <td>
        <form action="index.php" method="post"> <!--  form tag-ot elirtam -->
            <label>Artikel und Dienstleistungen suchen: </label>
            <br>
            <input type="text" name="a_d_id" size="14"/>
            <input type="submit" value="suchen"/>
            <input type="hidden" name="inhalt" value="a_d_refresh"/>
        </form>
    </td>
</tr>

<tr>
    <td>
        <form action="index.php" method="post"> <!-- itt is  -->
            <label>Suche nach einem Bieter: </label>
            <br>
            <input type="text" name="ein_bieter_id" size="14"/>
            <input type="submit" value="suchen"/>
            <input type="hidden" name="inhalt" value="bieter_anzeigen"/>
        </form>
    </td>
</tr>



<?php
}
?>

</table>
