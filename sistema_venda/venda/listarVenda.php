<?php

include("../classe/Conexao.php");

$con = new Conexao();

if($_GET['op'] === '0'){
    $sql = "select a.idvenda, c.produto, d.nome, d.idcliente, b.preco, b.qtd, c.idproduto from venda a, vendaitem b, produto c, cliente d
                where
                a.idvenda = b.idvenda and
                c.idproduto = b.idproduto and
                d.idcliente = a.idcliente group by b.idvenda";
}else if($_GET['op'] === '1'){
    $sql = "select a.idvenda, c.produto, d.nome, d.idcliente, b.preco, b.qtd, c.idproduto from venda a, vendaitem b, produto c, cliente d
                where
                a.idvenda = b.idvenda and
                c.idproduto = b.idproduto and
                d.idcliente = a.idcliente and  a.idvenda = ".(int)$_GET['pesquisar']." group by b.idvenda ";
}

$listagem = $con->listar($sql);

$mostrar = '<table class="tabela_lista" >';
$mostrar .= '<tr class="tr_th_lista">';
$mostrar .= '<th>Código</th>';
$mostrar .= '<th>Cliente</th>';
$mostrar .= '<th>Produto</th>';
$mostrar .= '<th colspan="2" >Ação</th>';
$mostrar .= '</tr>';
foreach($listagem as $itens){
    $mostrar .= '<tr class="tr_lista"><td>'.$itens->idvenda.'</td><td>'.$itens->nome.'</td><td>'.$itens->produto.'</td> <td class="td_alterar"></td><td class="td_excluir"><a onclick="excluir_venda('.$itens->idvenda.');" >Excluir</td> </tr>';
}
$mostrar .= '</table>';


if($listagem){
    echo $mostrar;
}else{
    echo"<h2>Não há dados!</h2>";
}