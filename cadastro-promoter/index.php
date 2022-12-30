<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../cadastro-promoter/css/cadastro.css" rel="stylesheet">
    <title>Cadastro do Promoter</title>
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
        <h1>Criar conta | promoter</h1>
    </div>
    <div class="box">
        <form action="insertUsuario.php" method="post">
            <fieldset>
                <legend><b>Cadastro do Promoter</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" maxlength="30" required>
                    <label for="nome" class="labelInput">Nome de usuário</label>
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
                    <input type="text" name="cpf" id="cpf" class="inputUser" maxlength="14" required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="tipo_eventos" id="tipo_eventos" class="inputUser"
                    required list="eventoslist">
                    <label for="tipo_evento" class="labelInput">Tipo do evento que deseja</label>
                </div>

                <br><br>
                <div class="inputBox">
                    <input type="url" name="instagram" id="instagram" class="inputUser"
                    title="https://www.instagram.com/usuario" required>
                    <label for="instagram" class="labelInput">Link do Instagram</label>
                </div>

                <p>Gênero</p>
                <input type="radio" name="genero" id="feminino" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" name="genero" id="masculino" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" name="genero" id="outro" value="outro" required>
                <label for="outro">Outro</label>

                <br><br>

                <div class="inputBox">
                    <label for="data_nasc"><b>Data de Nascimento</b></label>
                    <input type="date" name="data_nasc" id="data_nasc" class="inputUser" required>
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
            <p>Já possui conta: <a href="../login-promoter/index.php"><bold>Login</bold></a></p>
        </div>
    </div>
    <section class="images">
        <div class="circle"></div>
    </section>

    <datalist id="eventoslist">
            <option>Eventos corporativos</option>
            <option>Eventos acadêmicos</option>
            <option>Eventos de entretenimento</option>
            <option>Eventos esportivos</option>
    </datalist>

</body>
</script>
</html>