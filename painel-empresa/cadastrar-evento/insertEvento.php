<?php
require('/opt/lampp/htdocs/events4u/config.php');
require_once('../verifica-login-empresa.php');

$email = $_SESSION['email'];

// pegar o id da empresa
$empresa = mysqli_query($conexao, "SELECT * FROM empresas WHERE email = '$email'");

if(mysqli_num_rows($empresa) === 1) {
    // pegar as informações e passar para uma variavel
    $infoEmpresa = mysqli_fetch_assoc($empresa);

    // verificar se o formulario enviou as informações do cadastro do evento 
    if(isset($_POST['submit'])) {
        // passar para uma variavel o somente o id da empresa
        $id_empresa = $infoEmpresa['id_empresa'];
        // passar as informações do formulario para as variavéis
        $nome =  $_POST['nome_evento'];
        $tipo =  $_POST['tipo_evento'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $qntdPromoter = $_POST['quantidade_promoter'];
        $seguidores = $_POST['seguidores'];
        $data = $_POST['data'];
        $venda = $_POST['venda'];

        // verifica se já existe se já tem um evento cadastrado no mesmo local/data
        $verifica = mysqli_query($conexao, "SELECT * FROM eventos WHERE id_empresa = '{$infoEmpresa['id_empresa']}' AND local_evento = '{$endereco}' AND data_evento = '{$data}'");

        if(mysqli_num_rows($verifica) === 0) {
            //caso não tenha nenhum evento cadastrado no mesmo local/data inserir as informações no banco de dados
            $sqlInsert = mysqli_query($conexao, "INSERT INTO eventos (nome, tipo_evento, data_evento, local_evento, cidade, qtd_promoter, n_seguidores, id_empresa) VALUES ('{$nome}', '{$tipo}', '{$data}', '{$endereco}', '{$cidade}', '{$qntdPromoter}', '{$seguidores}', '{$infoEmpresa['id_empresa']}',)");

            // verifica se cadastrou o evento no banco de dados
            $verificaEvento = mysqli_query($conexao, "SELECT * FROM eventos WHERE id_empresa = '{$id_empresa}' AND local_evento = '{$endereco}' AND data_evento = '{$data}' ");


            if(mysqli_num_rows($verificaEvento) === 1) {
                // caso tenha sido cadastrado, pegar o id do evento
                $idEvento = mysqli_query($conexao, "SELECT * FROM eventos  WHERE id_empresa = '{$id_empresa}' AND local_evento = '{$endereco}' AND data_evento = '{$data}'");
                // passar as informações para uma variavel 
                $resultIdEvento = mysqli_fetch_assoc($idEvento);
                // passar somento o id do evento para uma variavel
                $id_evento = $resultIdEvento['id_evento'];
        
                // verifica se veio a imagem do formulario
                if(isset($_FILES['folder_evento'])) {
                    // passar as informações para uma variavel
                    $arquivo = $_FILES['folder_evento'];
                    // se tiver algum erro ele encerra
                    if($arquivo['error'])
                        die("Falha ao enviar o arquivo");
                    
                    //definir a pasta que vai salvar a foto 
                    $pasta = "folder/";
                    // guarda o nome da imagem
                    $nomeDoArquivo = $arquivo['name'];
                    // adicionar um nome ÚNICO para evitar sobreposição de imagens na pasta
                    $novoNomeDoArquivo = uniqid();
                    // pegar a extensão da foto e converte em letras minusculas
                    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
                    
                    // verifica se a extensão é diferende de jpg/png
                    if($extensao != "jpg" && $extensao != "png")
                    // se for diferente ele encerra o código
                        die("Extensão de arquvio não aceito");
                    
                    // centralizando algumas informações para adiconar no banco de dados
                        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
        
                    // movendo o arquivo para a pasta definida
                    $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);

                    if($deu_certo){
                        // se deu certo, ele inviar as informações para o banco de dados
                       $insertFolder = mysqli_query($conexao, "INSERT INTO folder (nome, diretorio, id_evento) VALUES ('{$nomeDoArquivo}', '{$path}', '{$id_evento}')");

                        ?>
                        <script>
                            alert('Evento cadastrado com sucesso!');
                            window.location.replace('/events4u/painel-empresa/dashboard/index.php');
                        </script>
                    <?php

                    }
                    else {
                        echo "<h2>falha ao enviar</h2>";
                    }
                } else {
                    echo "Não achamos o folder";
                }

            } else {
                echo "Evento não foi cadastrado no banco";
            }

        } else {
            ?>
                <script>
                    alert('Evento com o mesmo dia e endereço já cadastrado!');
                    window.location.replace('/events4u/painel-empresa/cadastrar-evento/index.php');
                </script>
            <?php

        }

    } 
    else {
        echo "Não conseguimos pegar as informações do evento";
    }

} 
else {
    echo "Houve um problema ao achar sua conta no nosso sistema";
}

?>
