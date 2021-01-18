<?php

class Persona
{
    public $nome;
    public $cognome;
    public $codice_fiscale;

    public function __construct($nome, $cognome, $codice_fiscale) {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->codice_fiscale = $codice_fiscale;
    }

    public function to_string() {
        foreach ($this as $key => $value) {
            print "$key : $value";
            print "<br>";
        }
    }
}

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

    public function calcola_compenso()
    {
    }
}

class ImpiegatoAOre extends Impiegato
{
    public $ore_lavorate;
    public $compenso_orario;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso_orario, $ore_lavorate)
    {
        parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso_orario);
        $this->ore_lavorate = $ore_lavorate;
        $this->compenso_orario = $compenso_orario;
    }

    public function calcola_compenso()
    {
        print($this->compenso_orario * $this->ore_lavorate);
    }
}

class ImpiegatoSalariato extends Impiegato
{
    public $giorni_lavorati;
    public $compenso_giornaliero;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso_giornaliero, $giorni_lavorati)
    {
        parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso_giornaliero);
        $this->giorni_lavorati = $giorni_lavorati;
        $this->compenso_giornaliero = $compenso_giornaliero;
    }

    public function calcola_compenso()
    {
        print($this->compenso_giornaliero * $this->giorni_lavorati);
    }
}

trait Progetto
{
    public $nome_progetto;
    public $commissione_progetto;
}

class ImpiegatoSuCommissione extends Impiegato
{
    use Progetto;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $nome_progetto, $commissione_progetto)
    {
        parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato);
        $this->nome_progetto = $nome_progetto;
        $this->commissione_progetto = $commissione_progetto;
    }

    public function calcola_compenso()
    {
        print($this->commissione_progetto);
    }
}



?>