<?php
include_once("/xampp/htdocs/events4u/config.php");
include_once("/xampp/htdocs/events4u/login-empresa/verifica-login-empresa.php");


    if(isset($_POST['add_patrocinador'])) {
        $id = $_GET['id'];
        $nome = $_POST['nome_patrocinador'];

        $verifica = mysqli_query($conexao, "SELECT * FROM patrocinador WHERE nm_patrocinador = '{$nome}' AND id_evento = '{$id}'");

        if(mysqli_num_rows($verifica) > 0) {
            echo "Patrocinador já cadastrada no mesmo evento!";
        }
        else {
           if(isset($_FILES['foto_patrocinador'])) {
            $arquivo = $_FILES['foto_patrocinador'];
            if($arquivo['error'])
                die("Falha ao enviar o arquivo");

            $pasta = "patrocinador/";
            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

            if($extensao != "jpg" && $extensao != "png")
                die("Extensão de arquvio não aceito");

                $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

            $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);
            if($deu_certo){
                $insert = mysqli_query($conexao, "INSERT INTO patrocinador (nm_patrocinador, diretorio_img_patrocinador, id_evento) VALUES ('{$nome}', '{$path}', '{$id}')");
                header('Location: ../dashboard/info.php?id='.$id);
            }
            else {
                echo "<h2>falha ao enviar</h2>";
            }
           }
        }
    }

?>