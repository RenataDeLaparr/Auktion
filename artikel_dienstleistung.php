<?php

class AD
{
    public $a_d_id;
    public $bennenung;
    public $beschreibung;
    public $wiederverkaufspreis;
    public $gewinnender_bieter;
    public $gewinnender_preis;

    public function __construct($a_d_id, $benennung, $beschreibung, $wiederverkaufspreis, $gewinnender_bieter, $gewinnender_preis)
    {
        $this->a_d_id = $a_d_id;
        $this->benennung = $benennung;
        $this->beschreibung = $beschreibung;
        $this->wiederverkaufspreis = $wiederverkaufspreis;
        $this->gewinnender_bieter = $gewinnender_bieter;
        $this->gewinnender_preis = $gewinnender_preis;
    }

    public function __toString()
    {
        $ausgabe = "<h2> Artikel-Dienstleistung: $this->a_d_id </h2>\n" .
                   "<h2> Name: $this->benennung </h2>\n" .
                   "<h2> Beschreibung: $this->beschreibung </h2>\n" .
                   "<h2> Wiederverkaufspreis: $this->wiederverkaufspreis </h2>\n" .
                   "<h2> Gewinnendes Angebot: $this->gewinnender_bieter zu $this->gewinnender_preis €</h2>\n";

        return $ausgabe;
    }

    public function a_d_save()
    {
        $database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql"); 
        $abfrage = "INSERT INTO artikel_dienstleistung VALUES (?, ?, ?, ?, ?, ?)";
        $path = $database->prepare($abfrage);
        $path->bind_param("issdsd", $this->a_d_id, $this->benennung, $this->beschreibung, $this->wiederverkaufspreis, $this->gewinnender_bieter, $this->gewinnender_preis);
        $ergebnis = $path->execute();
        $database->close();
        return $ergebnis;
    }

    public function a_d_refresh()
    {
        $database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql"); 
        $abfrage = "UPDATE artikel_dienstleistung SET benennung = ?, beschreibung = ?, wiederverkaufspreis = ?, gewinnender_bieter = ?, gewinnender_preis = ? WHERE a_d_id = $this->a_d_id";
        $path = $database->prepare($abfrage);
        $path->bind_param("ssdsd", $this->benennung, $this->beschreibung, $this->wiederverkaufspreis, $this->gewinnender_bieter, $this->gewinnender_preis);
        $ergebnis = $path->execute();
        $database->close();
        return $ergebnis;
    }

    public function a_d_delete()
    {
        $database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql"); 
        $abfrage = "DELETE FROM artikel_dienstleistung WHERE a_d_id $this->a_d_id";
        $ergebnis = $databse->query($abfrage);
        $database->close();
        return $ergebnis;
    }

    public static function a_d_Abfrage()
    {
        $database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql"); 
        $abfrage = "SELECT * FROM artikel_dienstleistung";
        $ergebnis = $database->query($abfrage);
        if(mysqli_num_rows($ergebnis) > 0)
        {
            $alle_artikel_dienstleistung = array();

            while($zeile = $ergebnis->fetch_array(MYSQLI_ASSOC))
            {
                $ad = new artikel_dienstleistung ($zeile['a_d_id'], $zeile['benennung'], $zeile['beschreibung'], $zeile['wiederverkaufspreis'], $zeile['gewinnender_bieter'], $zeile['gewinnender_preis']);
                array_push($alle_artikel_dienstleistung, $artikel_dienstleistung);
            }

            $database->close();
            return $alle_artikel_dienstleistung;
        }
        else
        {
            $database->close();
            return NULL;
        }
    }

    public static function a_d_Abfrage_laut_bieter($gewinnender_bieter)
    {
        $database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql"); 
        $abfrage = "SELECT * FROM artikel_dienstleistung WHERE gewinnender_bieter = ?";
        $ergebnis = $path->get_result();
        if(mysqli_num_rows($ergebnis) > 0)
        {
            $alle_artikel_dienstleistung = array();

            while($zeile = $ergebnis->fetch_array(MYSQLI_ASSOC))
            {
                $artikel_dienstleistung = new AD($zeile['a_d_id'], $zeile['benennung'], $zeile['beschreibung'], $zeile['wiederverkaufspreis'], $zeile['gewinnender_bieter'], $zeile['gewinnender_preis']);
                array_push($alle_artikel_dienstleistung, $artikel_dienstleistung);
            }
            $database->close();
            return $alle_artikel_dienstleistung;

        }else
        {
            $database->close();
            return NULL;
        }


    }

    public static function a_d_search($a_d_id)
    {
        $database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql");
        $abfrage = "SELECT * FROM artikel_dienstleistung WHERE a_d_id = $a_d_id ";
        $ergebnis = $database->query($abfrage);
        $zeile = $ergebnis->fetch_array(MYSQLI_ASSOC);
        if ($zeile) {
            $artikel_dienstleistung = new AD($zeile['a_d_id'], $zeile['benennung'], $zeile['beschreibung'],
            $zeile['wiederverkaufspreis'], $zeile['gewinnender_bieter'], $zeile['gewinnender_preis']);
            $database->close();
            return $artikel_dienstleistung;
        } else {
            $database->close();
            return NULL;
        }
    }



	static function ADAnzahlAbrufen() {
		$database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql");
		$abfrage = "SELECT count(a_d_id) FROM artikel_dienstleistung";
		$ergebnis = $database->query($abfrage);
		$zeile = $ergebnis->fetch_array();
		if ($zeile) {
			return $zeile[0];
		} else {
			return NULL;
		}
	}

	static function GesamtsummePreiseAbrufen() {
		$database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql");
		$abfrage = "SELECT sum(wiederverkaufspreis) FROM artikel_dienstleistung";
		$ergebnis = $database->query($abfrage);
		$zeile = $ergebnis->fetch_array();
		if ($zeile) {
			return $zeile[0];
		} else {
			return NULL;
		}
	}

	static function GesamtsummeAngeboteAbrufen() {
		$database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql");
		$abfrage = "SELECT sum( gewinnender_preis) FROM artikel_dienstleistung";
		$ergebnis = $database->query($abfrage);
		$zeile = $ergebnis->fetch_array();
		if ($zeile) {
			return $zeile[0];
		} else {
			return NULL;
		}
	}




}

?>
