<?php
include('../verifica-login-empresa.php');
include('/xampp/htdocs/events4u/config.php');

if(isset($_POST['update'])) {
    $id_evento = $_GET['id'];
    $nome =  $_POST['nome_evento'];
    $tipo =  $_POST['tipo_evento'];
    $data =  $_POST['data_evento'];
    $local = $_POST['local_evento'];
    $cidade = $_POST['cidade'];
    $seguidores = $_POST['seguidores'];
    $venda = $_POST['venda'];

    $sql = mysqli_query($conexao, "UPDATE eventos SET nome = '{$nome}', tipo_evento = '{$tipo}', data_evento = '{$data}', local_evento = '{$local}', cidade = '{$cidade}', n_seguidores = '{$seguidores}', link_venda = '{$venda}' WHERE id_evento = '$id_evento' ");

    header('Location: ../dashboard/info.php?id='.$id_evento);
}
?>