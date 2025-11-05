<?php

include_once('./libraries/functions.php');

//Inicialización
boot();

//Lógica de negocio
$mensaje = '';
if(isset($_POST['crear'])){
    //Creamos usuario
    $userData = filter_input_array(INPUT_POST,[
        'nombre' => FILTER_DEFAULT,
        'email' => FILTER_VALIDATE_EMAIL,
        'rol' => FILTER_DEFAULT

    ]);
    if(!empty($userData)){
        array_unshift($userData, "12");
        array_push($userData, date('d/M/Y'));
        dump('userData');
        dump($userData);
        putDataInCSV($userData, './data/users.csv');
        $mensaje= 'Usuario creado';
    }
    
}
//Lógica de presentación
//Presenta el html a partir de los datos en el CSV
include_once('./templates/create_users.tpl.php');
?>