<?php

session_start();

$produto    = $_POST['produto'];
$quantidade = $_POST['quant'];
$valortotal = $_POST['valortotal'];


$cliente = $_POST['cliente'];
$prod    = $_POST['produto'];
$valor   = $_POST['preco'];

$quant   = $_POST['quant'];

if($produto !== "" && $quantidade !== "" && $valortotal !== "" && $cliente !== ""){

$_SESSION['itensVenda'][] = array(
    'cliente' => $cliente,
    'produto' => $prod,
    'preco' => $valor,
    'quant' => $quant,
);

echo '1';
}
?>