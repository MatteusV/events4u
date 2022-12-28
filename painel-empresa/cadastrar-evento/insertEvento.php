<?php
require_once('../verifica-login-empresa.php');
include('/opt/lampp/htdocs/events4u/config.php');
$email = $_SESSION['email'];
// echo $email;

$resultId = mysqli_query($conexao, "SELECT * FROM empresas WHERE email = '{$email}'");
if(mysqli_num_rows($resultId) > 0) {

    $resultArray = mysqli_fetch_assoc($resultId);

        if(isset($_POST['submit'])) {

            $id_empresa = $resultArray['id_empresa'];
            $nome =  $_POST['nome_evento'];
            $tipo =  $_POST['tipo_evento'];
            $endereco = $_POST['endereco'];
            $cidade = $_POST['cidade'];
            $qntdPromoter = $_POST['quantidade_promoter'];
            $seguidores = $_POST['seguidores'];
            $data = $_POST['data'];
            $venda = $_POST['venda'];


            $verifica = mysqli_query($conexao, "SELECT * FROM eventos WHERE id_empresa = '{$id_empresa}' AND local_evento = '{$endereco}' AND data_evento = '{$data}' AND online = '1'");

            if(mysqli_num_rows($verifica) > 0 ) {
                ?>
                <script>
                    alert('Evento com o mesmo dia e endereço já cadastrado!');
                    window.location.replace('/events4u/painel-empresa/cadastrar-evento/index.php');
                </script>
                <?php
            }
            else {

            $result = mysqli_query($conexao, "INSERT INTO eventos (nome, tipo_evento, data_evento, local_evento, cidade, qtd_promoter, n_seguidores, link_venda, id_empresa) VALUES('$nome', '$tipo', '$data', '$endereco', '$cidade', '$qntdPromoter', '$seguidores', '$venda', '$id_empresa')") or die($mysqli -> error);

            ?>
            <script>
                alert('Evento cadastrado!');
                window.location.replace('/events4u/painel-empresa/cadastrar-evento/index.php');
            </script>
            <?php
        }
    }
}

    $idEvento = mysqli_query($conexao, "SELECT * FROM eventos  WHERE id_empresa = '{$id_empresa}' AND local_evento = '{$endereco}' AND data_evento = '{$data}'");

        $resultIdEvento = mysqli_fetch_assoc($idEvento);

        $id_evento = $resultIdEvento['id_evento'];


        if(isset($_FILES['folder_evento'])) {
            $arquivo = $_FILES['folder_evento'];
            if($arquivo['error'])
                die("Falha ao enviar o arquivo");

            $pasta = "folder/";
            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

            if($extensao != "jpg" && $extensao != "png")
                die("Extensão de arquvio não aceito");

                $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

            $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);
            if($deu_certo){
                $folder = mysqli_query($conexao, "INSERT INTO folder (nome, diretorio, id_evento) VALUES ('$nomeDoArquivo', '$path', '$id_evento')");
                // header('Location: index.php');
            }
            else {
                echo "<h2>falha ao enviar</h2>";
            }
        }

?>