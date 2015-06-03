<?php

require_once('../classe/Conexao.php');
require_once('../classe/validacao.php');

$con = new Conexao();
$val = new Validacao();

$codigo    = $_POST['codigo'];
$categoria = $_POST['categoria'];
$produto   = trim($_POST['produto']);
$preco     = trim($_POST['preco']);
$saldo     = trim($_POST['saldo']);


echo $val->validarCampo('Produto', $produto, '100', '3');
echo $val->validarCampo('Preço', $preco, '100', '3');
echo $val->validarNumero('Saldo', $saldo, null, null);


if($con){

    if( $val->verifica() && $codigo === ''){
        $gravar = $con->Executar("insert into `produto` (`produto`,`preco`,`status`, `idcategoria`, `saldo`) values('$produto', '$preco', '1', '$categoria', '$saldo')");
        echo"1";
    }else if($val->verifica() && $codigo !== ''){
        $alterar = $con->Executar("update produto set produto='$produto', preco='$preco', idcategoria='$categoria', saldo='$saldo' where idproduto = {$codigo} ");
        echo"2";
    }

}
