<?php

include('../classe/Conexao.php');

$con = new Conexao();

if($con){

    $listar = "select * from usuario a, venda b where a.idusuario = b.idusuario and b.idusuario={$_POST['codigo']} ";

    $result = $con->listar($listar);

    if(!$result){
        $deletar = $con->Executar("delete from usuario where idusuario = {$_POST['codigo']}");
        if($deletar){
            echo"1";
        }
    }else{
        echo"2";
    }

}