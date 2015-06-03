<?php

  session_start();

  require_once('../classe/Conexao.php');
  require_once('../classe/validacao.php');

  $con = new Conexao();
  $val = new Validacao();

  $codigo    = $_POST['codigo'];
  $cliente   = $_POST['cliente'];
  $usuario   = $_POST['usuario'];
  $data      = date('Y-m-d H:i:s');


  $valor_pago = trim($_POST['valor_pago']);
  echo $val->validarCampo('Valor', $valor_pago, '100', '3');

  //var_dump($_SESSION['itensVenda'][1]['produto']);


  if($con){
    if($val->verifica()) {
        if ($codigo !== '' && $_SESSION['itensVenda']) {

            $gravar = $con->Executar("insert into venda(`data`, `idcliente`,`status`, `idusuario`)
                                          values('$data', '$cliente', '1' ,'$usuario' )");

            $id = $con->ultimoId("idvenda");

            foreach ($_SESSION['itensVenda'] as $linha) {

                    $gravar_itens = $con->Executar("insert into vendaitem(`idproduto`, `idvenda`, `preco`, `precopago`, `qtd`)
                                                     values('" . $linha["produto"] . "', '$id', '" . $linha["preco"] . "', '$valor_pago', '" . $linha["quant"] . "')");

                    $update = $con->Executar("update produto set saldo = saldo - '".$linha["quant"]."' where idproduto = '".$linha["produto"]."' ");
            }

            echo "1";
            $_SESSION['itensVenda'] = '';
        }
    }
  }
