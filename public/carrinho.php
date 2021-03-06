<?php
include_once "header.php";
?>

    <div class="col-md-12 col-sm-12">

        <?php
            #controlador do carrinho, recebe alguma acao por $_GET ou $_POST
            #vem pelo id, ou por form-upd do proprio carrinho
            #$_REQUEST é um array superglobal, analisa tanto post quanto get
            if(isset($_REQUEST['action'])){
                $cart = getCart();
                switch(strtoupper($_REQUEST['action'])){
                    case "ADD":
                        add($_REQUEST["id"],$cart);
                    break;
                    case "DEL":
                        del($_REQUEST["id"],$cart);
                    break;
                    case "UPD":
                        if (isset($_POST["qtd"])){
                            upd($_REQUEST["id"],$cart,$_POST["qtd"]);
                        }
                    break;
                    case "CANCEL":
                        cancel();
                    break;
                    case "FRETE":
                        if (isset($_POST["cep"]) ){
                            $cep=substr(trim($_POST["cep"]),0,8);
                            #echo strlen($cep); die;
                            if(strlen($cep) == 8){
                                $_SESSION['cep']=$cep;
                                recalcFrete();
                            }
                        }
                    break;
                    case "INCR":
                    case "DECR":
                        incr_decr($_REQUEST["id"],$_REQUEST["action"]);
                    break;
                    case "DESCONTO":
                        if (isset($_POST["cupom"]) && $_SERVER['REQUEST_METHOD'] == 'POST'){
                            #validar cupom
                            $_SESSION['cupom']=$_POST["cupom"];
                            recalcDesconto();
                        }
                    break;

                    case "END":
                        #envia email
                        if($_POST && $cart = getCart()){
                            $hash = makeHash();

                            $cart = getCart(); # O certo seria checar se o carrinho ainda existe.
                            $msg = "";
                            $assunto = "Pedido #". $hash ." em ". date("d-m-Y H:i:s") ." IP:". $_SERVER['REMOTE_ADDR'] ."\n\n";
                            $msg .= $assunto;
                            #transformamos o $_POST em variaveis com extract
                            extract($_POST);
                            #gravamos o nome em um cookie, para uma saudação na próx visita.
                            setcookie("nome",$nome,time()+86400);
                            $msg .= "Nome : ". $nome ."\n";
                            $msg .= "Email : ". $email ."\n";
                            $msg .= "Tel : ". $tel ."\n";
                            $msg .= "Endereco : ". $endereco ."\n";
                            $msg .= "Itens comprados\n";
                            $msg .= str_repeat("=", 70)."\n";
                            foreach($cart as $item){
                                extract($item);
                                $msg .= str_pad($id, 10, " ") .
                                        str_pad($nome, 30, " ") .
                                        str_pad($qtd, 10, " ") .
                                        str_pad($preco, 10, " ") .
                                        str_pad($preco * $qtd, 10, " ") . "\n";
                            }
                            $msg .= str_repeat("=", 70)."\n";
                            #str_pad($input, 10, " ", STR_PAD_RIGHT);

                            $msg .= str_pad("SubTotal",60," ") . getSubTotal() ."\n";
                            $msg .= str_pad("Frete [CEP:". getCep() ."]" ,60," ") . getFrete() ."\n";
                            $msg .= str_pad("Desconto [CUPOM:". getCupom() ."]",60," ") . getDesconto() ."\n";
                            $msg .= str_pad("Total",60," ") . getTotal() ."\n\n";

                            $msg .= "Um grande abraço e voltem sempre !!";

                            #estou pegando estas constantes la do config
                            $emailDeOrigem=EMAIL;
                            $nomeDeOrigem=EMAILNOME;
                            $senha=SENHA;
                            $emailDeDestino=$email;
                            $nomeDeDestino=$nome;
                            #$assunto,$msg

                            #echo "<hr>",$msg,"<hr>";
                            $emailEnviado = enviaEmail($emailDeOrigem,$nomeDeOrigem,$senha,$emailDeDestino,$nomeDeDestino,$assunto,$msg);
                            if ($emailEnviado) {
                                cancel();
                                echo "<div class='jumbotron'><h4>Fechado com sucesso!</h4><h4>E-mail enviado com sucesso!</h4><p>".$assunto."</p></div>";
                            } else {
                                echo "<h2>Erro no envio de e-mail.</h2>";
                            }

                        }

                    break;
                }
            }

            $cart = getCart();
            if(empty($cart)){
                echo "<h1>Carrinho vazio</h1>";
            } else {
            ?>




              <table class="table table-striped table-hover table-bordered table-condensed">
                <thead class="thead-default">
                  <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Preco</th>
                    <th>Qtd</th>
                    <th>Total</th>
                    <th>Del</th>
                  </tr>
                </thead>

            <?php
                foreach($cart as $item){
                    #com extract temos o array transformado em variaveis.
                    extract($item);
                    #$linkPlus1 = "<a class=\"btn pull-right btn-warn\" href=".$_SERVER['PHP_SELF']."?action=incr&id=".$id."><i class=\"fa fa-plus\"></i></a>";
                    #$linkLess1 = "<a class=\"btn pull-left btn-warn\" href=".$_SERVER['PHP_SELF']."?action=decr&id=".$id."><i class=\"fa fa-minus\"></i></a>";

                    $linkDel = "<a class=\"btn btn-danger\" href=".$_SERVER['PHP_SELF']."?action=del&id=".$id."><i class=\"fa fa-trash fa-2x\"></i></a>";
                    $inputUpd = "<form class=\"form-inline\" name=".$id." method=\"POST\" action=".$_SERVER['PHP_SELF']."?action=upd&id=".$id.">

                    <div class=\"form-group\">
                        <input type=\"text\" class=\"input-qtde-carrinho form-control text-success\" name=\"qtd\" value=".$qtd.">
                        <button class=\"btn btn-success\"><i class=\"fa fa-refresh\"></i></button>
                    </div>  
                        </form>";
                    #jogamos tudo em printf, assim temos toda a instrução numa unica linha.
                    printf("<tr><td>%d</td><td>%s</td><td>%.2f</td><td>%s</td><td>%.2f</td><td>%s</td></tr>",
                                    $id,$nome,$preco,$inputUpd,$preco*$qtd,$linkDel);


                }
                ?>

                <tr class="warning">
                    <td colspan="4">SubTotal</td>
                    <td colspan="2"><?php echo getSubTotal() ? number_format(getSubTotal(),2,",","."): "" ?></td>
                </tr>

                <tr>
                    <td>CEP</td>
                    <td colspan="3">
                    <form name="frete" class="form-inline" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=frete">
                        <input type="number" value="<?php echo getCep() ?>" class="form-control" name="cep">
                        <button class="btn btn-info"><i class="fa fa-truck"></i></button>
                    </form>
                    </td>
                    <td colspan="2"><?php echo getFrete() ?></td>
                </tr>


     
                <tr>
                    <td>CUPOM</td>
                    <td colspan="3">
                    <form name="frete" class="form-inline" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=desconto">
                        <input type="text" value="<?php echo getCupom() ?>" class="form-control" name="cupom">
                        <button class="btn btn-info"><i class="fa fa-gift"></i></button>
                    </form>
                    </td>
                    <td colspan="2"><?php echo getDesconto() ?></td>
                </tr>

                <tr class="info">
                    <td class="font-weight-bold" colspan="4">Total</td>
                    <td class="font-weight-bold" colspan="2"><b><?php echo number_format(getTotal(),2,",",".") ?></b></td>
                </tr>

        </table>


        <form name="dadosCliente" method="POST" 
        action="<?php echo $_SERVER['PHP_SELF'] ?>?action=end">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Nome">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-comments-o"></i></div>
              <textarea  placeholder="Digite Endereco" class="form-control" 
              id="endereco" rows="3"></textarea>
            </div>
          </div>

            <div class="row">
                <div class="form-group col-xs-12">
                    <button class="btn btn-success-outline btn-lg">Enviar</button>

                    <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=cancel" 
                    class="btn pull-right btn-danger-outline btn-lg">Cancel</a>
                </div>
            </div>
        </form>



                <?php
            }#se existe carrinho
        ?>

    </div><!-- col-md-9 -->
<?php
include_once "footer.php";