<?php
require_once('/opt/lampp/htdocs/events4u/config.php');

if(isset($_POST['submit'])) {

    // print_r('Nome: ' . $_POST['nome']);
    // print_r('<br>');
    // print_r('Email: ' . $_POST['email']);
    // print_r('<br>');
    // print_r('Senha: ' . $_POST['senha']);
    // print_r('<br>');
    // print_r('Telefone: ' . $_POST['telefone']);
    // print_r('<br>');
    // print_r('Sexo: ' . $_POST['genero']);
    // print_r('<br>');
    // print_r('instagram: ' . $_POST['instagram']);
    // print_r('<br>');
    // print_r('Cidade: ' . $_POST['cidade']);
    // print_r('<br>');
    // print_r('Estado: ' . $_POST['estado']);

    $nome =  $_POST['nome'];
    $email =  $_POST['email'];
    $senha =  md5($_POST['senha']);
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $sexo = $_POST['genero'];
    $tipo = $_POST['tipo_eventos'];
    $data = $_POST['data_nasc'];
    $instagram = $_POST['instagram'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $verificaUsuario = mysqli_query($conexao, "SELECT email FROM usuarios WHERE email = '$email'");
    
    if(mysqli_num_rows($verificaUsuario) > 0 ) {
        ?>
        <script>
            function function1()
            {
                alert("Email já cadastrado, tente outro");
                window.location.replace('/events4u/painel-empresa/cadastrar-evento/index.php');
            }
        </script>
        <?php
    }
    else {
        //  $result = mysqli_query($conexao, "INSERT INTO usuarios (nome, email, senha, telefone, sexo, instagram, tipo_evento, data_nascimento, cidade, estado, cpf) VALUES('$nome', '$email', '$senha', '$telefone', '$sexo', '$instagram', '$tipo', '$data', '$cidade', '$estado', '$cpf')");

        $result = mysqli_query($conexao, "INSERT INTO usuarios (nome,email, senha, telefone, sexo, instagram, tipo_evento, data_nascimento, cidade, estado, foto, cpf) VALUE('$nome',   '$email', '$senha', '$telefone', '$sexo', '$instagram', '$tipo', '$data', '$cidade', '$estado', '$cpf')");


        if(mysqli_num_rows($result) === 1) {

        ?>
        <script>
            function function1()
            {
                alert("Cadastrado com sucesso");
                window.location.replace('/events4u/login-promoter/index.php');
            }
            function1()
        </script>
        <?php
        } else {
            ?>
            <script>
            function function1()
            {
                alert("Houve um problema ao cadastrar sua conta no nosso sistema");
                window.location.replace('/events4u/login-promoter/index.php');
            }
            function1()
        </script>
        <?php
        }
    }   
}
else {
    
}
?> 
