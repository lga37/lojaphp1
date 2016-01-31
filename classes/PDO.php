<?php

class PDOAUX{
	private static $cn;
	private static $instance;

	private function __construct(){
		#vamos usar PDO mas poderiamos usar mysqli.
		#pegando todas as configuracoes em config.php atraves dos defines.
		$dsn = "%s:dbname=%s;host=%s;port=%d;charset=%s";
		self::$cn = new PDO(sprintf($dsn,DRIVER,NAME,HOST,PORT,CHARSET),USER,PASS);
		self::$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		self::$cn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	}

	public static function getInstance(){
		if(empty(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function getConn(){
		self::getInstance();
		return self::$cn;
	}


	public static function query($sql){
		$stmt = self::getConn()->query($sql);

		#$res = array();
		#$a = $stmt->fetch(PDO::FETCH_ASSOC);


		#while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
		#	$res[] = $linha;
		#}

		#echo "<pre>";
		#print_r($res);die;

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	public static function count($tabela){
		$sql = "SELECT COUNT(1) FROM $tabela;";
		$stmt = self::getConn()->query($sql);

		return (int) $stmt->fetchColumn();
	}
/*
	public static function dateToMySql($date){
		return implode("-",array_reverse(explode("/",$date)));
	}

	public static function dateFromMySql($date){
		return implode("/",array_reverse(explode("-",$date)));
	}

	public static function decimalToMySql($value){
		return number_format($value,2,".");
	}
*/
}
