<?php

require_once('persona.php');
require_once('impiegato.php');
require_once('impiegato-salariato.php');
require_once('impiegato-commissione.php');

$data = [
    'nome' => 'Pinco',
    //'cognome' => 'Pallino',
    'codice_fiscale' => 'PP87',
    'codice_impiegato' => '000000'
];

$persona = new Persona('Enrico', 'Olivieri', 'EO95');

try {
    $impiegato = new Impiegato($data);
} catch (Exception $e){
    echo $e->getMessage();
}

$data_s = array_merge($data, [
    'giorni_lavorati' => 10,
    'compenso_giornaliero' => 100
]);

$impiegato_s = new ImpiegatoSalariato($data_s);

try {

    $impiegato_c = new ImpiegatoSuCommissione($data_s, 'Boolflix', 1000);

} catch (Exception $e) {
    $impiegato_c = new Impiegato($data_s);
    echo $e->getMessage();
}

try {
    $impiegato_c->fun();
} catch (Exception $e){
    echo $e->getMessage();
}

?>

<p> <?= $persona->to_string(); ?> </p>
<p> <?= $impiegato->to_string(); ?> </p>
<p> <?= $impiegato_s->to_string(); ?> </p>
<p> <?= $impiegato_c->to_string(); ?> </p>



