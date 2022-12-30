<?php
include('../verifica-login.php');
require_once('/opt/lampp/htdocs/events4u/config.php');

if(isset($_POST['update'])) {
    $id = $_GET['id'];
    $nome =  $_POST['nome'];
    $email =  $_POST['email'];
    $senha =  md5($_POST['senha']);
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $data = $_POST['data_nasc'];
    $instagram = $_POST['instagram'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario = '{$id}'");

    if(mysqli_num_rows($sql) > 0) {
        
        $update = mysqli_query($conexao, "UPDATE usuarios SET nome = '{$nome}', email = '{$email}', senha = '{$senha}', telefone = '{$telefone}', cpf = '{$cpf}',data_nascimento = '{$data}', instagram = '{$instagram}', cidade = '{$cidade}', estado = '{$estado}' WHERE id_usuario = '{$id}'");



            if(isset($_FILES['foto_usuario'])) {
                $arquivo = $_FILES['foto_usuario'];

                $pasta = "foto-perfil/";
                $nomeDoArquivo = $arquivo['name'];
                $novoNomeDoArquivo = uniqid();
                $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

                if($extensao != "jpg" && $extensao != "png")
                header('Location: /events4u/login-promoter/index.php');

                    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

                $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);
                if($deu_certo){
                    $foto = mysqli_query($conexao, "UPDATE usuarios SET foto = '{$path}' WHERE id_usuario = '{$id}'");
                    header('Location: /events4u/login-promoter/index.php');
                }
                else {
                    echo "<h2>falha ao enviar</h2>";
                    header('Location: /events4u/login-promoter/index.php');
                }
            }

        } 

    }
    else {
        header('Location: /events4u/login-promoter/index.php');
    }
?>