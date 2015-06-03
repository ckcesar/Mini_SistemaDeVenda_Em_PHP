<?php

session_start();

require_once('../classe/Conexao.php');

$con = new Conexao();

$email = $_POST['login'];
$senha = md5($_POST['senha']);


if($con){

   $sql = "select idusuario, nome, email, senha from usuario where email=? and senha=? and status = '1' ";

    $dados = array(
        $email, $senha
    );

    $result = $con->listar($sql, $dados);

    if($result){
        foreach($result as $linha){
            $_SESSION['login'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['nome']  = $linha->nome;
            $_SESSION['usuario'] = $linha->idusuario;
        }

          echo"1";
    }

}
