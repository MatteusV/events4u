<?php  
    $dbHost = '127.0.0.1';
    $dbUsername = 'matteus';
    $dbPassword = '08053119';
    $dbName = 'events4u';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    // if($conexao -> connect_errno){
    //    echo "Erro";
    // }
    // else{
    //     echo "Banco conectado";
    // }
?>