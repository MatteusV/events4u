<?php
require_once('/opt/lampp/htdocs/events4u/config.php');
include('../verifica-login.php');

$id_usuario = $_SESSION['id_usuario'];
$id_evento = $_GET['id'];

if($id_usuario == 0 && $id_evento == 0) {
    ?>
    <script>
        alert("Falha ao saber o evento!")
        window.location.replace('/events4u/painel-promoter/dashboard/index.php');
    </script>
    <?php
}

    $verifica = mysqli_query($conexao, "SELECT * FROM usuarios_solicita WHERE id_usuario = '{$id_usuario}' AND id_evento = '{$id_evento}'");

    if(mysqli_num_rows($verifica) > 0) {
        $result = mysqli_query($conexao, "DELETE  FROM usuarios_solicita WHERE id_usuario = '{$id_usuario}' AND id_evento = '{$id_evento}'");

        $verificaDnv = mysqli_query($conexao, "SELECT * FROM usuarios_solicita WHERE id_usuario = '{$id_usuario}' AND id_evento = '{$id_evento}'");

        if(mysqli_num_rows($verificaDnv) > 0) {
            ?>
            <script>
                alert("Falha ao te remover do evento!")
                window.location.replace('/events4u/painel-promoter/dashboard/index.php');
            </script>
            <?php
        }
        else {
            ?>
            <script>
                alert("Você não está mais participando do evento!")
                window.location.replace('/events4u/painel-promoter/dashboard/index.php');
            </script>
            <?php
        }
        
    }

?>