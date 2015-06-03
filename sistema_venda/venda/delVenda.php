<?php

include('../classe/Conexao.php');

$con = new Conexao();

if($con){

    $deletar_item  = $con->Executar("delete from vendaitem where idvenda = {$_POST['codigo']}");
    $deletar_venda = $con->Executar("delete from venda where idvenda = {$_POST['codigo']}");

    if($deletar_item && $deletar_venda ){
        echo"1";
    }

}