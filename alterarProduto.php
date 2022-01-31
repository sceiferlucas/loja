<?php

include 'conexao.php';
include 'resize-class.php';

$id_prod = $_GET['id'];
$consulta = $con->query("SELECT * FROM produtos WHERE id='$id_prod'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


$recebe_produto = $_POST['produto'];
$recebe_descricao = $_POST['descricao'];
$recebe_categoria = $_POST['categoria'];
$recebe_preco = $_POST['preco'];
$recebe_quantidade = $_POST['quantidade'];
$recebe_tipo = $_POST['tipo'];

$remover1='.';
$recebe_preco = str_replace($remover1, '', $recebe_preco);
$remover2=',';
$recebe_preco = str_replace($remover2, '.', $recebe_preco);

$recebe_foto1 = $_FILES['foto1'];
$recebe_foto2 = $_FILES['foto2'];
$recebe_foto3 = $_FILES['foto3'];


$destino = "img/";


if (!empty($recebe_foto1['name'])) {

    preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1);
    $img_nome1 = md5(uniqid(time())).".".$extencao1[1];

    $upload_foto1=1;

}

else {

    $img_nome1=$exibe['foto1'];
    $upload_foto1=0;

}

if (!empty($recebe_foto2['name'])) {
    preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto2['name'],$extencao2);
    $img_nome2 = md5(uniqid(time())).".".$extencao2[1];
    $upload_foto2=1;

}

else {

    $img_nome2=$exibe['foto2'];
    $upload_foto2=0;

}

if (!empty($recebe_foto3['name'])) {


    preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto2['name'],$extencao3);
    $img_nome3 = md5(uniqid(time())).".".$extencao3[1];
    $upload_foto3=1;

}

else {

    $img_nome3=$exibe['foto3'];
    $upload_foto3=0;

}


try {

    $alterar = $con->query("UPDATE produtos SET
	
	produto = '$recebe_produto',
	descricao = '$recebe_descricao',
	categoria = '$recebe_categoria',
	preco = '$recebe_preco',
	foto1 = '$img_nome1',
	foto2 = '$img_nome2',
	foto3 = '$img_nome3',
    quantidade = '$recebe_quantidade',
    tipo = '$recebe_tipo'
	
	WHERE id = '$id_prod'
	
	");


    if ($upload_foto1==1) {


        move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);

    }



    if ($upload_foto2==1) {

        move_uploaded_file($recebe_foto2['tmp_name'], $destino.$img_nome2);


    }

    if ($upload_foto3==1) {

        move_uploaded_file($recebe_foto3['tmp_name'], $destino.$img_nome3);


    }

    header('location:adm.php');

} catch(PDOException $e) {


    echo $e->getMessage();

}

?>