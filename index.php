<?php
session_start();
    include 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="img/app/favicon.ico">
    <style>
        .navbar{
            margin-bottom: 0;
        }

    </style>
    <title>Guardião Caido | Boosters</title>
</head>
<body>
<?php
    include 'nav.php';
    include 'cabecalho.html';

    $consulta = $con->query('SELECT * FROM produtos');

?>
<div class="container-fluid">
    <div class="row">
        <?php
        if ($consulta->rowCount()>0){
        while($exibir=$consulta->fetch(PDO::FETCH_ASSOC)){


        ?>
        <div class="col-sm-3" style="margin-bottom: 15px;">
            <img src="img/<?php echo $exibir['foto1'];?>" class="img-responsive" style="min-width:100%;">
            <div><h2><?php echo mb_strimwidth($exibir['produto'],0,20,'...');?></h2></div>
            <div><h4><?php echo number_format($exibir['preco'],2,',','.');?></h4></div>
            <div class="text-center">

                <a href="detalhes.php?id=<?php echo $exibir['id'];?>">

                <button class="btn btn-lg btn-block btn-default">
                    <span class="glyphicon glyphicon-info-sign"> Detalhes</span>
                </button>
                </a>
            </div>

            <div class="text-center" style="margin-top: 5px;">
                <?php if ($exibir['quantidade']>0){?>

                <a href="carrinho.php?id=<?php echo $exibir['id'];?>">
                <button class="btn btn-lg btn-block btn-info">
                    <span class="glyphicon glyphicon-shopping-cart"> Comprar</span>
                </button>
                    </a>
               <?php }else{ ?>
                    <button class="btn btn-lg btn-block btn-danger" disabled>
                    <span class="glyphicon glyphicon-ban-circle"> Indísponivel</span>
                </button>
                <?php } ?>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <?php }else{
            echo 'Nenhum Produto Cadastrado!';
    } ?>
</div>

<?php
    include 'footer.html';
?>
</body>
</html>