<?php

include('../classe/Conexao.php');

$con = new Conexao();

if($con){

    $listar = "select * from produto a, categoria b where a.idcategoria = b.idcategoria and b.idcategoria={$_POST['codigo']} ";

    $result = $con->listar($listar);

    if(!$result){
        $deletar = $con->Executar("delete from categoria where idcategoria = {$_POST['codigo']}");
        if($deletar){
            echo"1";
        }
    }else{
        echo"2";
    }

}