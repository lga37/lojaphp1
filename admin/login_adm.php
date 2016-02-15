<?php
include_once "../public/header.php";


if(isset($_COOKIE['lembrar'])){
    extract($_COOKIE); #nome senha e o checkbox lembrar
}

if(!isset($_SESSION['tentativas'])){
    $_SESSION['tentativas']=0;
}

if($_SESSION['tentativas']>3){
    echo "<h1>tentativa:{$_SESSION['tentativas']}/3</h1>";
    #header('Location: index.php');
    #mail
    #die();
}


if($_POST){
    extract($_POST);
    #se clicou em esqueceu
    if(isset($reenvio) && $reenvio === "Esqueceu"){
        $novasenha;
        #mail
        unset($_SESSION['tentativas']);
    }


    if($login==="impacta" && $pass==="123"){
        $_SESSION['logado']=true;
        #$guardar= $lembrar?$lembrar:null;
        #setcookie($guardar,$login,$pass);

        header('Location: admvendas.php');
        die;
    } else {
        $_SESSION['tentativas']=++$tentativa;   
    }

}

?>

     <div class="col-md-12 col-sm-12">
        <h1>Area Restrita</h1>
       


    </div>



<?php
include_once "../public/footer.php";
