<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/app/icone.fw.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home<span class="sr-only">(current)</span> </a>
                </li>
                <li><a href="#">Contato</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Serviços<span class="caret"></span> </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="busca.php?busca=arma">Armas</a> </li>
                        <li><a href="busca.php?busca=desafios">Desafios</a> </li>
                        <li><a href="busca.php?busca=competitivo">Competitivo</a> </li>
                        <li class="divider"></li>
                        <li> <a href="busca.php?busca=raid">Raid</a> </li>
                        <li><a href="#">Orçamento</a> </li>
                    </ul>
                </li>
            </ul>
            <form method="get" action="busca.php" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" name="busca" class="form-control" placeholder="O que Você Procura?">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
            <ul class="nav navbar-nav navbar-right">

                <li>
                    <a href="carrinho.php"><span class="glyphicon glyphicon-shopping-cart"></span>Carrinho</a>
                </li>
                <?php
                    if (empty($_SESSION['id'])){

                ?>
                <li><a href="formLogon.php"><span class="glyphicon glyphicon-log-in"></span> Login</a> </li>
                <?php }else{

                        if ($_SESSION['adm'] == 0){

                            $consulta_user = $con->query("SELECT nome FROM usuarios WHERE id_usuario ='$_SESSION[id]'");
                            $exibe_user = $consulta_user->fetch(PDO::FETCH_ASSOC);
                ?>
                <li><a href="areaUser.php"><span class="glyphicon glyphicon-user"></span><?php echo $exibe_user['nome'];?></a></li>

                <li><a href="sair.php"><span class="glyphicon glyphicon-off"></span>Sair</a></li>

                <?php } else { ?>

                            <li><a href="adm.php"><button class="btn btn-danger">Adm</button></a></li>

                            <li><a href="sair.php"><span class="glyphicon glyphicon-off"></span>Sair</a></li>


                <?php }

                }?>

            </ul>
        </div>
    </div>
</nav>