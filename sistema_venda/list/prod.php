<?php

include("../classe/Conexao.php");

$con = new Conexao();

$busca = $_POST['codigo'];


if($busca) {

$sql = "SELECT p.preco, p.idproduto
        FROM `produto` p
        WHERE p.idproduto = {$busca}";

$s = $con->listar($sql);

foreach ($s as $linha) {
	
   echo $linha->idproduto .'|'. $linha->preco .'|'. $linha->idproduto .'|'. ($busca==$linha->idproduto?'s':'n');

}



}