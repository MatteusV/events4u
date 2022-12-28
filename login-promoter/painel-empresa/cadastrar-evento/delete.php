<?php
include('../verifica-login-empresa.php');
include('/xampp/htdocs/events4u/config.php');

if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    
        $sqlSelect = mysqli_query($conexao, "SELECT * FROM eventos WHERE id_evento = '{$id}'");
    
        if(mysqli_num_rows($sqlSelect) > 0) {
            $sqlDelete = "UPDATE eventos SET online = '0' WHERE id_evento= '{$id}'";
            $resultDelte = $conexao->query($sqlDelete);
            echo "deletado";
            header('Location: ../dashboard/index.php');
        }
    }
    header('Location: ../dashboard/index.php');

?>