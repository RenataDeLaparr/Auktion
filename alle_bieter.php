<?php

class Bieter
{
    
    public $ein_bieter_id;
    public $vorname;
    public $nachname;
    public $adresse;
    public $telefon;

    public function __construct( $ein_bieter_id, $vorname, $nachname, $adresse, $telefon)
    {
        $this-> ein_bieter_id = $ein_bieter_id;
        $this-> vorname = $vorname;
        $this-> nachname = $nachname;
        $this-> adresse = $adresse;
        $this-> telefon = $telefon;

    }

    public function __toString() 
    {
        $ausgabe = "<h2> Bieternummer: $this -> ein_bieter_id </h2>\n" .
                   "<h2> $this-> vorname, $this -> nachname</h2> \n" .
                   "<h2>  $this-> adresse </h2> \n" .
                   "<h2> $this-> telefon </h2> \n" ;

        return $ausgabe;

    }

    public function saveBieter()
    {
        $database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql");  
        $abfrage = "INSERT INTO alle_bieter VALUES (?, ?, ?, ?, ?)";
        $path = $database -> prepare ($abfrage);
        $path -> bind_param ("issss", $this->ein_bieter_id, $this->vorname, $this->nachname, $this->adresse, $this->telefon );

        $ergebnis = $path->execute();
        $database->close();
            return $ergebnis;

    }

    public function bieter_refresh() 
    {
        $database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql"); 
        $abfrage = "UPDATE alle_bieter SET ein_bieter_id = ?, vorname = ?," . " nachname = ?, adresse = ?, telefon = ?" . "WHERE ein_bieter_id = $this-> ein_bieter_id ";
        $path = $database -> prepare ($abfrage);
        $path = bind_param ("issss", $this->ein_bieter_id, $this->vorname, $this->nachname, $this->adresse, $this->telefon );
        

        $ergebnis = $path->execute();
        $database->close();
            return $ergebnis;

    }

    public function bieter_delete()
    {
        $database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql");       
        $ein_bieter_id = $database->real_escape_string($this->ein_bieter_id);
        $abfrage = "DELETE FROM alle_bieter WHERE ein_bieter_id = '$ein_bieter_id'";
        $ergebnis = $database->query($abfrage);
    
        $database->close();
        return $ergebnis;
    }
    

    public static function alle_bieter_Abfrage()
    {
        $database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql"); 
        $abfrage = "SELECT * FROM alle_bieter";
        $ergebnis = $database->query($abfrage); 
            if(mysqli_num_rows($ergebnis) > 0)
            {
                $alle_bieter = array();

                while($zeile = $ergebnis->fetch_array(MYSQLI_ASSOC)) // 'MYSQL_ASSOC' VS 'MYSQLI_ASSOC'.
                {
                    $ein_bieter = new Bieter ($zeile['ein_bieter_id'], $zeile['vorname'], $zeile['nachname'], $zeile['adresse'], $zeile['telefon']);
                    array_push($alle_bieter, $ein_bieter); 
                }
                $database->close();
                return $alle_bieter; 
            } else 
            {
                $database->close();
                return NULL;
            }
    }

    
    public static function bieter_suchen($ein_bieter_id) {
        $database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql");
        $abfrage = "SELECT * FROM bieter WHERE ein_bieter_id = $ein_bieter_id";
        $ergebnis = $database->query($abfrage);
        $zeile = $ergebnis->fetch_array(MYSQLI_ASSOC);
        if ($zeile) {
            $ein_bieter = new Bieter($zeile['ein_bieter_id'],$zeile['vorname'],
                            $zeile['nachname'],$zeile['adresse'],$zeile['telefon']);
            $database->close();
            return $ein_bieter;
        } else {
            $database->close();
            return NULL;
        }
    }

    static function AnbieterAnzahlAbrufen() {
		$database = new mysqli("localhost", "ren", "RenAuktion2024", "auktion_mysql");
		$abfrage = "SELECT count(a_d_id) FROM alle_bieter";
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