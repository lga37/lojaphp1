<?php
class Categorias extends BDMYSQL{
	#nao podemos usar define dentro de classes.
	#const TABELA="produtos";
	private $tabela;


	function __construct(){
		#$this->bd = new DB();
		$this->tabela = 'categorias';
	}

	public function getById($id){
		$sql = sprintf("SELECT * FROM %s WHERE id=%d LIMIT 1;", $this->tabela , $id);
		$res = $this->bd->query($sql);
		#$res = BD::query($sql);
		#echo "<pre>";
		#print_r($res);
		#echo "</pre>";

		return count($res)==1?$res[0]:false;
	}

	public function getAll(){
		$sql = sprintf("SELECT * FROM %s;", $this->tabela);
		return $this->bd->query($sql);
	}

	public function insert(array $campos){
		
	}

	public function update(array $campos,$id){
		
	}

	public function delete($id){
		
	}



}