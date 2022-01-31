<!doctype html>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Guardião Caido - Detalhes</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="lightbox.css" rel="stylesheet">
    <script src="lightbox.js"></script>
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

include 'conexao.php';
include 'nav.php';
include 'cabecalho.html';

if (!empty($_GET['id'])){



$id_produto = $_GET['id'];
$consulta = $con->query("SELECT * FROM produtos WHERE id='$id_produto'");
$exibir = $consulta->fetch(PDO::FETCH_ASSOC);

}else{
    header('location:index.php');
}


?>

<div class="container-fluid">



    <div class="row">

        <div class="col-sm-4 col-sm-offset-1">

            <h1>Detalhes do Produto</h1>

            <a href="img/<?php echo $exibir['foto1'];?>" data-lightbox="galeria" data-title="<?php echo $exibir['produto'];?>">
            <img src="img/<?php echo $exibir['foto1'];?>" class="img-responsive" style="width:100%;">
            </a>

            <?php if ($exibir['foto2'] AND $exibir['foto3']!="") {?>
            <a href="img/<?php echo $exibir['foto2'];?>" data-lightbox="galeria" data-title="<?php echo $exibir['produto'];?>">
            <div class="col-sm-4 col-sm-offset-1" style="margin-top: 10px;"><img src="img/<?php echo $exibir['foto2'];?>" class="img-responsive"></div>
            </a>
            <a href="img/<?php echo $exibir['foto3'];?>" data-lightbox="galeria" data-title="<?php echo $exibir['produto'];?>">
            <div class="col-sm-4 col-sm-offset-1" style="margin-top: 10px;"><img src="img/<?php echo $exibir['foto3'];?>" class="img-responsive"></div>
            </a>
            <?php } ?>
        </div>


        <div class="col-sm-7"><h1><?php echo $exibir['produto'];?></h1>

            <p><?php echo nl2br($exibir['descricao']);?></p>

            <p><?php echo $exibir['categoria'];?></p>

            <p>R$ <?php echo number_format($exibir['preco'],2,',','.');?></p>

            <a href="carrinho.php?id=<?php echo $exibir['id'];?>">
                <?php if ($exibir['quantidade']>0){?>
            <button class="btn btn-lg btn-success">Comprar</button>
            </a>
            <?php }else{ ?>
                <button class="btn btn-sm btn-block btn-danger" disabled style="width: 150px;">
                    <span class="glyphicon glyphicon-ban-circle"> Indísponivel</span>
                </button>
            <?php } ?>

        </div>



    </div>

    <?php

    include 'footer.html';

    ?>

</body>
</html>