<?php
session_start();
include('/opt/lampp/htdocs/events4u/config.php');

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: ../login-empresa/index-empresa.php');
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT id_empresa, email, senha from empresas where email = '{$email}' and senha = md5('{$senha}') AND online = '1'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);
//echo $row;exit;

if($row == 1) {
    $_SESSION['email'] = $email;
    header('Location: /events4u/painel-empresa/dashboard/index.php');
    exit();
}
else
{
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../login-empresa/index-empresa.php');
    exit();
}
?>