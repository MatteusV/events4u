<?php

if (isset($_POST['submit'])) {
    require_once('/opt/lampp/htdocs/events4u/config.php');

    // print_r('Nome: ' . $_POST['nome']);
    // print_r('<br>');
    // print_r('Email: ' . $_POST['email']);
    // print_r('<br>');
    // print_r('Senha: ' . $_POST['senha']);
    // print_r('<br>');
    // print_r('Telefone: ' . $_POST['telefone']);
    // print_r('<br>');
    // print_r('cnpj: ' . $_POST['cnpj']);
    // print_r('<br>');
    // print_r('Cidade: ' . $_POST['cidade']);
    // print_r('<br>');
    // print_r('Estado: ' . $_POST['estado']);

    $nome =  $_POST['nome'];
    $email =  $_POST['email'];
    $senha =  md5($_POST['senha']);
    $telefone = $_POST['telefone'];
    $cnpj = $_POST['cnpj'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $verificaUsuario = mysqli_query($conexao, "SELECT email FROM empresas WHERE email = '$email'");
    
    if(mysqli_num_rows($verificaUsuario) > 0){
        ?>
         <script>
            function function1()
            {
                alert("Email já cadastrado, tente outro");
            }
        </script>
        <?php
    } 
    else {
       $result = mysqli_query($conexao, "INSERT INTO empresas(nome, email, senha, telefone, cnpj, cidade, estado) VALUES('$nome', '$email', '$senha', '$telefone', '$cnpj',    '$cidade', '$estado')");
       ?>
        <script>
            function function1()
            {
                alert("Cadastrado com sucesso!");
            }
        </script>
    <?php
    }
}
?> 
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Cadastro da empresa</title>
    <style>
    </style>
</head>

<body>

    <div class="header">

        <button onclick="toggleSideBar()" class="btn_icon_header">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
        </button>
        <!-- Div da logo do header -->
        <div class="logo_header">
            <img class="img_logo_header" src="img/Events4u(branco).png" alt="Logo Events4U">
        </div>


        <div class="navigation_header">
            <a href="/events4u/home-page/home.php">Home</a>
            <a href="/events4u/painel-empresa/cadastrar-evento/index.php">Divulgue seu evento</a>
            <a href="/events4u/painel-promoter/dashboard/index.php">Seja promoter</a>            
            <a href="/events4u/home-page/home.php#quemsomos">Quem somos?</a>
        </div>
    
    </div>

    <div class="h1-flex">
        <h1>Criar conta | empresa</h1>
    </div>
    
    <div class="box">
        <form action="index.php" method="post">
            <fieldset>
                <legend><b>Cadastro da Empresa</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" maxlength="30" required>
                    <label for="nome" class="labelInput">Nome da empresa</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" maxlength="40" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" maxlength="32" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" maxlength="14" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="cnpj" id="cnpj" class="inputUser" maxlength="18" required>
                    <label for="cnpj" class="labelInput">CNPJ</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" maxlength="45" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" maxlength="45" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" onclick="function1()" value="Cadastrar">

            </fieldset>
        </form>

        <div class="link">
            <p>Já possui conta: <a href="../login-empresa/index-empresa.php"><bold>Login</bold></a></p>
        </div>
    </div>
    <section class="images">
        <div class="circle"></div>
    </section>
</body>

</html>