<?php
include('/xampp/htdocs/events4u/config.php');
if(isset($_POST['add_conteudo'])) {

$id= $_GET['id'];
$texto = $_POST['texto'];

if(isset($_FILES['foto_conteudo'])) {
    $arquivo = $_FILES['foto_conteudo'];
    if($arquivo['error'])
        die("Falha ao enviar o arquivo");

    $pasta = "conteudo-evento/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != "png")
        die("Extensão de arquvio não aceito");

        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

    $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);
    if($deu_certo){
        $folder = mysqli_query($conexao, "INSERT INTO conteudo_evento (nome, diretorio, texto, id_evento) VALUES ('$nomeDoArquivo', '$path', '$texto', '$id')");
        header('Location: info.php?id='.$id);

    }
    else {
        echo "<h2>falha ao enviar</h2>";
    }
}

} else {
    echo "oiu";
}
?>