<?php
include('/xampp/htdocs/events4u/login-promoter/verifica-login.php');
include('/xampp/htdocs/events4u/config.php');

$id_usuario = $_SESSION['id_usuario'];
$id_evento = $_GET['id'];

    if($id_evento == 0 && $id_usuario == 0  ) {
        echo "Esse evento/usuario não existe";
        header('Location: index.php');
        exit();

    }
    else {

        $verifica_evento = mysqli_query($conexao, "SELECT * FROM usuarios_eventos WHERE id_usuario = '{$id_usuario}' AND id_evento = '{$id_evento}'");

            if(mysqli_num_rows($verifica_evento) > 0) {
                ?>
                <script>
                    alert("Você já está participando do evento!")
                    window.location.replace('/events4u/painel-promoter/dashboard/index.php');
                </script>
                <?php
            }
            else {

                $verifica_qtdPromoters = mysqli_query($conexao, "SELECT * FROM usuarios_eventos WHERE id_evento = '{$id_evento}'");

                $row = mysqli_num_rows($verifica_qtdPromoters);

                $verifica_maxPromoter = mysqli_query($conexao, "SELECT * FROM eventos WHERE id_evento = '{$id_evento}'");

                $promoter = mysqli_fetch_assoc($verifica_maxPromoter);

                if($row >= $promoter['qtd_promoter']) {
                    ?>
                <script>
                    alert("Atingiu a quantidade maxima de promoters no evento")
                    window.location.replace('/events4u/painel-promoter/vagas-evento/index.php');
                </script>
                <?php
                }
                else {
                $verifica = mysqli_query($conexao, "SELECT * FROM usuarios_solicita WHERE id_usuario = '{$id_usuario}' AND id_evento = '{$id_evento}'");

                if(mysqli_num_rows($verifica) == 0) {

                    $result = mysqli_query($conexao, "INSERT INTO usuarios_solicita (id_usuario, id_evento) VALUE ('{$id_usuario}', '{$id_evento}')");
                    ?>
                    <script>
                        alert("Solicitação enviada para o evento!")
                        window.location.replace('/events4u/painel-promoter/dashboard/index.php');
                    </script>
                    <?php
                }
                else {
                    ?>
                    <script>
                        alert("Você já enviou uma solicitação!")
                        window.location.replace('/events4u/painel-promoter/vagas-evento/index.php');
                    </script>
                    <?php
                }
            }
    }
}
?>