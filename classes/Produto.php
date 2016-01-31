<?php
class Produto {
	#nao podemos usar define dentro de classes.
	#const TABELA="produtos";

	public static function getById($id){
		$sql = sprintf("SELECT * FROM %s WHERE id=%d LIMIT 1;", "produtos" , $id);
		$res = BD::query($sql);
		#echo "<pre>";
		#print_r($res);
		#echo "</pre>";

		return count($res)==1?$res[0]:false;
	}

/*
	public static function limit(){
		$cur_page = isset($_GET['page']) ? $_GET['page'] : 1;

		// Number of results per page
		$results_per_page = 5;

		// Compute the number of the first row on the page
		$cur_page = intval($cur_page);

		$skip = $cur_page * $results_per_page;
		$limit = ($cur_page) * $results_per_page;

		return sprintf(" LIMIT %d OFFSET %d",$limit,$results_per_page);
	}

	public static function order($sql){
		$order='id';
		$sens='ASC';
		return sprintf(" ORDER BY %s %s",$order,$sens);
	}

	public static function count(){
		return BD::count(self::TABELA);
	}
*/
	public static function getAllByCategId($categ_id){
		$sql = "SELECT * FROM produtos WHERE categ_id=$categ_id";
		#$sql .= self::order($sql);
		#$sql .= self::limit($sql);
		$sql .=";";
		return BD::query($sql);
	}

	/*
	Fazemos uma busca aleatoria de ate $num produtos.
	*/
	public static function getAllByRand($num){
		$sql = "SELECT * FROM produtos ORDER BY rand() LIMIT $num;";
		return BD::query($sql);
	}


	/*
	Faz a busca pelo operador like,ou pelo cod numerico do produto
	*/
	public static function getAllByBusca($busca){
		#temos que retirar estes caracteres, pois nao estamos usando prepared statements
		$busca=trim($busca,";");
		$busca=trim($busca,"'");
		$busca=trim($busca,"--");
		if(!empty($busca)){
			$sql = "SELECT * FROM produtos WHERE nome LIKE '%$busca%'";
			if (is_numeric($busca)){
				$sql .= " OR id=". $busca;
			}
			$sql .= " ORDER BY nome;";
			return BD::query($sql);
		}
		return null;
	}

}
