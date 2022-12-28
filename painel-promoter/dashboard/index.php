<?php
include('../verifica-login.php');
include('/xampp/htdocs/events4u/config.php');

$email = $_SESSION['email'];

// echo  $email;


   $promoter = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '{$email}'");



    $resultSql = mysqli_fetch_assoc($promoter);
    $id_usuario = $_SESSION['id_usuario'] = $resultSql['id_usuario'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">

    <title>Dashboard | promoter</title>
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
            <a href="/events4u/painel-promoter/dashboard/index.php">Seja promoter</a>            
            <a href="/events4u/home-page/home.php#quemsomos">Quem somos?</a>     

            <div id="logout">
                <a href="../logout.php">Sair</a>
            </div>

            <div class="img_perfil">            
                <img class="foto_perfil" src="/events4u/painel-promoter/perfil/<?php echo $resultSql['foto'];?> " alt="foto de perfil" srcset="">
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
                    <a class="sidebar-link" href="../vagas-evento/index.php">
                        <i class="align-middle" data-feather="user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                        </i> 
                        <span class="align-middle">Vagas para evento<span>
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

    <h1 class="h1_evento">Eventos que você está participando:</h1>

<div class="post-area" id="post-area">

<?php

    $usuario_evento = mysqli_query($conexao, "SELECT * FROM usuarios_eventos WHERE id_usuario = '{$id_usuario}'");

        if(mysqli_num_rows($usuario_evento) > 0) {

            while($result = mysqli_fetch_assoc($usuario_evento)) {

            $id_evento = $_SESSION['id_evento'] = $result['id_evento'];
            // echo $id_evento;

            $sqlEvento = mysqli_query($conexao, "SELECT * FROM eventos WHERE id_evento = '{$id_evento}'");

            if(mysqli_num_rows($sqlEvento) > 0) {

                $evento = mysqli_fetch_assoc($sqlEvento);
                $id = $evento['id_evento'];
                // echo $id;

                $sqlFolder = mysqli_query($conexao, "SELECT * FROM folder WHERE id_evento = '{$id_evento}'");

                if(mysqli_num_rows($sqlFolder) > 0) {

                $folder = mysqli_fetch_assoc($sqlFolder);


?>
                    
                    <div class="catalogo">
                        <!--Thumbnail -->
                        <div class="thumbnail">
                            <img class="img_evento" src="/events4u/painel-empresa/cadastrar-evento/<?php echo $folder['diretorio']; ?>" alt="folder do evento" title="folder do evento">
                        </div>
                        <!-- Conteudo -->
                        <div class="conteudo">
                            <p class="post_titulo">Nome: <?php echo $evento['nome']; ?></p>
                            <p class="post_descricao">Tipo do evento: <?php echo $evento['tipo_evento']; ?></p>
                            <div class="post_meta">
                                <p class="post_data">data do evento: <?php echo date("d/m/Y", strtotime($evento['data_evento'])) ?></p>
                                <p class="post_local">Local do Evento: <?php echo $evento['local_evento']; ?></p>
                                <p class="post_local">Link do ingresso: <a class="post_link" href="<?php echo $evento['link_venda']?>?id=3<?php $id_usuario ?>" target="_blank"><?php echo $evento['link_venda'] ?></a></p>
                            </div>
                        </div>
                        <div class="btn">
                            <a class="btn_evento" href="info.php?id=<?php echo $id; ?>">SAIBA MAIS</a>

                            <a class="btn_sair" title="SAIR DO EVENTO" href="sair.php?id=<?php echo $id; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/></svg>
                            </a>
                        </div>
                    </div>   
                    

<?php
                    }
                }
            }
        }
        else {
?>
        <h2 id="else_evento">Você não está participando de nenhum evento</h2>
<?php
            }  
    
?>

</div>

<h1 class="h1_evento">Eventos que você solicitou a entrada:</h1>

<div class="post-area">
    <?php
    $usuario_solicita = mysqli_query($conexao, "SELECT * FROM usuarios_solicita WHERE id_usuario = '{$id_usuario}'");
    
    if(mysqli_num_rows($usuario_solicita) > 0) {
        while($solicita = mysqli_fetch_assoc($usuario_solicita)) {
            $id_eventoSolicita = $solicita['id_evento'];

            $eventoSolicita = mysqli_query($conexao, "SELECT * FROM eventos WHERE id_evento = '{$id_eventoSolicita}'");

            if(mysqli_num_rows($eventoSolicita) > 0)

            $resultEvento = mysqli_fetch_assoc($eventoSolicita);

            $folderSolicita = mysqli_query($conexao, "SELECT * FROM folder WHERE id_evento = '{$id_eventoSolicita}'");

            $resultFolder = mysqli_fetch_assoc($folderSolicita);

            ?>

                    <div class="catalogo">
                        <!--Thumbnail -->
                        <div class="thumbnail">
                            <img class="img_evento" src="/events4u/painel-empresa/cadastrar-evento/<?php echo $resultFolder['diretorio']; ?>" alt="folder do evento" title="folder do evento">
                        </div>
                        <!-- Conteudo -->
                        <div class="conteudo">
                            <p class="post_titulo">Nome: <?php echo $resultEvento['nome']; ?></p>
                            <p class="post_descricao">Tipo do evento: <?php echo $resultEvento['tipo_evento']; ?></p>
                            <div class="post_meta">
                                <p class="post_data">data do evento: <?php echo date("d/m/Y", strtotime($resultEvento['data_evento'])) ?></p>
                                <p class="post_local">Local do Evento: <?php echo $resultEvento['local_evento']; ?></p>
                            </div>
                        </div>
                        <div class="btn">
                            <a class="btn_evento" href="info.php?id=<?php echo $id_eventoSolicita; ?>">SAIBA MAIS</a>

                            <a class="btn_sair" title="RETIRAR A SOLICITAÇÃO" href="sairSolicita.php?id=<?php echo $id_eventoSolicita; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/></svg>
                            </a>
                        </div>
                    </div>   

            <?php
        }
    }
    else {
        ?>
        <h2 id="else_evento">Nenhuma solicitação pendente</h2>
        <?php
    }
    ?>
</div>


</body>
<script src="../js/header-responsivo.js"></script>
</html>