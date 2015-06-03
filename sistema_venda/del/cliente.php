<?php

include('../classe/Conexao.php');

$con = new Conexao();

if($con){

    $listar = "select * from cliente a, venda b where a.idcliente = b.idcliente and b.idcliente={$_POST['codigo']} ";

    $result = $con->listar($listar);

    if(!$result){
        $deletar = $con->Executar("delete from cliente where idcliente = {$_POST['codigo']}");
        if($deletar){
            echo"1";
        }
    }else{
        echo"2";
    }

}