<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Minha Loja - Incluir Produtos</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="jquery.mask.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

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

if (empty($_SESSION['adm']) || $_SESSION['adm']!=1){
    header('location:index.php');
}


include 'conexao.php';
include 'nav.php';
include 'cabecalho.html';

?>


<div class="container-fluid">

    <div class="row">

        <div class="col-sm-4 col-sm-offset-4">

            <h2>Inclusão de produto</h2>

            <form method="post" action="incluirProduto.php" name="incluiProd" enctype="multipart/form-data">

                <div class="form-group">

                    <label for="produto">Produto</label>
                    <input name="produto" type="text" class="form-control" required id="produto">
                </div>

                <div class="form-group">


                    <label for="Categoria">Categoria</label>

                    <select class="form-control" name="Categoria">
                        <option value="Exoticas">Exoticas</option>
                        <option value="Lendarias">Lendarias</option>
                        <option value="Competitivo">Competitivo</option>
                        <option value="End Game">End Game</option>
                        <option value="Desafios">Desafios</option>

                    </select>


                </div>



                <div class="form-group">

                    <label for="tipo">Tipo</label>

                    <select class="form-control" name="tipo">
                        <option value="Arma">Arma</option>
                        <option value="Raid">Raid</option>
                        <option value="Competitivo">Competitivo</option>
                        <option value="Desafios">Desafios</option>
                    </select>

                </div>

                <div class="form-group">

                    <label for="descricao">Descrição</label>

                    <textarea rows="5" class="form-control" name="descricao"></textarea>


                </div>



                <div class="form-group">

                    <label for="quantidade">Quantidade</label>

                    <input type="number" class="form-control" required name="quantidade" id="quantidade">

                </div>



                <div class="form-group">

                    <label for="preco">Preço</label>

                    <input type="text" class="form-control" required name="preco" id="preco">

                </div>


                <div class="form-group">

                    <label for="foto1">Foto Principal</label>

                    <input type="file" accept="image/*" class="form-control" name="foto1" id="foto1">

                </div>

                <div class="form-group">

                    <label for="foto2">Foto 2</label>

                    <input type="file" accept="image/*" class="form-control" name="foto2" id="foto2">

                </div>

                <div class="form-group">

                    <label for="foto2">Foto 3</label>

                    <input type="file" accept="image/*" class="form-control" name="foto3" id="foto3">

                </div>


                <button type="submit" class="btn btn-lg btn-default">

                    <span class="glyphicon glyphicon-pencil"> Cadastrar </span>

                </button>

            </form>

        </div>
    </div>
</div>

<?php include 'footer.html' ?>




</body>
</html>