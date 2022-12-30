<?php
include_once("/xampp/htdocs/events4u/config.php");
require_once('/opt/lampp/htdocs/events4u/config.php');

    if(isset($_POST['add_atracao'])) {
        $id = $_GET['id'];
        $nome = $_POST['nome_atracao'];
        $data = $_POST['data_atracao'];
        $hora = $_POST['hora_atracao'];

        $verifica = mysqli_query($conexao, "SELECT * FROM atracao WHERE dt_atracao = '{$data}' AND hr_atracao = '{$hora}'");

        if(mysqli_num_rows($verifica) > 0) {
            ?>
            <script>
                alert("Atração já cadastrada no mesmo dia e hora!")
            </script>
            <?php
        }
        else {
            
            if(isset($_FILES['foto_atracao'])) {
                $arquivo = $_FILES['foto_atracao'];
                if($arquivo['error'])
                    die("Falha ao enviar o arquivo");

                $pasta = "atracao/";
                $nomeDoArquivo = $arquivo['name'];
                $novoNomeDoArquivo = uniqid();
                $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

                if($extensao != "jpg" && $extensao != "png")
                    die("Extensão de arquvio não aceito");

                    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

                $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);
                if($deu_certo){
                    $insert = mysqli_query($conexao, "INSERT INTO atracao (nome_atracao, dt_atracao, hr_atracao, diretorio_img_atracao, id_evento) VALUES ('{$nome}', '{$data}', '{$hora}', '{$path}', '{$id}')");
                    header('Location: ../dashboard/info.php?id='.$id);
                }
                else {
                    echo "<h2>falha ao enviar</h2>";
                }
                
            }
        }
    }

?>