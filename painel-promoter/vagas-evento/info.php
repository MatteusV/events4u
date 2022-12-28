<?php
include('../verifica-login.php');
include('/xampp/htdocs/events4u/config.php');

$id_usuario = $_SESSION['id_usuario'];

$promoter = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario = '{$id_usuario}'");

 $resultSql = mysqli_fetch_assoc($promoter);


$id_evento = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Informações sobre o evento</title>
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

        <li class="sidebar-item">
            <a class="sidebar-link" href="../dashboard/index.php">
                <i class="align-middle" data-feather="sliders">
                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-columns" viewBox="0 0 16 16">
                    <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V2zm8.5 0v8H15V2H8.5zm0 9v3H15v-3H8.5zm-1-9H1v3h6.5V2zM1 14h6.5V6H1v8z"/>
                    </svg>
                </i>
                <span class="align-middle">Dashboard</span>
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

<div id="voltar">
        <a href="index.php">Voltar</a>
</div>

<h2 class="subtitle">Atrações do evento:</h2>
<div class="container">
    <button class="arrow-left control" aria-label="Previous image">◀</button>
    <button class="arrow-rigth control" aria-label="Next image">▶</button>
    <div class="gallery-wrapper">
        <div class="gallery">
<?php

$atracao = mysqli_query($conexao, "SELECT * FROM atracao WHERE id_evento = '{$_GET['id']}' ORDER BY hr_atracao ASC");

if(mysqli_num_rows($atracao) > 0) {
    while($user_atracao = mysqli_fetch_assoc($atracao)) {


?>
            <div class="item current-item">
                <div class="img_slide">
                    <img class="item_img" src="/events4u/painel-empresa/cadastrar-evento/<?php echo $user_atracao['diretorio_img_atracao'] ?>" alt="" title="">
                </div>

                <p class="infoAtracao">Nome: <?php echo $user_atracao['nome_atracao'] ?></p>
                <p class="infoAtracao">Data: <?php echo date("d/m/Y", strtotime($user_atracao['dt_atracao'])) ?> </p>
                <p class="infoAtracao">Hora: <?php echo date("H:i", strtotime($user_atracao['hr_atracao']))?></p>


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
<h2 class="subtitle">Patrocinadores do evento</h2>

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
                <img id="img_patrocinador" src="/events4u/painel-empresa/cadastrar-evento/<?php echo $user_patrocinador['diretorio_img_patrocinador'];?>" alt="Foto do patrocinador">

            <div class="infoPatrocinador">
                <p class="nome">Nome: <?php echo $user_patrocinador['nm_patrocinador'] ?></p>
            </div>

            </div>


<?php
    }
}
else {
    ?>
    <h2 class="subtitleElse">Nenhum pratrocinador cadastrado nesse evento</h2>
    <?php
}
?>
        </div>
    </div>
</div>


<h2 class="subtitle">Empresa responsável pelo evento</h2>
<div class="empresa">
<?php
    $sqlEvento = mysqli_query($conexao, "SELECT * FROM eventos WHERE id_evento = '{$id_evento}'");

    if(mysqli_num_rows($sqlEvento) > 0) {
        $resultEvento = mysqli_fetch_assoc($sqlEvento);
        $id_empresa = $resultEvento['id_empresa'];

        $sqlEmpresa = mysqli_query($conexao, "SELECT * FROM empresas WHERE id_empresa = '{$id_empresa}'");

        $resultEmpresa = mysqli_fetch_assoc($sqlEmpresa);
?>
<div class="catalogo_empresa">       
    <img id="img_empresa" src="/events4u/painel-empresa/perfil/<?php echo $resultEmpresa['foto'];?>" alt="Foto de perfil da empresa" title="Foto do promoter">

    <p class="infoEmpresa">Nome:<br> <?php echo $resultEmpresa['nome'] ?></p>

    <p class="infoEmpresa">Email: <br><a class="link_empresa" target="_BLANK" href="mailto:<?php echo $resultEmpresa['email']?>?subject=Olá, sou <?php echo $resultSql['nome']?>, promoter do(a): <?php echo $resultEvento['nome']?>"><?php echo $resultEmpresa['email'] ?></a></p>

    <p class="infoEmpresa">Telefone: <br><a class="link_empresa" target="_BLANK" href=" https://wa.me/55<?php echo $resultEmpresa['telefone']?>?text=Olá,%20sou%20<?php echo $resultSql['nome']?>,%20promoter%20do(a):%20<?php echo $resultEvento['nome'] ?>"><?php echo $resultEmpresa['telefone'] ?></a></p>

    <p class="infoEmpresa">CNPJ:<br><?php echo $resultEmpresa['cnpj']?></p>

</div>
<?php
    }
?>
</div>

</body>
<script src="/events4u/carrossel.js"></script>
<script src="/events4u/carrossel-patrocinador.js"></script>
</html>