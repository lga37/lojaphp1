<?php

class MYSQLI{
    private static $_cn;
    private static $cn;
    private static $instance;

    private function __construct(){
        if(!HOST || !USER || !PASS || !NAME){
            die("erro linha :".__LINE__."arq:".__FILE__);
        }

        #$cn = new mysqli(HOST,USER,PASS,NAME) or die("erro linha :".__LINE__."arq:".__FILE__);

        self::$cn = new mysqli(HOST,USER,PASS,NAME) || die("erro ". mysql_error());
        // $cn = new mysqli(HOST,USER,PASS,NAME) || die("erro ". mysql_error());
        // if($cn->connect_errno){
        //     die("erro MYSQL");
        // }
        // $this->_cn = $cn;


    }

    private function __clone(){}

    private function __destruct(){
        $this->_cn->close();
    }

    # Padrao de projeto chamado singleton, muito usado em PHP
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
        if(!$sql){
            die("Faltou o SQL");
        }

        #$result = $this->_cn->query($sql);
        $result = self::getConn()->query($sql);

        if($result){
            $res = array();
            #podemos trazer array ou objeto
            #while($linha = $result->fetch_object()){
            #while($linha = mysqli_fetch_assoc($result)){
            #while($linha = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            #$result->fetch_array(MYSQLI_ASSOC);
            while($linha = $result->fetch_assoc()){
               $res[] = $linha;
            }

        }
        #mysqli_free_result($result);
    }


    public static function count($tabela){
        $sql = "SELECT COUNT(1) FROM $tabela;";
        $res = self::getConn()->query($sql);

        return (int) $res->fetch_row();
    }


    public static function dateToMySql($date){
        return implode("-",array_reverse(explode("/",$date)));
    }

    public static function dateFromMySql($date){
        return implode("/",array_reverse(explode("-",$date)));
    }

    public static function decimalToMySql($value){
        return number_format($value,2,".");
    }

}
