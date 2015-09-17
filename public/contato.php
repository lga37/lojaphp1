<?php
include_once "header.php";

#envio de arquivos
if($_POST){
    $tipos = array('gif','jpg','png');
    $arq = $_FILES['arq'];
    if($arq['error']!=0){
    	switch($arq['error']){
    		case UPLOAD_ERR_INI_SIZE:
    			echo "gjhghg";
    			break;
    	}
    	if($arq['size']==0){

    	}
    	if(array_search($arq['type'], $tipos)===false){

    	}
    	if(move_uploaded_file($arq['tmp_name'], $destination)){

    	}
    } else{

    }
    
}


?>

    <div class="col-md-9">


        <form name="dadosCliente" method="POST">
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <input type="tel" class="form-control" placeholder="Fone" name="tel" required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <input type="text" class="form-control" placeholder="Mensagem" name="msg" required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>

            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <input type="file" class="form-control">
                    <p class="help-block text-danger"></p>
                </div>
            </div>

            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <input type="checkbox" name="como[]" value="internet">internet<br>
                    <input type="checkbox" name="como[]" value="amigos">amigos<br>
                    <input type="checkbox" name="como[]" value="revista">revista<br>
                    <input type="checkbox" name="como[]" value="outro">outro<br>
                </div>
            </div>


            <br>
            <div class="row">
                <div class="form-group col-xs-12">
                    <button class="btn btn-success btn-lg">Send</button>
                </div>
            </div>
        </form>





    </div>



<?php
include_once "footer.php";
