<?php
include("alle_bieter.php");
include("artikel_dienstleistung.php");

$alle_bieter = Bieter::AnbieterAnzahlAbrufen();
$artikel_dienstleistung = AD::ADAnzahlAbrufen();
$ad_summe = AD::GesamtsummePreiseAbrufen();
$angebotsbetrag = AD::GesamtsummeAngeboteAbrufen();

$dok = new DOMDocument("1.0");
$auktion = $dok->createElement("auktion");
$auktion = $dok->appendChild($auktion);

$alle_bieter = $dok->createElement("alle_bieter", $alle_bieter);
$alle_bieter = $auktion->appendChild($alle_bieter);

$artikel_dienstleistung = $dok->createElement("artikel_dienstleistung", $artikel_dienstleistung);
$artikel_dienstleistung = $auktion->appendChild($artikel_dienstleistung);
$ad_summe = $dok->createElement("ad_summe", $ad_summe);
$ad_summe = $auktion->appendChild($ad_summe);
$angebotsbetrag = $dok->createElement("Angebotsbetrag", $Angebotsbetrag);
$angebotsbetrag = $auktion->appendChild($Angebotsbetrag);
$ausgabe = $dok->saveXML();

header("Content-type: application/xml");
echo $ausgabe;
?>