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
setlocale(LC_ALL,"pt_BR");
date_default_timezone_set("America/Sao_Paulo");
ini_set("display_startup_errors",TRUE);
ini_set("display_errors",TRUE);
define("ENV","DEVELOP"); #PROD
$url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/lojaphp1/public/';
define("URL", $url);
#echo "<pre>";
#print_r($_SERVER);die;
#echo PATH;
@include_once "../config/config.". strtolower(ENV) .".php";

function __autoload($classe){
    $pastas = array('phpmailer','smtp');
    if(in_array(strtolower($classe), $pastas)){
        require_once("../phpmailer/class.".strtolower($classe).".php");
    } else {
        require_once("../classes/".$classe.".php");
    }
}

include_once "utils.php";
#temos que dar um include no Cart pois nao estamos fazendo new Cart()
#todo
include_once "../classes/Cart.php";

session_start();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link href="../node_modules/tether/dist/css/tether.css" rel="stylesheet" type="text/css">
    <link href="../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../node_modules/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/estilo.css">
  </head>


  <body class="container-fluid">


    <header>
      <nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
            &#9776;
          </button>


        <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
          <a class="navbar-brand text-primary" href="<?=URL?>">>_ LGA</a>
          <ul class="nav navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="<?=URL?>">Home <span class="sr-only">(current)</span></a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="<?=URL?>carrinho.php">Carrinho</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=URL?>login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="<?=URL?>../admin/admgus.php"><i class="fa fa-list"></i> Admin</a>
            </li>
          </ul>


          <form class="form-inline pull-xs-right" method="post" action="<?=URL?>listagem.php">
            <input class="form-control" name="busca" type="text" placeholder="Search">
            <button class="btn btn-success-outline" type="submit">Search</button>
          </form>

        </div>
      </nav>
    </header>

        <section>
      <div class="row">

        <div class="col-sm-3">
          <div id="menu-lateral">

            <div class="list-group">


               <?php
                    #Montamos nossa query basica.
                    $sql = "SELECT * FROM categorias order by nome;";
                    #se quisermos colocar o numero de itens de cada categoria usamos um join
                    # e ai temos um exemplo de consulta mais complexa
                    $sql2 = "SELECT c.id,c.nome,COUNT(p.id) AS qtd FROM categorias as c LEFT JOIN produtos as p ON p.categ_id=c.id GROUP BY c.id ORDER BY c.nome;";

                    #Com a query montada acessamos nossa classe BD e chamamos o método query passando a consulta.
                    $array= BD::query($sql);
                    #iteramos sobre o array resultante, onde ja vira no formato [id][nome]
                    #poderiamos tambem usar extract
                    foreach($array as $categ){
                        $id = $categ['id'];
                        $nome = $categ['nome'];
                        #se usar a sql mais complexa, ela vem com um item a mais
                        $qtd = isset($categ['qtd'])? ' ('.$categ['qtd'].')':"";
                        #$nome .= $qtd;
                        #temos a classe active do bs4 p ser usada
                        #com printf misturamos mais facilmente o html e o php, poderiamos usar echo.

                        printf("<a href=listagem.php?id=%d class=list-group-item><span class=\"pull-right label label-info label-pill\">%d</span>%s</a>",$id,$qtd,$nome);
                    }
                ?>

            </div><!-- list-group -->

            <br><br>
            <div class="list-group">
              <a href="#" class="list-group-item active">
                <h4 class="list-group-item-heading">Assistencia Técnica</h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">Suporte Online</h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </a>
            </div><!-- list-group -->

          </div><!-- menu-lateral -->

        </div><!-- col-sm-3 -->

        <!-- #################################################### -->
        <div class="col-sm-9">
          <div class="row">


