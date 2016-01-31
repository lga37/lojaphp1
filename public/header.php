<?php
/*
Copyright (C) 2015  Luis Gustavo Almeida

Este programa é um software livre; você pode redistribuí-lo e/ou
modificá-lo dentro dos termos da Licença Pública Geral GNU como
publicada pela Fundação do Software Livre (FSF); na versão 3 da
Licença, ou (na sua opinião) qualquer versão.

Este programa é distribuído na esperança de que possa ser útil,
mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO
a qualquer MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
Licença Pública Geral GNU para maiores detalhes.

Você deve ter recebido uma cópia da Licença Pública Geral GNU junto
com este programa. Se não, veja <http://www.gnu.org/licenses/>.
*/

@include_once "../config/config.php";

function __autoload($classe){
    if(in_array(strtolower($classe), ['phpmailer','smtp'])){
        require_once("../phpmailer/class.".strtolower($classe).".php");
    } else {
        require_once("../classes/".$classe.".php");
    }
}

include_once "utils.php";
include_once "../classes/Cart.php";

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Loja virtual do curso PHP1 da Impacta">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Luis Gustavo Almeida">

    <title>Loja virtual do curso PHP1 da Impacta - LGA</title>
    <!--

    arquivos estaticos css

    -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/loja.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><i class="fa fa-2x fa-coffee"></i> LGA</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <form id="formBusca" class="form-inline" action="listagem.php" method="POST">
                        <input type="text" class="form-control" placeholder="Busca" name="busca">
                        <button class="btn btn-success"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="col-md-4">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="page-scroll">
                            <a href="carrinho.php"><i class="fa fa-2x fa-shopping-cart"></i></a>
                        </li>
                        <li class="page-scroll">
                            <a href="contato.php"><i class="fa fa-2x fa-envelope"></i></a>
                        </li>
                        <li class="page-scroll">
                            <?php
                            if(isset($_SESSION['logado']) && $_SESSION['logado']===true){
                                ?>
                                <a href="../admin/admgus.php"><i class="fa fa-2x sign-in"></i></a>
                                <?php
                            }else{
                                ?>
                                <a href="../admin/admgus.php?action=logout"><i class="fa fa-2x sign-out"></i></a>
                                <?php
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container" id="main">
        <div class="row">

            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked menu-categ">
                <?php
                    #Montamos nossa query basica.
                    $sql = "SELECT * FROM categorias order by nome;";
                    #se quisermos colocar o numero de itens de cada categoria usamos um join
                    # e ai temos um exemplo de consulta mais complexa
                    $sql2 = "SELECT c.id,c.nome,COUNT(p.id) AS qtd FROM categorias as c LEFT JOIN produtos as p ON p.categ_id=c.id GROUP BY c.id ORDER BY c.nome;";

                    #Com a query montada acessamos nossa classe BD e chamamos o método query passando a consulta.
                    $array= BD::query($sql2);
                    #iteramos sobre o array resultante, onde ja vira no formato [id][nome]
                    #poderiamos tambem usar extract
                    foreach($array as $categ){
                        $id = $categ['id'];
                        $nome = $categ['nome'];
                        #se usar a sql mais complexa, ela vem com um item a mais
                        $qtd = isset($categ['qtd'])? ' ('.$categ['qtd'].')':"";
                        $nome .= $qtd;
                        #com printf misturamos mais facilmente o html e o php, poderiamos usar echo.
                        printf("<li><a href=\"listagem.php?id=%d\">%s</a></li>",$id,$nome);
                    }
                ?>
                </ul>
            </div>

