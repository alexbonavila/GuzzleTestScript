<?php

require 'vendor/autoload.php';

$fichero = 'log.txt';
$client = new \GuzzleHttp\Client();

$index=0;
$limit=1440;

while ($index<=$limit){

    $actual = file_get_contents($fichero); // Abre el fichero para obtener el contenido existente

//    $rand1=rand(0,500);
//    $rand2=rand(0,99);

    $res = $client->request('GET', 'http://{{URL TO TEST}}');//Hacemos la peticion (Falta personalizar)

    $actual .= date('m/d/Y h:i:s a', time())." Status Code: ".$res->getStatusCode()."\n"; //Imprimimos el datetime i el estado en el fichero log

    file_put_contents($fichero, $actual); // Escribe el contenido al fichero


    sleep(60);//Detenemos el bulce 60 segundos
    $index++;
}

