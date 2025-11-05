<?php
function boot(){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
}

function dump($var){
    echo '<pre>'.print_r($var,true).'</pre>';
}

function getDataFromCSV($ruta){
    $data = array();
    if($handler = fopen($ruta, 'r')){
        $cabeceras = fgetcsv($handler, 1000, ",");
        while (($lineData = fgetcsv($handler, 1000, ",")) !== FALSE) {
            $data[] = array_combine($cabeceras,$lineData);
        }
        return $data;
    }else{
        return null;
    }
    
}
function putDataInCSV($data, $ruta){
    if($handler = fopen($ruta, 'a')){
        return fputcsv($handler,$data);
    }else{
        return null;
    }
}