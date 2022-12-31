<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-bt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../login-empresa/css/style.css" rel="stylesheet">
    <title>Login da Empresa</title>
    <style>
        .msg-erro {
            margin-top: 20px;
            padding: 10px;
            background-color: #D92525;
            text-align: center;
        }
    </style>
</head>

<body>

    <header class="header">

        <button onclick="toggleSideBar()" class="btn_icon_header">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
        </button>
        <!-- Div da logo do header -->
        <div class="logo_header">
            <img class="img_logo_header" src="img/Events4u(branco).png" alt="Logo Events4U">
        </div>

        <nav class="navigation_header">
            <a href="/events4u/home-page/home.php">Home</a>
            <a href="/events4u/painel-empresa/cadastrar-evento/index.php">Divulgue seu evento</a>
            <a href="/events4u/painel-promoter/dashboard/index.php">Seja promoter</a>            
            <a href="/events4u/home-page/home.php#quemsomos">Quem somos?</a>
    </nav>
    
    </header>

    <div class="h1-flex">
        <h1>Login | Empresa</h1>
    </div>
    
    <div class="box">
        <form action="login-empresa.php" method="post">
            <fieldset>
                <legend><b>Login da Empresa</b></legend>
                <br>
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
                <input type="submit" name="submit" id="submit" value="Acessar">
            </fieldset>
        </form>
        <div class="link">
            <p>Não possui conta: <a href="../cadastro-empresa/index.php"><bold>Cadastre-se</bold></a></p>
        </div>
        <?php
        if (isset($_SESSION['nao_autenticado'])) :
        ?>
            <div class="msg-erro">
                <h4><b>EMAIL OU SENHA INCORRETOS!</b></h4>
            </div>
        <?php
        endif;
        unset($_SESSION['nao_autenticado']);
        ?>
    </div>
    <section class="images">
        <div class="circle"></div>
    </section>
</body>
<script src="../home-page/js/header-responsivo.js"></script>
</html>