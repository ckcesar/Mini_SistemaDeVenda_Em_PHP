<?php

include('../classe/Conexao.php');

$con = new Conexao();

if($con){

    $deletar = $con->Executar("delete from produto where idproduto = {$_POST['codigo']}");
    if($deletar){
        echo"1";
    }

}