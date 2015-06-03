<?php

require_once('../classe/Conexao.php');
require_once('../classe/validacao.php');

$con = new Conexao();
$val = new Validacao();

$codigo    = $_POST['codigo'];
$nome      = trim($_POST['nome']);
$email     = trim($_POST['email']);
$senha     = trim(md5($_POST['senha']));

echo $val->validarCampo('Nome', $nome, '100', '3');
echo $val->validarCampo('E-mail', $email, '100', '3');

if($con){

    if( $val->verifica() && $codigo === ''){
        $gravar = $con->Executar("insert into `usuario` (`nome`,`email`, `senha`, `status`) values('$nome', '$email', '$senha', '1')");
        echo"1";
    }else if($val->verifica() && $codigo !== ''){
        $alterar = $con->Executar("update usuario set nome='$nome', email='$email'  where idusuario = {$codigo} ");
        echo"2";
    }

}
