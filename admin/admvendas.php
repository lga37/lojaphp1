<?php
include_once "../public/header.php";

if(!isset($_SESSION['logado']) || !$_SESSION['logado']===true){
    echo "<h1>nao autorizado</h1>";
    #header('Location: index.php');
    #mail
    die();
}

if(isset($_GET['login']) && $_GET['login']=="sair"){
	unset($_SESSION);
	session_destroy();
    header('Location: admgus.php');
    die();
}

?>

    <div class="col-md-9">

    <h1>Bem vindo a ADMIN</h1>

    <?php

    	$q1 = "select count(*) as total from produtos;";
    	$q2 = "select count(*) as total from produtos group by categ_id order by total desc;";
    	$q2 = "select sum(estoque * preco) as total from produtos group by categ_id order by total desc;";
    	$q2 = "select max(preco) as max from produtos;";
    	$q2 = "select max(preco) as max from produtos group by categ_id;";
    	$q2 = "select avg(preco) as media from produtos;";


    ?>


    </div>



<?php
include_once "../public/footer.php";
