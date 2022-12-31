<?php
require_once('/opt/lampp/htdocs/events4u/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../home-page/css/style.css">
    <title>Home</title>
</head>

<body>

    <div class="header">

        <button onclick="toggleSideBar()" class="btn_icon_header">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
        </button>
        <div class="logo_header">
            <img class="img_logo_header" src="img/Events4u(branco).png" alt="Logo Events4U">
        </div>

        <div class="navigation_header">
            <a href="#container_evento">Home</a>
            <a href="../painel-empresa/cadastrar-evento/index.php">Divulgue seu evento</a>
            <a href="../painel-promoter/dashboard/index.php">Seja promoter</a>            
            <a href="#quemsomos">Quem somos?</a>
        </div>
    
    </div>


     <div tabindex="0" onclick="closeSidebar()" class="container_evento" id="container_evento">
        <img class="fundo_evento" src="img/fundo.jpeg" alt="Evento de musica">
        <h1 id="h1_evento">À procura de promoters para seu evento!?</h1>
        <p id="p_evento">Temos a solução para isso!</p>
        <button id="link_evento" onclick="empresa()">Procure agora mesmo</button>
     </div>

     <div class="informativo">
        <h2 id="h2_evento">Qual a importância de ter um promoter no seu evento?</h2>
        <br>
        <p id="p2_evento">Se você ainda não trabalha com promoters, talvez seja o momento de repensar essa atitude. Os bons profissionais dessa área costumam apresentar algumas características fundamentais na hora de ajudar na divulgação do seu evento, como boa comunicação, articulação e influência com o seu público-alvo.
        Os promoters são a imagem do seu evento – e por isso devem ser escolhidos de forma criteriosa, sendo responsáveis por dialogarem com seu público, indicarem DJs e bandas, conseguirem apoio e patrocínio e, principalmente, influenciar as pessoas que você deseja ver no seu evento, aumentando as suas vendas.       
        Atualmente, a atuação do promoter vai ainda mais longe, já que esse profissional também pode influenciar digitalmente o seu público, com uma presença sólida nas redes sociais, ampliando ainda mais a sua divulgação e a penetração do seu evento.</p>
    </div>
     
     <div tabindex="0" onclick="closeSidebar()" class="container_promoter" id="container_promoter">
        <img class="fundo_promoter" src="img/balada.jpg" alt="">
        <h1 id="h1_promoter">À procura de eventos para ser promoter!?</h1>
        <p id="p_promoter">Cadastre-se como promoter e concorra pelas vagas</p>
        <button id="link_promoter" onclick="promoter()">Concorra agora mesmo</button>
     </div>

     <div class="informativo">
        <h2 id="h2_promoter">Qual a função de um promoter de festa?</h2>
        <br>
        <p id="p2_promoter">O promotor de eventos é responsável pela criação e execução de ações promocionais como ativação e destaque de marcas, negócios e eventos em geral. Ele atua como um representante dos seus clientes, expõe e propaga a imagem do evento para o seu público-alvo de forma a atrair convidados e participantes.</p>
        <br><br>
        <h2 id="h2_promoter">Como é ser promoter de balada?</h2>
        <br>
        <p id="p2_promoter">O promoter de balada é aquele profissional responsável por organizar, popularizar e divulgar uma balada nas etapas que antecedem o seu acontecimento. De uma forma certeira, o promoter é essencial para o sucesso ou o fracasso de um evento.</p>
    </div>


    <footer>
        
        <div class="footerBorder">

            <img onclick="linkHome()" id="imgFooter" src="./img/Events4u(branco).png" alt="" srcset=""><span onclick="linkHome()">EVENTS4U</span>


            <a id="emailSuporte" target="_BLANK" href="mailto:suporte@events4u.com">suporte@events4u.com</a>
        </div>

    </footer>

</body>
<script src="js/header-responsivo.js"></script>
<script>

function linkHome() {
    window.location.replace('/events4u/home-page/home.php');
} 

    function empresa() {

        var x;
        var r=confirm("Tem certeza que deseja sair?");
        if (r==true)
        {
        x= window.location.replace('/events4u/login-empresa/index-empresa.php');
        }
        else
        {
        x= window.location.reload('/events4u/home-page/home.php');
        }

    }

    function promoter() {

        var x;
        var r=confirm("Tem certeza que deseja sair?");
        if (r==true)
        {
        x= window.location.replace('/events4u/login-promoter/index.php');
        }
        else
        {
        x= window.location.reload('/events4u/home-page/home.php');
        }

    }

</script>
</html>