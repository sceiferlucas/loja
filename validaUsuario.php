<?php
session_start();
    include 'conexao.php';
    $recebe_email = $_POST['email'];
    $recebe_senha = $_POST['senha'];

//echo $recebe_email.'<br>';
//echo $recebe_senha.'<br>';

$consulta = $con->query("SELECT id_usuario, email, senha, adm FROM usuarios WHERE email='$recebe_email' AND senha='$recebe_senha'");

if ($consulta->rowCount()==1){
    $exibeUser = $consulta->fetch(PDO::FETCH_ASSOC);

    if($exibeUser['adm']==0){

    $_SESSION['id']=$exibeUser['id_usuario'];
    $_SESSION['adm']=0;


    header('Location:index.php');
    }else{
        $_SESSION['id']=$exibeUser['id_usuario'];
        $_SESSION['adm']=1;

        header('Location:index.php');
    }
}else{
    header('Location:erro.php');
}