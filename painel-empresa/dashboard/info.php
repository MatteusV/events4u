
<?php
include('../verifica-login-empresa.php');
require_once('/opt/lampp/htdocs/events4u/config.php');
$id_evento = $_GET['id'];
// echo $id_evento;

$sqlEvento = mysqli_query($conexao, "SELECT * FROM eventos WHERE id_evento = '{$id_evento}'");
$resultEvento = mysqli_fetch_assoc($sqlEvento);

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

    <title>Informações do evento</title>
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
                    <a class="sidebar-link" href="index.php">
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


    <div id="voltar">
        <a href="index.php">Voltar</a>
    </div>


    <h2 class="subtitle">Informações do evento:</h2>

<div class="evento">
        <?php
        $id = $_GET['id'];

        $infoEvento = mysqli_query($conexao, "SELECT * FROM eventos WHERE id_evento = '{$id}'");

        if(mysqli_num_rows($infoEvento) > 0) {

            $evento = mysqli_fetch_assoc($infoEvento);

        ?>
        <form class="form_evento" action="../cadastrar-evento/editEvento.php<?php echo "?id=". $id_evento?>" name="evento" method="post">
            <fieldset>
            <legend><b>Atualizar Informações do evento</b></legend>

                <div class="inputBox">
                    <input type="text" name="nome_evento" id="nome_evento" class="inputUser" value="<?php echo $evento['nome']; ?>">
                    <label for="nome_evento" class="labelInput">Nome do evento:</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="tipo_evento" id="tipo_evento" class="inputUser" value="<?php echo $evento['tipo_evento']; ?>">
                    <label for="tipo_evento" list="eventoslist" class="labelInput">Tipo do evento:</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="date" name="data_evento" id="data_evento" class="inputUser" value="<?php echo $evento['data_evento']; ?>">
                    <label for="data_evento" class="labelInput">Data do evento:</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="local_evento" id="local_evento" class="inputUser" value="<?php echo $evento['local_evento']; ?>">
                    <label for="local_evento" class="labelInput">Local do evento:</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $evento['cidade']; ?>">
                    <label for="cidade" class="labelInput">Cidade do evento:</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="seguidores" id="seguidores" class="inputUser" value="<?php echo $evento['n_seguidores']; ?>">
                    <label for="seguidores" class="labelInput">Seguidores necessário:</label>
                </div>
                <br>
                <br>
                <div class="inputBox">
                    <input type="url" name="venda" id="venda" class="inputUser" value="<?php echo $evento['link_venda']; ?>">
                    <label for="seguidores" class="labelInput">Link de venda dos ingressos:</label>
                </div>
                <br>

                <input type="submit" class="update" name="update" id="update" value="Atualizar" onclick="atualizado()" >

            </fieldset>

            
    <datalist id="eventoslist">
            <option>Eventos corporativos</option>
            <option>Eventos acadêmicos</option>
            <option>Eventos de entretenimento</option>
            <option>Eventos esportivos</option>
    </datalist>

        </form>

        <form class="form_evento" method="POST" enctype="multipart/form-data" action="../cadastrar-evento/insertAtracao.php<?php echo "?id=". $id_evento?>">
            <fieldset>    
                <legend><b>Adicionar atração do evento</b></legend>

                <div class="inputBox">
                    <input type="text" name="nome_atracao" id="nome_atracao" class="inputUser" required>
                    <label for="nome_atracao" class="labelInput">Nome da atração</label>
                </div>
                <br>

                <div class="inputBox">
                    <input type="date" name="data_atracao" id="data_atracao" class="inputUser" required>
                    <label for="data_atracao" class="labelInput">Dia da atração</label>
                </div>
                <br>

                <div class="inputBox">
                    <input type="time" name="hora_atracao" id="hora_atracao" class="inputUser" required>
                    <label for="hora_atracao" class="labelInput">Hora da apresentação</label>
                </div>
                <br>
                <label for="foto_atracao">Foto da atração</label><br>
                <input type="file" name="foto_atracao" id="foto_atracao" accept="image/*" >

                <input type="submit" class="update" name="add_atracao" id="add_atracao" value="Adicionar atração">
            </fieldset>
        </form>

        <form class="form_evento" enctype="multipart/form-data" method="POST" action="../cadastrar-evento/insertPatrocinador.php<?php echo "?id=". $id_evento?>">
            <fieldset>
                <legend><b>Adicionar patrocinador</b></legend>

                <div class="inputBox">
                    <input type="text" name="nome_patrocinador" id="nome_patrocinador" class="inputUser" required>
                    <label for="nome_patrocinador" class="labelInput">Nome do patrocinador</label>
                </div>
                <br>
                <label for="foto_patrocinador">Foto do patrocinador</label><br>
                <input type="file" name="foto_patrocinador" id="foto_patrocinador" accept="image/*" required>

                <input type="submit" class="update" name="add_patrocinador" id="add_patrocinador" value="Adicionar patrocinador">
            </fieldset>
        </form>


    <!-- <form class="form_evento" action="insertConteudo.php<?php echo "?id=". $id_evento?>" enctype="multipart/form-data" method="post">
        <fieldset>
            <legend><b>Adicionar conteudo para o promoter</b></legend>
                <div class="inputBox">
                        <input type="msg" name="texto" id="texto" class="inputUser" maxlength="100">
                        <label for="texto" class="labelInput">Texto para o post se necessario</label>
                </div>
                <br>
                <label for="foto_conteudo">Foto para o post:</label><br>
                <input type="file" name="foto_conteudo" id="foto_conteudo" accept="image/*" required>

                <input type="submit" class="update" name="add_conteudo" id="add_conteudo" value="Enviar">

        </fieldset>
    </form> -->
    
</div>
<?php 
        }
