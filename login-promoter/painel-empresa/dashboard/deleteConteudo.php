<?php
include('../verifica-login-empresa.php');
include('/xampp/htdocs/events4u/config.php');

    if(isset($_GET['id'])) {
        $id_conteudo = $_GET['id'];
        $id_evento = $_GET['evento'];
        $sql = mysqli_query($conexao, "SELECT * FROM conteudo_evento WHERE id_conteudo_evento = '{$id_conteudo}'");

        if(mysqli_num_rows($sql) > 0) {

            $delete = mysqli_query($conexao, "DELETE FROM conteudo_evento WHERE id_conteudo_evento = '{$id_conteudo}'");

            header('Location: ../dashboard/info.php?id='.$id_evento);
        }
        
    }
    header('Location: ../dashboard/info.php?id='.$id_evento);
?>