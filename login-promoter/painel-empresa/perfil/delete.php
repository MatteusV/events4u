<?php
include('../verifica-login-empresa.php');
include('/xampp/htdocs/events4u/config.php');

if(isset($_GET['id'])) {
    $id_empresa = $_GET['id'];

    $sql = mysqli_query($conexao, "SELECT * FROM empresas WHERE id_empresa = '{$id_empresa}'");

    if(mysqli_num_rows($sql) > 0 ) {
        $delete = mysqli_query($conexao, "UPDATE empresas SET online = '0' WHERE id_empresa = '{$id_empresa}");
        ?>
        <script>
            alert("Conta excluida com sucesso!")
            window.location.replace('/events4u/login-empresa/index-empresa.php');
        </script>
        <?php
    }
    else {
        ?>
        <script>
            alert("Não foi possivel excluir sua conta!")
            window.location.replace('/events4u/painel-empresa/perfil/index.php');
        </script>
        <?php
    }
}

?>