<?php
include('../verifica-login-empresa.php');
require_once('/opt/lampp/htdocs/events4u/config.php');
    if(isset($_GET['id'])) {
        $id_usuario = $_GET['id'];
        $id_evento = $_GET['evento'];
        $sql = mysqli_query($conexao, "SELECT * FROM usuarios_eventos WHERE id_usuario = '{$id_usuario}' AND id_evento = '{$id_evento}'");

        if(mysqli_num_rows($sql) > 0) {

            $delete = mysqli_query($conexao, "DELETE FROM usuarios_eventos WHERE id_usuario = '{$id_usuario}' AND id_evento = '{$id_evento}'");

            header('Location: ../dashboard/info.php?id='.$id_evento);
        }
        
    }
    header('Location: ../dashboard/info.php?id='.$id_evento);
?>