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
      <nav class="">


        <div class=" toggleable-xs" id="exCollapsingbar2">
          <a class=" text-primary" href="#">>_ LGA</a>

          <form class="inline pull-xs-right">
            <input class="" type="text" placeholder="Search">
            <button class=" -success-outline" type="submit">Search</button>
          </form>

        </div>
      </nav>
    </header>

        <section>
      <div class="row">

        <div class="3">

            <div class="esquerda">

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
                        #$nome .= $qtd;
                        #temos a classe active do bs4 p ser usada
                        #com printf misturamos mais facilmente o html e o php, poderiamos usar echo.

                        printf("<a href=listagem_2.php?id=%d>%s</a><br>",$id,$nome);
                    }
                ?>

            </div><!--  -->

        </div><!-- 3 -->

        <!-- #################################################### -->
        <div class="9 direita">
          <div class="row">