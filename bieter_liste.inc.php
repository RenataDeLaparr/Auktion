<?php

echo "<script language=\"javascript\">\n";
echo "function listbox_dblclick() {\n";
echo "document.alle_bieter.show_alle_bieter.click() }\n";
echo "</script>\n";

echo "<script language=\"javascript\">\n";
echo "function button_click(zielpunkt) {\n";
echo "if(zielpunkt==0) alle_bieter.action=\"index.php?inhalt=show_alle_bieter\"\n";
echo "if(zielpunkt==1) alle_bieter.action=\"index.php?inhalt=show_alle_bieter\"\n";
echo "if(zielpunkt==2) alle_bieter.action=\"index.php?inhalt=show_alle_bieter\"\n";
echo "}\n";
echo "</script>\n";

echo "<h2>Auswahl des Bieters</h2>\n";
echo "<form name=\"alle_bieter\" method=\"post\">\n";
echo "<select ondblclick=\"listbox_dblclick()\" name=\"ein_bieter_id\" size=\"20\">\n";

$alle_bieter = Bieter::alle_bieter_Abfrage(); 
foreach($alle_bieter as $ein_bieter) {
    $ein_bieter_id = $ein_bieter->ein_bieter_id; 
    $name = $ein_bieter_id . " - " . $ein_bieter->nachname . ", " . $ein_bieter->vorname; 
    echo "<option value=\"$ein_bieter_id\">$name</option>\n";
}
echo "</select><br><br>\n";

echo "<input type=\"submit\" onClick=\"button_click(0)\" " .
      "name=\"bieter_show\" value=\"Bieter anzeigen\">\n"; 

echo "<input type=\"submit\" onClick=\"button_click(1)\" " .
      "name=\"bieter_delete\" value=\"Bieter löschen\">\n"; 

echo "<input type=\"submit\" onClick=\"button_click(2)\" " .
     "name=\"bieter_refresh\" value=\"Bieter aktualisieren\">\n"; 
     
echo "</form>\n";
?>
