<?php
/*
Retorna a session correspondente a cesta de produtos, se nao existe, cria uma com array vazio.

@return array
*/
function getCart(){
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}
	return $_SESSION['cart'];
}

/*
Analisa se o item ja existe no carrinho atual.
@param id int
@param cart array

@return bool
*/
function has($id,$cart){
	return array_key_exists($id, $cart) && $cart[$id]['qtd']>0;
}

/*
Analisa se o item pode ser adicionado ao carrinho em função do estoque e prazo.
@param qtd int
@param estoque int
@param prazo string

@return bool
*/
function can($qtd,$estoque,$prazo){
	return !($qtd > $estoque && $prazo=='E');
}

/*
Filtra a qtd que pode ser alterada, deixando sempre entre 1 e 100.
@param qtd int

@return int
*/
function validateQtd($qtd){
	if(is_numeric($qtd)){
		if($qtd < 1){
			$qtd = 1;
		}
		if($qtd > 100){
			$qtd = 100;
		}
	} else {
		$qtd = 1;
	}
	return intval($qtd);
}

/*
Adiciona um item ao carrinho.
@param qtd int
@param cart array

@return bool
*/
function add($id,$cart){
	$prd = Produto::getById($id);
	#poderiamos tb usar extract.
	$prod_nome = $prd['nome'];
	$id = $prd['id'];
	$prazo = $prd['prazo'];
	$estoque = $prd['estoque'];
	$qtd = 1;

	if(is_array($prd)){
		$prd['qtd'] = $qtd;
		# so coloco a qtd se vier certo do banco, senao ele cria um array vazio so com qtd.
		if(!has($id,$cart) && can($qtd,$estoque,$prazo)){
			$_SESSION['cart'][$id] = $prd;
			#tenho que dar um refresh para alterar frete, pesos, descontos
			refresh();
			return true;
		}else{
			?>
              <div class="alert alert-danger alert-dismissible fade in" 
              role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                Produto Esgotado <strong><?= $prod_nome ?></strong>
              </div>

			<?php
			#echo "Produto esgotado!";
		}
	}
	return false;
}

/*
Deleta um item do carrinho.
@param qtd int
@param cart array

@return bool
*/
function del($id,$cart){
	unset($_SESSION['cart'][$id]);
	# aqui entra um caso particular qdo deletamos o ultimo item do carrinho.
	# Neste caso excluimos ocarrinho inteiro, assim deletamos os valores.
	if(count(getCart())==0){
        cancel();
	} else {
		refresh();
	}
}

/*
Atualiza os valores do carrinho, a toda operacao que envolve trocar/deletar a qtd.

@return void
*/
function refresh(){
	recalcFrete();
	recalcDesconto();
}

/*
Altera um item do carrinho.
@param id int
@param qtd int
@param cart array

@return bool
*/
function upd($id,$cart,$qtd){
	$qtd = validateQtd($qtd);
	$_SESSION['cart'][$id]['qtd']=$qtd;
	refresh();
	return true;
}

/*
Cancela todo o carrinho. Destroi as sessoes.

@return void
*/
function cancel(){
	unset($_SESSION);
	session_destroy();
}


/*
Altera um item do carrinho. Com as operacoes + e -
@param id int
@param op string

@return bool/void
*/
function incr_decr($id,$op='incr'){
	if(isset($_SESSION['cart'][$id])){
		$qtd = $_SESSION['cart'][$id]['qtd'];
		$newQtd = ($op=='incr')?++$qtd:--$qtd;
		$cart = getCart();
		return $newQtd > 0? upd($id,$cart,$newQtd) : del($id,$cart);

	}
}

/*
Cria uma sequencia aleatoria de 10 caracteres, pode ser usada como senhas, ou como identificadores.
@return string
*/
function makeHash(){
	return substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 );
}


/*
Retorna o valor total do peso
@return float
*/
function getPeso(){
	$peso = 0;
	$cart = getCart();
	foreach($cart as $item){
		$peso += $item['peso']* $item['qtd'];
	}
	return $peso;
}

