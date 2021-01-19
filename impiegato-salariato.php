<?php

require_once('impiegato.php');

class ImpiegatoSalariato extends Impiegato {

    private $giorni_lavorati;
    private $compenso_giornaliero;

    public function __construct($init_is){

        parent::__construct($init_is);

        $this->giorni_lavorati = $init_is['giorni_lavorati'];
        $this->compenso_giornaliero = $init_is['compenso_giornaliero'];

        $this->calcola_compenso();

    }

    private function calcola_compenso(){
        $this->compenso = $this->giorni_lavorati * $this->compenso_giornaliero;
    }


}


?>