<?php
include('../verifica-login-empresa.php');
include('/xampp/htdocs/events4u/config.php');

    if(isset($_GET['id'])) {
        $id_usuario = $_GET['id'];
        $id_evento = $_GET['evento'];
       
        $sql = mysqli_query($conexao, "SELECT * FROM usuarios_solicita WHERE id_usuario = '{$id_usuario}' AND id_evento = '{$id_evento}'");

        $info = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) > 0) {
            $aceito = mysqli_query($conexao ,"INSERT INTO usuarios_eventos (id_usuario, id_evento) VALUES ($id_usuario, $id_evento)");

            $verifica = mysqli_query($conexao, "SELECT * FROM usuarios_eventos WHERE id_usuario = '{$id_usuario}' AND id_evento = '{$id_evento}'");

            if(mysqli_num_rows($verifica) == 1) {
                $delete = mysqli_query($conexao, "DELETE FROM usuarios_solicita WHERE id_solicita = '{$info['id_solicita']}'");

                ?>
                <script>
                    alert("Promoter aceito com sucesso!")
                    window.location.replace('/events4u/painel-empresa/dashboard/info.php?id=<?php echo $id_evento ?>');
                </script>
                <?php
            }
        }

    }
   
?>