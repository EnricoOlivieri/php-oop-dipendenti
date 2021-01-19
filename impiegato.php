<?php

require_once ('persona.php');

class Impiegato extends Persona
{
    public $codice_impiegato;
    public $compenso;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso = 0)
    {
        parent::__construct($nome, $cognome, $codice_fiscale);
        $this->codice_impiegato = $codice_impiegato;
        $this->compenso = $compenso;
    }

    public function to_string() {
        $stringify = parent::to_string();
        $stringify .= <<<EOT
        codice_impiegato: this->$codice_impiegato;
        compenso: this->$compenso;
    EOT;
    return $stringify;
    }
    private function calcola_compenso(){
        $this->compenso = null;
    }
}


?>