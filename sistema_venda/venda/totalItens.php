<?php
session_start();
$total = 0;

if($_SESSION['itensVenda']) {
    foreach ( $_SESSION['itensVenda'] as $indice=>$item) {
        $total += $item['preco']*$item['quant'];
    }
}

echo $total;

?>