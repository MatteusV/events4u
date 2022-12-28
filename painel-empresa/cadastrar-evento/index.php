<?php
require_once('../verifica-login-empresa.php');
include('/opt/lampp/htdocs/events4u/config.php');


$email = $_SESSION['email'];
// echo $email;

 $idEmpresa = mysqli_query($conexao, "SELECT * FROM empresas WHERE email = '{$email}'");
 
 $result = mysqli_fetch_assoc($idEmpresa);

 $id_empresa = $_SESSION['id_empresa'] = $result['id_empresa']


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../cadastrar-evento/css/style.css" rel="stylesheet">
    
    <title>Cadastrar Evento</title>
</head>
<body>
    <div class="header" id="header">

        <button onclick="toggleSideBar()" class="btn_icon_header">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
        </button>

        <div class="logo">
            <img class="img_logo_header" src="img/Events4u(branco).png" alt="Logo">
        </div>

        <div class="navigation_header" id="navigation_header">
            
            <button onclick="toggleSideBar()" class="btn_icon_header">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
            
            <a href="/events4u/home-page/home.php">Home</a>
            <a href="/events4u/painel-empresa/cadastrar-evento/index.php">Divulgue seu evento</a>            
            <a href="/events4u/home-page/home.php#quemsomos">Quem somos?</a> 

            <div id="logout">
                <a href="../logout-empresa.php">Sair</a>
            </div>

            <div class="img_perfil">            
                <img class="foto_perfil" src="/events4u/painel-empresa/perfil/<?php echo $result['foto'];?> " alt="foto de perfil" srcset="">
            </div>

        </div>
    </div>


    <div class="sidebar-vertical">
		<nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                <!-- <span class="align-middle">Events4U</span> -->
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        
                    </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="../dashboard/index.php">
                        <i class="align-middle">
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-columns" viewBox="0 0 16 16">
                            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V2zm8.5 0v8H15V2H8.5zm0 9v3H15v-3H8.5zm-1-9H1v3h6.5V2zM1 14h6.5V6H1v8z"/>
                            </svg>
                        </i>
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>


                <li class="sidebar-item-active">
                    <a class="sidebar-link" href="">
                        <i class="align-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                        </i> 
                        <span class="span-active">Cadastrar evento<span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="../perfil/index.php">
                        <i class="align-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" claswidth="16" height="16" fill="currentColor" s="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                        </i> 
                        <span class="align-middle">Perfil</span>
                    </a>
                </li>

                </ul>
            </div>
        </nav>
    </div>

    <div class="container" id="container">
        <h2 id="h2_container">Cadastre seu evento</h2>
        <p id="p_container">Para que você ache promoters precisamos que cadastre seu evento:</p>

        <form  enctype="multipart/form-data" action="insertEvento.php" method="post">
            <fieldset>
                <legend>Cadastrar o evento</legend>

                <div class="inputBox">
                    <input type="text" autocomplete="off" name="nome_evento" id="nome" class="inputUser" maxlength="30" required>
                    <label for="nome" class="labelInput">Nome do evento</label>
                </div>
                <br>

                <div class="inputBox">
                    <input type="text" autocomplete="off" name="tipo_evento" id="tipo_evento"
                    class="inputUser" maxlength="50" list="tipo_eventos"  required>
                    <label for="contato" class="labelInput">Tipo do evento</label>
                </div>
                <br>
                
                <div class="inputBox">
                    <input type="text" autocomplete="off" name="cidade"  id="cidade" class="inputUser" maxlength="45" required>
                    <label for="cidade" class="labelInput">Cidade do evento</label>
                </div>
                <br>

                <div class="inputBox">
                    <input type="date" autocomplete="off" name="data" id="data" class="inputUser" required>
                    <label for="cidade" class="labelInput"></label>
                </div>
                <br>
                
                <div class="inputBox">
                    <input type="text" autocomplete="off" name="endereco" id="endereco" class="inputUser" maxlength="100" required>
                    <label for="endereco" class="labelInput">Endereço do evento</label>
                </div>
                <br>

                <div class="inputBox">
                    <input type="number"  name="quantidade_promoter" id="quantidade_promoter" class="inputUser" maxlength="30" required list="promoterlist">
                    <label for="quantidade_promoter" class="labelInput">Quantida maxima de promoters:</label>
                </div>
                <br>

                <div class="inputBox">
                    <input type="number" name="seguidores" id="seguidores"
                    class="inputUser" maxlength="40" required list="seguidoreslist">
                    <label for="seguidores" class="labelInput">Quantidade mínima de seguidores</label>
                </div>
                <br>

                <div class="inputBox">
                    <input type="url" name="venda" id="venda"
                    class="inputUser"  maxlength="50">
                    <label for="venda" class="labelInput">Link de venda com encurtador</label>
                </div>

                <label><br>Folder do evento</label>
                <br>
                <input type="file" name="folder_evento" accept="image/*"  id="folder">

                <input type="submit" name="submit" id="submit" onclick="function1()" value="Cadastrar">
                <br><br>
                
            </fieldset>
        </form>
        <datalist id="seguidoreslist">
            <option>1000</option>
            <option>5000</option>
            <option>10000</option>
        </datalist>

        <datalist id="tipo_eventos">
            <option>Eventos corporativos</option>
            <option>Eventos acadêmicos</option>
            <option>Eventos de entretenimento</option>
            <option>Eventos esportivos</option>
        </datalist>

        <datalist id="promoterlist">
            <option>5</option>
            <option>10</option>
            <option>15</option>
            <option>20</option>
        </datalist>
    </div>

    <!-- Eventos cadastrado -->

</body>


</html>