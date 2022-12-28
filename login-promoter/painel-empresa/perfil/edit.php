<?php
include('../verifica-login-empresa.php');
include('/xampp/htdocs/events4u/config.php');
use LDAP\Result;

    include_once('/xampp/htdocs/events4u/config.php');
  
    if(isset($_POST['update'])) { 
        $id_empresa = $_GET['id'];
        $nome =  $_POST['nome'];
        $email =  $_POST['email'];
        $senha = md5($_POST['senha']);
        $telefone = $_POST['telefone'];
        $cnpj = $_POST['cnpj'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];    

        $resultUpdate = mysqli_query($conexao, "UPDATE empresas SET nome='{$nome}', email = '{$email}', senha='{$senha}', telefone='{$telefone}', cnpj='{$cnpj}', cidade='{$cidade}', estado='{$estado}' WHERE id_empresa='{$id_empresa}';");
        
        if(isset($_FILES['foto_usuario'])) {
            $arquivo = $_FILES['foto_usuario'];
            if($arquivo['error'])

            header('Location: /events4u/login-empresa/index-empresa.php');

            $pasta = "foto-perfil/";
            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

            if($extensao != "jpg" && $extensao != "png")
            header('Location: /events4u/login-empresa/index-empresa.php');

                $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

            $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);
            if($deu_certo){
                $foto = mysqli_query($conexao, "UPDATE empresas SET foto = '{$path}' WHERE id_empresa = '{$id_empresa}'");
                header('Location: /events4u/login-empresa/index-empresa.php');
            }
            else {
                header('Location: /events4u/login-empresa/index-empresa.php');
            }
        }
        else {
                header('Location: /events4u/login-empresa/index-empresa.php');
        }

    } 

    header('Location: /events4u/login-empresa/index-empresa.php');



?>