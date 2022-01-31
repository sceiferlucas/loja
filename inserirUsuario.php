<?php
    include 'conexao.php';
    $recebe_nome = $_POST['nome'];
    $recebe_sobrenome = $_POST['sobrenome'];
    $recebe_email = $_POST['email'];
    $recebe_senha = $_POST['senha'];
    $recebe_endereco = $_POST['endereco'];
    $recebe_cidade = $_POST['cidade'];
    $recebe_cep = $_POST['cep'];

    $remover=array('-', ' ');
    $recebe_cep = str_replace($remover, '', $recebe_cep);

//    echo $recebe_nome.'<br>';
//    echo $recebe_sobrenome.'<br>';
//    echo $recebe_email.'<br>';
//    echo $recebe_senha.'<br>';
//    echo $recebe_endereco.'<br>';
//    echo $recebe_cidade.'<br>';
//    echo $recebe_cep.'<br>';

$consulta = $con->query("SELECT email FROM usuarios WHERE email='$recebe_email'");

if ($consulta->rowCount()==1){
    header('location:erro1.php');
}else{
    try {

        $incluir = $con->query("INSERT INTO usuarios (nome, sobrenome, email, senha, endereco, cidade, cep, adm) VALUES ('$recebe_nome', '$recebe_sobrenome', '$recebe_email', '$recebe_senha', '$recebe_endereco', '$recebe_cidade', '$recebe_cep', '0')");

        header('location:ok.php');
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}