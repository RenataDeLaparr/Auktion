<?php

echo "<script language=\"javascript\">\n";
echo "function listbox_dblclick() {\n";
echo "document.artikel_dienstleistung.a_d_refresh.click() }\n";
echo "</script>\n";

echo "<script language=\"javascript\">\n";
echo "function button_click(zielpunkt) {\n";
echo "if(zielpunkt==0) " .
      "document.artikel_dienstleistung.action=\"index.php?inhalt=a_d_delete\"\n";
echo "if(zielpunkt==1) " .
      "document.artikel_dienstleistung.action=\"index.php?inhalt=a_d_refresh\"\n";
echo "}\n";
echo "</script>\n";

echo "<h2>Artikel oder Dienstleistung auswählen</h2>\n";
echo "<form name=\"artikel_dienstleistung\" method=\"post\">\n";
echo "<select ondblclick=\"listbox_dblclick()\" " .
      "name=\"a_d_id\" size=\"20\">\n";

$artikel_dienstleistung= Tétel::tételekLekérése();
foreach($artikel_dienstleistung as $ein_a_d) { //nem biztos hogy az ein_ad az jo
    $a_d_id = $ein_a_d->a_d_id; // -> utan lehet, hogy specko nev kell 
    $benennung = $ein_a_d->benennung;
    $moeglichkeit = $a_d_id . " - " . $benennung;
    echo "<option value=\"$a_d_id\">$moeglichkeit</option>\n";
}
echo "</select><br><br>\n";

echo "<input type=\"submit\" onClick=\"button_click(0)\" " .
     "name=\"a_d_delete\" value=\"Artikel, Dienstleistung löschen.\">\n";
echo "<input type=\"submit\" onClick=\"button_click(1)\" " .
     "name=\"a_d_refresh\" value=\"Artikel, Dienstleistung aktualisieren.\">\n";
echo "</form>\n";
?>