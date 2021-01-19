<?php

require_once('impiegato.php');

trait Progetto {

    private $nome_progetto;
    private $commissione;

    public function to_string(){
        $str = parent::to_string();
        $str .= <<<EOT
            Progetto: $this->nome_progetto
        EOT;
        return $str;
    }

}


class ImpiegatoSuCommissione extends Impiegato {

    use Progetto;

    const PROPORZIONE = 0.8;

    public function __construct($init_is, $nome_proj, $commissione){


        parent::__construct($init_is);

        if(!is_string($nome_proj)){
            throw new Exception('nome_prj non e una stringa');
        }
        if(!is_numeric($commissione)){
            throw new Exception('commissione non e un numero');
        }

        $this->nome_progetto = $nome_proj;
        $this->commissione = $commissione;

        $this->calcola_compenso();

    }

    private function calcola_compenso(){
        $this->compenso = $this->commissione * self::PROPORZIONE;
    }

    public function fun(){

        if($this->compenso < 1000){
            throw new Exception('This is not funny');
        }

    }

}

?>