?>

<h2 class="subtitle">Atrações do evento:</h2>



<div class="container">
    <button class="arrow-left control" aria-label="Previous image">◀</button>
    <button class="arrow-rigth control" aria-label="Next image">▶</button>
    <div class="gallery-wrapper">
        <div class="gallery">
<?php

$atracao = mysqli_query($conexao, "SELECT * FROM atracao WHERE id_evento = '{$id_evento}' ORDER BY hr_atracao ASC");

if(mysqli_num_rows($atracao) > 0) {
    while($user_atracao = mysqli_fetch_assoc($atracao)) {


?>
            <div class="item current-item">
                <div class="img_slide">
                    <img class="item_img" src="../cadastrar-evento/<?php echo $user_atracao['diretorio_img_atracao'] ?>" alt="" title="">
                </div>

                <p class="infoAtracao">Nome: <?php echo $user_atracao['nome_atracao'] ?></p>
                <p class="infoAtracao">Data: <?php echo date("d/m/Y", strtotime($user_atracao['dt_atracao'])) ?> </p>
                <p class="infoAtracao">Hora: <?php echo date("H:i", strtotime($user_atracao['hr_atracao']))?></p>

                <div class="edit_atracao">
                    <a href="../cadastrar-evento/deleteAtracao.php?<?php echo "id=". $user_atracao['id_atracao']?>&evento=<?php echo $_GET['id']; ?>">
                        <svg class="btn_lixo" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a>
                </div>

            </div>

<?php
    }
}
else {
    ?>
    <h2 class="subtitleElse">Nenhuma atração cadastrada no seu evento</h2>
    <?php
}
?>
        </div>
    </div>
</div>

<br><br>

<h2 class="subtitle">Patrocinadores do evento:</h2>

<div class="patrocinador">
    <button class="esquerda controle" aria-label="Previous image">◀</button>
    <button class="direita controle" aria-label="Next image">▶</button>
    <div class="galeria-wrapper">
        <div class="galeria">           
