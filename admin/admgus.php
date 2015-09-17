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
    die();
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

    <div class="col-md-9">
	    Area Restrita



        <form name="login" method="POST">
            <div class="row control-group col-md-offset-3">
                <div class="form-group col-md-6 controls">
                    <input type="text" class="form-control" placeholder="Login" name="login" required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group col-md-offset-3">
                <div class="form-group col-md-6 controls">
                    <input type="password" class="form-control" name="pass" required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>

            <div class="row control-group col-md-offset-3">
                <div class="form-group col-md-6 controls">
                    <input type="checkbox" name="lembrar" value="1">Lembrar
                </div>
            </div>

            <div class="row control-group col-md-offset-3">
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-success btn-lg">Login</button>
                </div>
            </div>
        </form>

    </div>



<?php
include_once "../public/footer.php";
