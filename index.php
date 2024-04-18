<?php
session_start();
include("alle_bieter.php");
include("artikel_dienstleistung.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Auktion</title>
<link rel="stylesheet" type="text/css" href="auktion_styl.css">
<script language="javascript" type="text/javascript">
function EchtZeitDatenAbfragen() 
{
    var domAnbieterAnzahl = document.getElementById("bieter_nummer");
    var domArtikelAnzahl = document.getElementById("ad_nummer");
    var domArtikelSumme = document.getElementById("ad_summe");
    var domAngebotSumme = document.getElementById("angebotsbetrag ");
    // GET Anfrage senden
    var anfrage = new XMLHttpRequest();
    anfrage.open("GET", "echtzeit.php", true);
    anfrage.onreadystatechange = function() {
        if (anfrage.readyState == 4 && anfrage.status == 200) {
            // az XML-doc analisieren
            var xmldok = anfrage.responseXML;

            var xmlalle_bieter= xmldok.getElementsByTagName("alle_bieter")[0];
            var alle_bieter = xmlalle_bieter.childNodes[0].nodeValue;

            var xmlartikel_dienstleistung= xmldok.getElementsByTagName("artikel_dienstleistung")[0];
            var artikel_dienstleistung = xmlartikel_dienstleistung.childNodes[0].nodeValue;

            var xmlad_summe= xmldok.getElementsByTagName("ad_summe")[0];
            var ad_summe = xmlad_summe.childNodes[0].nodeValue;

            var xmangebotsbetrag = xmldok.getElementsByTagName("angebotsbetrag ")[0];
            var angebotsbetrag  = xmlangebotsbetrag .childNodes[0].nodeValue;

            domAnbieterAnzahl.innerHTML = alle_bieter;
            domArtikelAnzahl.innerHTML = artikel_dienstleistung;
            domArtikelSumme.innerHTML = ad_summe;
            domAngebotSumme.innerHTML = angebotsbetrag ;
        }
    };
    anfrage.send();
}
</script>
</head>
<body>
<header>
<?php include("kopfzeile.inc.php"); ?>
</header>
<section id="box">
<nav> 
<?php include("nav.inc.php"); ?>   
</nav>
<main>
<?php
if (isset($_REQUEST['inhalt'])) {
    include($_REQUEST['inhalt'] . ".inc.php");
} else {
    include("startseite.inc.php");
}
?>
</main>
<aside>
<?php include("seitenleiste.inc.php");?>
</aside>
</section>
<footer>
<?php include ("fusszeile.inc.php"); ?>
</footer>
</body>
</html>