<?php
    $sqlPatrocinador = mysqli_query($conexao,"SELECT * FROM patrocinador WHERE id_evento = '{$id_evento}'");
    
    if(mysqli_num_rows($sqlPatrocinador) > 0 ) {

        while($user_patrocinador = mysqli_fetch_assoc($sqlPatrocinador)){

?>

            <div class="catalogoPatrocinador foco">
                <img id="img_patrocinador" src="../cadastrar-evento/<?php echo $user_patrocinador['diretorio_img_patrocinador'];?>" alt="Foto do patrocinador">

            <div class="infoPatrocinador">
                <p class="nome">Nome: <?php echo $user_patrocinador['nm_patrocinador'] ?></p>
            </div>

            <div class="edit_patrocinador">
                <a href="../cadastrar-evento/deletePatrocinador.php?<?php echo "id=". $user_patrocinador['id_patrocinador']?>&evento=<?php echo $_GET['id']; ?>">
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
else {
    ?>
    <h2 class="subtitleElse">Nenhum pratrocinador cadastrado no seu evento</h2>
    <?php
}
?>
        </div>
    </div>
</div>


    <h2 class="subtitle">Solicitação dos promoters:</h2>
<div class="promoter">
    <?php
    
    $sqlSolicitacao = mysqli_query($conexao, "SELECT * FROM usuarios_solicita WHERE id_evento = '{$id_evento}'");
    
    if(mysqli_num_rows($sqlSolicitacao) > 0 ) {
        while($resultSolicitacao = mysqli_fetch_assoc($sqlSolicitacao)) {
        
        $sqlUsuarioSolicitado = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario = '{$resultSolicitacao['id_usuario']}'");

        if(mysqli_num_rows($sqlUsuarioSolicitado) > 0) {
            $resultUsuarioSolcitado = mysqli_fetch_assoc($sqlUsuarioSolicitado);
            ?>

                <div class="catalogoPromoter">
                    
                    <img id="img_solicitacao" src="/events4u/painel-promoter/perfil/<?php echo $resultUsuarioSolcitado['foto'];?>" alt="Foto do perfil do promoter" title="Foto do promoter">

                    <p class="infoPromoter">Nome:<br> <?php echo $resultUsuarioSolcitado['nome'] ?></p>

                    <p class="infoPromoter">Email: <br><a class="link_promoter" target="_BLANK" href="mailto:<?php echo $resultUsuarioSolcitado['email']?>?subject=<?php echo $resultEvento['nome'] ?>"><?php echo $resultUsuarioSolcitado['email'] ?></a></p>

                    <p class="infoPromoter">Telefone: <br><a class="link_promoter" target="_BLANK" href=" https://wa.me/55<?php echo $resultUsuarioSolcitado['telefone']?>?text=Olá,%20é%20<?php echo $resultEvento['nome'] ?>"><?php echo $resultUsuarioSolcitado['telefone'] ?></a></p>

                    <p class="infoPromoter">Instagram:<br> <a class="link_promoter" href="<?php echo $resultUsuarioSolcitado['instagram'] ?>" target="_blank"><?php echo $resultUsuarioSolcitado['instagram'] ?></a></p>


                        <div class="edit_promoter">

                        <a title="Recusar o promoter" href="recusar.php?id=<?php echo $resultUsuarioSolcitado['id_usuario']?>&evento=<?php echo $_GET['id']; ?>>">
                            <svg class="btn_lixo" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>

                        <a title="Aceitar o promoter" href="aceitar.php?id=<?php echo $resultUsuarioSolcitado['id_usuario']?>&evento=<?php echo $_GET['id'] ?>">
                            <svg class="btn_check" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
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
    <h2 class="subtitleElse">Nenhuma solicitação de promoters</h2>
    <?php
}


    ?>
</div>


    <h2 class="subtitle">Promoters que estão participando:</h2>

<div class="promoter-um">
    <button class="left control_promoter" aria-label="Previous image">◀</button>
    <button class="rigth control_promoter" aria-label="Next image">▶</button>
    <div class="promoter-wrapper">
        <div class="galeriaPromoter">
<?php
    $sqlPromoterEventos = mysqli_query($conexao, "SELECT * FROM usuarios_eventos WHERE id_evento = '{$id_evento}'");

    if(mysqli_num_rows($sqlPromoterEventos) > 0){
        while($promoter = mysqli_fetch_assoc($sqlPromoterEventos)){

        $id_promoter = $promoter['id_usuario'];

        $sqlPromoter = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario = '{$id_promoter}'");

        $sqlResult = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario = '{$id_promoter}'");

        $resultPromoter = mysqli_fetch_assoc($sqlResult);


?>
            <div class="catalogo_promoter focoPromoter">
            
            <img id="img_promoter" src="/events4u/painel-promoter/perfil/<?php echo $resultPromoter['foto'];?>" alt="Foto do perfil do promoter" title="Foto do promoter">
        
            <p class="infoPromoter">Nome:<br> <?php echo $resultPromoter['nome'] ?></p>
            <p class="infoPromoter">Email: <br><a class="link_promoter" target="_BLANK" href="mailto:<?php echo $resultPromoter['email']?>?subject=<?php echo $resultEvento['nome'] ?>"><?php echo $resultPromoter['email'] ?></a></p>
            <p class="infoPromoter">Telefone: <br><a class="link_promoter" target="_BLANK" href=" https://wa.me/55<?php echo $resultPromoter['telefone']?>?text=Olá,%20é%20<?php echo $resultEvento['nome'] ?>"><?php echo $resultPromoter['telefone'] ?></a></p>
            <p class="infoPromoter">Instagram:<br> <a class="link_promoter" href="<?php echo $resultPromoter['instagram'] ?>" target="_blank"><?php echo $resultPromoter['instagram'] ?></a></p>
                <div class="edit_promoter">
                    <a href="deletePromoter.php?id=<?php echo $resultPromoter['id_usuario']?>&evento=<?php echo $_GET['id']; ?>">
                        <svg class="btn_lixo" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                    </a>
                </div>
            </div>
<?php
        }
    }
    else {
        ?>
        <h2 class="subtitleElse">Nenhum promoter cadastrado no seu evento</h2>
        <?php
    }
?>
        </div>
    </div>
</div>

</body>

<script src="/events4u/carrossel.js"></script>
<script src="/events4u/carrossel-patrocinador.js"></script>
<script src="/events4u/carrossel-promoter.js"></script>
</html>