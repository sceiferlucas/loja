<!doctype html>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Guardião Caido - Area do Usuario</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>

        .navbar{
            margin-bottom: 0;
        }


    </style>



</head>

<body>

<?php

session_start();

if (empty($_SESSION['id'])){
    header('location:formLogon.php');
}

include 'conexao.php';
include 'nav.php';
include 'cabecalho.html';

$id_user = $_SESSION['id'];

$consultaVenda = $con->query("SELECT * FROM vendas WHERE id_comprador='$id_user'");


?>

<div class="container-fluid">

    <div class="row" style="margin-top: 15px;">
        <h1 class="text-center">Minhas Compras</h1>
    </div>


    <div class="row" style="margin-top: 15px;">

        <div class="col-sm-1 col-sm-offset-1"><h4>Data</h4></div>
        <div class="col-sm-2"><h4>Ticket</h4></div>
        <div class="col-sm-5"><h4>Produto</h4></div>
        <div class="col-sm-1"><h4>Quantidade</h4></div>
        <div class="col-sm-2"><h4>Preço</h4></div>

    </div>

    <?php while ($exibeVenda = $consultaVenda->fetch(PDO::FETCH_ASSOC)){ ?>
    <div class="row" style="margin-top: 15px;">

        <div class="col-sm-1 col-sm-offset-1"> <?php echo date('d/m/Y',strtotime($exibeVenda['data']));?></div>
        <div class="col-sm-2"> <?php echo $exibeVenda['ticket'];?></div>
        <?php $consultaProd = $con->query("SELECT produto FROM produtos WHERE id='$exibeVenda[id_produto]'");
        $exibeProd = $consultaProd->fetch(PDO::FETCH_ASSOC)?>
        <div class="col-sm-5"><?php echo $exibeProd['produto']; ?></div>
        <div class="col-sm-1"><?php echo $exibeVenda['quantidade']; ?></div>
        <div class="col-sm-2">R$ <?php echo number_format($exibeVenda['valor'],2,',',',');?></div>

</div>

    <?php } ?>

<?php

include 'footer.html';

?>

</body>
</html>