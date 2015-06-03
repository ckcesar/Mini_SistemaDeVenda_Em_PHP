<?php


class Conexao{

    private $db = null;
    private $_tabela;

    private $usuario  = "weblz";
    private $senha    = "rj45812";
    private $host     = "192.168.115.1";
    private $database = "vendas";

    private $charset = "UTF8";

    public function __construct(){
        $this->Connect();
    }

    public function Connect(){
        $conf = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$this->charset}",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        if (is_null($this->db)) {
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->database", $this->usuario, $this->senha, $conf);
        }
        return $this->db;
    }

    public function Executar($sql){
        $row = $this->Connect()->prepare($sql);
        return $row->execute();
    }

    public function listar($sql, $dados = null){
        $list = $this->Connect()->prepare($sql);
        $list->execute($dados);
        return $list->fetchAll(PDO::FETCH_OBJ);
    }

    public function ultimoId($sql){
        return $this->Connect()->lastInsertId($sql);
    }

}