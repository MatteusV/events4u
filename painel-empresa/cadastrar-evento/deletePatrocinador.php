<?php
include('../verifica-login-empresa.php');
require_once('/opt/lampp/htdocs/events4u/config.php');
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $id_evento = $_GET['evento'];
        $sql = mysqli_query($conexao, "SELECT * FROM patrocinador WHERE id_patrocinador = '{$id}'");

        if(mysqli_num_rows($sql) > 0) {

            $delete = mysqli_query($conexao, "DELETE FROM patrocinador WHERE id_patrocinador = '{$id}'");

            header('Location: ../dashboard/info.php?id='.$id_evento);
        }
        
    }
    header('Location: ../dashboard/info.php?id='.$id_evento);
?>