<?php

require_once('../classe/Conexao.php');
require_once('../classe/validacao.php');

$con = new Conexao();
$val = new Validacao();

$codigo    = $_POST['codigo'];
$nome      = trim($_POST['nome']);
$email     = trim($_POST['email']);

echo $val->validarCampo('Nome', $nome, '100', '3');
echo $val->validarCampo('E-mail', $email, '100', '3');

if($con){

    if( $val->verifica() && $codigo === ''){
        $gravar = $con->Executar("insert into `cliente` (`nome`,`email`, `ativo`) values('$nome', '$email', '1')");
        echo"1";
    }else if($val->verifica() && $codigo !== ''){
        $alterar = $con->Executar("update cliente set nome='$nome', email='$email' where idcliente = {$codigo} ");
        echo"2";
    }

}
