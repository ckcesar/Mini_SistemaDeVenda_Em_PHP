<?php

  require_once('../classe/Conexao.php');
  require_once('../classe/validacao.php');

  $con = new Conexao();
  $val = new Validacao();

  $codigo    = $_POST['codigo'];
  $categoria = trim($_POST['categoria']);

  echo $val->validarCampo('Categoria', $categoria, '100', '3');

  if($con){

      if( $val->verifica() && $codigo === ''){
          $gravar = $con->Executar("insert into `categoria` (`categoria`,`status`) values('$categoria', '1')");
          echo"1";
      }else if($val->verifica() && $codigo !== ''){
          $alterar = $con->Executar("update categoria set categoria='$categoria' where idcategoria = {$codigo} ");
          echo"2";
      }

  }
