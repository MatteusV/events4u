<?php
include('../verifica-login-empresa.php');
include('/xampp/htdocs/events4u/config.php');

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
    <link href="css/style.css" rel="stylesheet">

    <title>Dashboard | empresa</title>
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


    <div class="sidebar-vertical" id="sidebar-vertical">
		<nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        
                    </li>

                <li class="sidebar-item-active">
                    <a class="sidebar-link" href="">
                        <i class="align-middle" data-feather="sliders">
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-columns" viewBox="0 0 16 16">
                            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V2zm8.5 0v8H15V2H8.5zm0 9v3H15v-3H8.5zm-1-9H1v3h6.5V2zM1 14h6.5V6H1v8z"/>
                            </svg>
                        </i>
                        <span class="span-active">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="../cadastrar-evento/index.php">
                        <i class="align-middle" data-feather="user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                        </i> 
                        <span class="align-middle">Cadastrar evento<span>
                    </a>
                </li>

                   <li class="sidebar-item">
                    <a class="sidebar-link" href="../perfil/index.php">
                        <i class="align-middle" data-feather="user">
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


    <h1 class="h1_evento">Eventos que você cadastrou:</h1>



<div class="post-area" id="post-area">

<?php

            $resultEventos = mysqli_query($conexao, "SELECT * FROM eventos WHERE id_empresa = '{$id_empresa}' AND online = '1' ORDER BY id_evento ASC");

                if(mysqli_num_rows($resultEventos) > 0) {

                    while($user_data = mysqli_fetch_assoc($resultEventos)) {

                    $id_evento = $_SESSION['id_evento'] = $user_data['id_evento'];
                    // echo $id_evento;


                    $resultFolder = mysqli_query($conexao, "SELECT * FROM folder WHERE id_evento = '{$id_evento}'");

                    if(mysqli_num_rows($resultFolder) > 0) {
                        $resultArrayFolder = mysqli_fetch_assoc($resultFolder);
                        $id_folder =  $_SESSION['id_folder'] = $resultArrayFolder ['id_folder'];

                    //    echo $id_folder;
  
                        
                  
                    
?>    
                    <div class="catalogo">
                        <!--Thumbnail -->
                        <div class="thumbnail">
                            <img class="img_evento" src="../cadastrar-evento/<?php echo $resultArrayFolder['diretorio'] ?>" alt="folder do evento" title="folder do evento">
                        </div>
                        <!-- Conteudo -->
                        <div class="conteudo">
                            <p class="post_titulo">Nome: <?php echo $user_data['nome']; ?></p>
                            <p class="post_descricao">Tipo do evento: <?php echo $user_data['tipo_evento']; ?></p>
                            <p class="post_seguidores">Quantidade de seguidores necessario: <?php echo $user_data['n_seguidores']; ?></p>
                            <div class="post_meta">
                                <p class="post_data">data do evento: <?php echo date("d/m/Y", strtotime($user_data['data_evento'])); ?></p>
                                <p class="post_local">Local do Evento: <?php echo $user_data['local_evento'] ?></p>
                                <p class="post_local">Link de venda: <a class="post_link" href="<?php echo $user_data['link_venda'] ?>" target="_blank"><?php echo $user_data['link_venda'] ?></a></p>
                            </div>
                        </div>
                        <div class="btn">
                            <a class="btn_evento" href="info.php?<?php echo "id=".$user_data['id_evento']?>">SAIBA MAIS</a>

                            <a href="../cadastrar-evento/delete.php?<?php echo "id=".$user_data['id_evento'] ?>">
                                <svg class="btn_lixo" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                             </svg>
                            </a>
                        </div>
                    </div>     
<?php
            }            
        }
    }
    else {
        ?>
            <h2>Você não possui nenhum evento cadastrado <a href="../cadastrar-evento/index.php">CADASTRE AQUI</a></h2>
        <?php
    }

?>
</div>

</body>
<script src="../js/header-responsivo.js"></script>
</html>