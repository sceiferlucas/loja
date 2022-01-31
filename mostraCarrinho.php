<div class="container-fluid">

    <div class="row text-center" style="margin-top: 15px;">
        <h1>Carrinho de Compras</h1>
    </div>


    <?php
    if (!isset($_SESSION['carrinho'])){

        $_SESSION['carrinho'] = array();
    }

    $total = null;
    foreach ($_SESSION['carrinho'] as $id => $qnt)  {
        $consulta = $con->query("SELECT * FROM produtos WHERE id='$id'");
        $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
        $produto = $exibe['produto'];
        $preco = number_format(($exibe['preco']),2,',','.');
        $total += $exibe['preco'] * $qnt;

        ?>





        <div class="row" style="margin-top: 15px;">



            <div class="col-sm-1 col-sm-offset-1">
                <img src="img/<?php echo $exibe['foto1']; ?>" class="img-responsive">
            </div>


            <div class="col-sm-4">
                <h4 style="padding-top:20px"><?php echo $produto; ?></h4>
            </div>


            <div class="col-sm-2">
                <h4 style="padding-top:20px">R$ <?php echo $preco; ?></h4>
            </div>
            <div class="col-sm-2" style="padding-top:20px">
                <h4><?php echo $qnt; ?> </h4>
            </div>

            <div class="col-sm-1 col-xs-offset-right-1" style="padding-top:20px">

                <a href="removeCarrinho.php?id=<?php echo $id;?>">
                    <button class="btn btn-lg btn-block btn-danger">
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>
                </a>
            </div>

        </div>


    <?php } ?>