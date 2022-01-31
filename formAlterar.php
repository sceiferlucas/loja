<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Guardião Caido - Alterar Produto</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">


    <script src="jquery.mask.js"></script>

    <script>



        $(document).ready(function(){

            $('#preco').mask('000.000.000.000.000,00', {reverse: true});

        });

    </script>

    <style>

        .navbar{
            margin-bottom: 0;
        }


    </style>




</head>

<body>

<?php

session_start();


if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {

    header('location:index.php');

}


$id_prod = $_GET['id'];


include 'conexao.php';
include 'nav.php';
include 'cabecalho.html';


$consulta = $con->query("SELECT * FROM produtos WHERE id='$id_prod'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC)

?>


<div class="container-fluid">

    <div class="row">

        <div class="col-sm-4 col-sm-offset-4">

            <h2>Alteração de produto</h2>

            <form method="post" action="alterarProduto.php?id=<?php echo $id_prod;?>" name="incluiProd" enctype="multipart/form-data">

                <div class="form-group">

                    <label for="produto">Produto</label>
                    <input type="text" name="produto" value="<?php echo $exibe['produto']; ?>"  class="form-control" required id="produto">
                </div>

                <div class="form-group">


                    <label for="categoria">Categoria</label>

                    <select class="form-control" name="categoria">
                        <option value="Exoticas" <?=($exibe['categoria'] == 'Exoticas')?'selected':''?>>Exoticas</option>
                        <option value="Lendarias" <?=($exibe['categoria'] == 'Lendarias')?'selected':''?>>Lendarias</option>
                        <option value="Competitivo" <?=($exibe['categoria'] == 'Competitivo')?'selected':''?>>Competitivo</option>
                        <option value="Raid" <?=($exibe['categoria'] == 'Raid')?'selected':''?>>Raid</option>
                        <option value="Desafios" <?=($exibe['categoria'] == 'Desafios')?'selected':''?>>Desafios</option>
                        <option value="OUTROS" <?=($exibe['categoria'] == 'OUTROS')?'selected':''?>>OUTROS</option>
                    </select>


                </div>



                <div class="form-group">

                    <label for="departamento">Tipo</label>

                    <select class="form-control" name="tipo">
                        <option value="Arma" <?=($exibe['tipo'] == 'Arma')?'selected':''?>>Arma</option>
                        <option value="Bosster" <?=($exibe['tipo'] == 'Bosster')?'selected':''?>Bosster</option>
                        <option value="Carry" <?=($exibe['tipo'] == 'Carry')?'selected':''?>>Carry</option>
                        <option value="OUTROS" <?=($exibe['tipo'] == 'OUTROS')?'selected':''?>>OUTROS</option>
                    </select>

                </div>


                <div class="form-group">

                    <label for="descricao">Descrição</label>

                    <textarea rows="5" class="form-control" name="descricao"><?php echo $exibe['descricao']; ?></textarea>


                </div>



                <div class="form-group">

                    <label for="quantidade">Quantidade</label>

                    <input type="number" class="form-control" required name="quantidade" value="<?php echo $exibe['quantidade']; ?>" id="quantidade">

                </div>



                <div class="form-group">

                    <label for="preco">Preço</label>

                    <input type="text" class="form-control" required name="preco" value="<?php echo $exibe['preco']; ?>" id="preco">

                </div>




                <div class="form-group">

                    <label for="foto1">Foto Principal</label>

                    <input type="file" accept="image/*" class="form-control" name="foto1" id="foto1">

                </div>

                <div class="form-group">

                    <img src="img/<?php echo $exibe['foto1']; ?>" width="100px" >

                </div>

                <div class="form-group">

                    <label for="foto2">Foto 2</label>

                    <input type="file" accept="image/*" class="form-control" name="foto2" id="foto2">

                </div>

                <div class="form-group">

                    <img src="img/<?php echo $exibe['foto2']; ?>" width="100px" >

                </div>

                <div class="form-group">

                    <label for="foto2">Foto 3</label>

                    <input type="file" accept="image/*" class="form-control" name="foto3" id="foto3">

                </div>

                <div class="form-group">

                    <img src="img/<?php echo $exibe['foto3']; ?>" width="100px" >

                </div>


                <button type="submit" class="btn btn-lg btn-default">

                    <span class="glyphicon glyphicon-pencil"> Alterar </span>

                </button>

            </form>

        </div>
    </div>
</div>

<?php include 'footer.html' ?>

</body>
</html>