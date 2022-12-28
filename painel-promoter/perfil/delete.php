<?php
include('../verifica-login.php');
include('/xampp/htdocs/events4u/config.php');

if(isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    $sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario = '{$id_usuario}'");

    if(mysqli_num_rows($sql) > 0 ) {
        $delete = mysqli_query($conexao, "UPDATE usuarios SET online = '0' WHERE id_usuario = '{$id_usuario}'");
        ?>
        <script>
            alert("Conta excluida com sucesso!")
            window.location.replace('/events4u/login-promoter/index.php');
        </script>
        <?php
    }
    else {
        ?>
        <script>
            alert("Não foi possivel excluir sua conta!")
            window.location.replace('/events4u/painel-promoter/perfil/index.php');
        </script>
        <?php
    }
}
?>