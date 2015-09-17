<?php
class Produto {
	
	const TABELA="produtos";

	/**
		
	*/

	public static function getById($id){
		$sql = sprintf("SELECT * FROM %s WHERE id=%d LIMIT 1;", self::TABELA , $id);
		$res = BD::query($sql);
		#echo "<pre>";
		#print_r($res);
		#echo "</pre>";

		return count($res)==1?$res[0]:false;
	}

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

	public static function getAllByCategId($categ_id){
		$sql = "SELECT * FROM ". self::TABELA ." WHERE categ_id=$categ_id";
		$sql .= self::order($sql);
		$sql .= self::limit($sql);
		$sql .=";";		
		return BD::query($sql);
	}


	public static function getAllByRand($num){
		$sql = "SELECT * FROM ". self::TABELA ." ORDER BY rand() LIMIT $num;";
		return BD::query($sql);
	}

	public static function count(){
		return BD::count(self::TABELA);
	}

	public static function getAllByBusca($busca){
		$busca=trim($busca,";");
		$busca=trim($busca,"'");
		$busca=trim($busca,"--");
		if(!empty($busca)){
			$sql = "SELECT * FROM ". self::TABELA ." WHERE nome LIKE '%$busca%'";
			if (is_numeric($busca)){
				$sql .= " OR id=". $busca;
			}
			$sql .= " ORDER BY nome;";
			return BD::query($sql);
		}
		return null;
	}

}