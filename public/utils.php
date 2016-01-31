<?php

#este arquivo tambem jogamos la na raiz para assim ficar protegido pelo /public

function enviaEmail($emailDeOrigem,$nomeDeOrigem,$senha,$emailDeDestino,$nomeDeDestino,$assunto,$msg){

	// Inicia a classe PHPMailer
	$mail = new PHPMailer();

	// Define os dados do servidor e tipo de conexão
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	#$mail->SMTPDebug  = 2;
	//$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
	//$mail->Username = 'seumail@dominio.net'; // Usuário do servidor SMTP
	//$mail->Password = 'senha'; // Senha do servidor SMTP


	// Config Gmail
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsSMTP(); // Define que a mensagem será SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
	$mail->Username   = $emailDeOrigem;  		// GMAIL username
	$mail->Password   = $senha;            		// GMAIL password

	// Define o remetente
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->SetFrom($emailDeOrigem, $nomeDeOrigem);
	$mail->AddReplyTo($emailDeOrigem, $nomeDeOrigem);

	// Define os destinatário(s)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->AddAddress($emailDeDestino, $nomeDeOrigem);
	#$mail->AddAddress('ciclano@site.net');
	//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
	//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

	// Define os dados técnicos da Mensagem
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=





	$mail->ContentType = 'text/plain';
	#$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)

	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = $assunto; // Assunto da mensagem
	$mail->Body = $msg;
	$mail->AltBody = $msg; #texto PURO

	// Define os anexos (opcional)
	//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

	// Envia o e-mail
	$emailEnviado = $mail->Send();

	// Limpa os destinatários e os anexos
	$mail->ClearAllRecipients();
	#$mail->ClearAttachments();

    if (!$emailEnviado) {
		echo "<h2>Não foi possível enviar o e-mail.</h2>";
		echo "<p><b>Informações do erro:</b> <pre>" . print_r($mail->ErrorInfo) ."</pre>";
		return false;
    }

	return true; #booleano
}


function montaItemVitrine($id,$nome,$img,$preco,$prazo,$estoque){
    if($estoque < 1){
        $disponib = ($prazo == 'E')? "esgotado" : $prazo." dia(s)";
    } else {
        $disponib = "pronta-entrega";
    }

    ?>
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="../images/<?=$img?>">
            <div class="caption">

                <div class="prazo-produto"><?=$disponib?></div>
                <div class="preco-produto">R$<?=$preco?></div>


                <p class="nome-produto clearfix"><?=$nome?></p>
                <p class="botoes">
                    <a href="carrinho.php?action=add&id=<?=$id?>" title="add to wish" class="btn btn-default color1 wish" role="button">
                        <i class="fa fa-heart"></i>
                    </a>
                    <a href="carrinho.php?action=add&id=<?=$id?>" title="add to cart" class="btn btn-default color2 cart" role="button">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                    <a href="#" title="details" class="btn btn-default color3 details" role="button">
                        <i class="fa fa-external-link"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <?php
}


function paginate($total=43,$per_page=5){

    $paginas = array();
    $totalPaginas = ceil($total / $per_page);
    $pag = isset($_GET['pag'])?$_GET['pag']:1;
    for($i=1; $i<=$totalPaginas; $i++){
        #$data = array();
        #$data['pag'];
        #$data['order'];
        #$data['sens'];

        #$_SERVER["PHP_SELF"];
        #$link =  (isset($_GET['pag']))? "&" : "?";

        #http_build_query($data);
        #$_SERVER['QUERY_STRING'];
        if($i==$pag)
            $paginas[] = sprintf("<a href=". $_SERVER['PHP_SELF'] ."\"?pag=%d\">%d</a>",$i,$i);
        else
            $paginas[] = sprintf("<a href=". $_SERVER['PHP_SELF'] ."\"?pag=%d\">%d</a>",$i,$i);

    }
    #sprintf nao ecoa na tela, apenas monta a string.
    #em uma linha so, com sprintf e implode montamos nosso menu de paginacao.
    return sprintf("<ul class=\"pagination pagination-lg\"><li>%s</li></ul>",implode("</li><li>",$paginas));
}

function order(){
    #describe produtos
    $res= BD::query("DESCRIBE produtos;");

    foreach($res as $v)
        $cols[] = $v['Field'];

    #echo "<pre>";
    #print_r("<select name=\"ord\"></select>",implode("</option><option>",$cols));
    #echo "</pre>";
}

function montaItemVitrineBS4($id,$nome,$img,$preco,$prazo,$estoque){
    if($estoque < 1){
        $disponib = ($prazo == 'E')? "esgotado" : $prazo." dia(s)";
    } else {
        $disponib = "pronta-entrega";
    }

    ?>

    <div class="col-sm-3">
      <div class="card card-success">
        <div class="card-block">
          <h4 class="card-title"><? = $nome ?></h4>
          <h6 class="card-subtitle text-muted"><a href="#" class="card-link">+ Asus</a></h6>
        </div>
        <img src="img/img1.jpg" class="img-thumbnail" alt="Card image">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><h4>R$ <? = $preco ?></h4></li>
          <li class="list-group-item text-success"><? = $disponib ?></li>
          <li class="list-group-item">
            <a href="#" class="card-link"><i class="fa fa-heart fa-2x"></i></a>
            <a href="carrinho.html" class="card-link"><i class="fa fa-shopping-cart fa-2x"></i></a>
            <a href="detalhe.html" class="card-link"><i class="fa fa-external-link fa-2x"></i></a>
          </li>
        </ul>
      </div><!-- card -->
    </div><!-- .col-sm-3 -->


    <?php
}
