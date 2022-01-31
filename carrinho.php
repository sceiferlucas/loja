<!doctype html>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Guardião Caido - Carrinho de Compras</title>

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

    header('Location:formLogon.php');

}


include 'conexao.php';
include 'nav.php';
include 'cabecalho.html';


    if (!empty($_GET['id'])) {

    $id_prod=$_GET['id'];


    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }




    if (!isset($_SESSION['carrinho'][$id_prod])) {

        $_SESSION['carrinho'][$id_prod]=1;
    }

    else {
        $_SESSION['carrinho'][$id_prod]+=1;

    }

    include 'mostraCarrinho.php';

} else {



    include 'mostraCarrinho.php';


}

?>


<div class="row text-center" style="margin-top: 15px;">
    <h1>Total: R$ <?php echo number_format($total,2,',','.');?></h1>
</div>

<div class="row text-center" style="margin-top: 15px;">
    <a href="index.php"><button class="btn btn-lg btn-primary">Continuar Comprando</button></a>

    <?php if (count($_SESSION['carrinho'])>0) { ?>
    <a href="finalizarCompra.php"><button class="btn btn-lg btn-success">Finalizar Compra</button></a>
        <br><br>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="KWK522L9QH8QS">
            <input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
        </form>
    <?php } ?>
</div>

</div>


<?php

include 'footer.html';

?>
</body>
</html>