/*
Retorna o valor do subtotal
@return float
*/
function getSubTotal(){
	$sub = 0;
	$cart = getCart();
	foreach($cart as $item){
		$sub += $item['preco']* $item['qtd'];
	}
	return $sub;
}

/*
Retorna o valor do frete
@return float
*/
function getFrete(){
	return isset($_SESSION['frete'])? $_SESSION['frete'] : "";
}


/*
Retorna o valor do desconto
@return float
*/
function getDesconto(){
	return isset($_SESSION['desconto'])? $_SESSION['desconto'] : "";
}

/*
Devolve o total da compra, fazendo as devidas contas.

@return float/null
*/

function getTotal(){
	#aproveitei para usar aqui o operador ternario curto.
	#return getSubTotal()+getFrete()-getDesconto() ?: "";
	if(getSubTotal()+getFrete()-getDesconto()){
		return getSubTotal()+getFrete()-getDesconto();
	}
	return "";
}



/*
Retorna o valor do cep
@return string
*/
function getCep(){
	return isset($_SESSION['cep'])? $_SESSION['cep'] : "";
}

/*
Retorna o valor do cupom
@return string
*/
function getCupom(){
	return isset($_SESSION['cupom'])? $_SESSION['cupom'] : "";
}


/*
Efetua o calculo do desconto e grava na session.
A logica varia muito e cada pessoa tem uma maneira de calcular descontos.
exemplo se a pessoa digita FR vai para o 1 item do switch
@return bool
*/

function recalcDesconto(){
	$cupom = getCupom();
	# ou pela data
	#XXX(F|P|B)XXX()
	$desconto = "";
	switch($cupom){
		case 'FR': #frete
			$desconto = getFrete();
		break;
		case 'PE': #percent
			$percent=0.1;
			$desconto = number_format(getSubTotal() * $percent);
		break;
		case 'BR': #vlr bruto
			$valor=50;
			$desconto = $valor;
		break;
		default:
			$desconto = "";

	}
	$_SESSION['desconto']=$desconto;
	return true;
}

/*
Efetua o calculo do frete e grava na session. Usa um fator de calculo.
Exemplo - Carrinho deu 4kg - Sudeste , fator=3 , entao frete = 3*4 = 12
Exemplo - Carrinho deu 7kg - Sudeste , fator=3 , entao frete = 3*7 = 21

Exemplo - Carrinho deu 7kg - Nordeste , fator=6 , entao frete = 6*7 = 42
Exemplo - Carrinho deu 0kg - Nordeste , fator=6 , como peso==0, entao frete = 6
Poderiamos usar varios tipos de funções aqui.

@return bool
*/
function recalcFrete(){
	#o primeiro digito de um cep identifica a regiao.
	$cep = getCep();
	$peso = getPeso();
	$frete = "";
	if(empty($cep)){
		$_SESSION['frete']="";
	}else{
		switch(substr($cep,1)){
			#case '0': #Gde SP , esta dando erro ...
			case '1': #Interior SP
			case '2': # RJ,ES
			case '3': # MG
				#NESTA REGRA A CADA QUILO A MAIS ADICIONAMOS 3r$ de frete
				$fator = 3;
				$frete = $peso >0? $peso * $fator : $fator;
				break;

			case '4': # BA, SE
			case '5': # PE, AL, PB, RN
			case '6': #regiao Norte + CE, PI, MA
			case '7': #regiao C-Oeste + RO
			case '8': #PR, SC
			case '9': #RS
				#NESTA REGRA A CADA QUILO A MAIS ADICIONAMOS 6r$ de frete
				$fator = 6;
				$frete = $peso >0? $peso * $fator : $fator;
				break;

			default:
				#Se a regiao nao existe, vamos deixar engessado como 10.00
				$frete = 10;
		}
		$_SESSION['frete']=number_format($frete,2);
	}

	return true;
}
