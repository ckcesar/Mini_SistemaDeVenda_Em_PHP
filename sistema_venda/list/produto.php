<?php

include("../classe/Conexao.php");

$con = new Conexao();

if($_GET['op'] === '0'){
    $sql = "select * from produto a, categoria b where a.idcategoria = b.idcategoria";
}else if($_GET['op'] === '1'){
    $sql = "select * from produto a, categoria b where a.idcategoria = b.idcategoria and a.idproduto = " .(int)$_GET['pesquisar'];
}else if($_GET['op'] === '2'){
    $sql = "select * from produto a, categoria b where a.idcategoria = b.idcategoria and a.produto like '%" . $_GET['pesquisar'] . "%'";
}

$listagem = $con->listar($sql);

$mostrar = '<table class="tabela_lista" >';
$mostrar .= '<tr class="tr_th_lista">';
$mostrar .= '<th>Código</th>';
$mostrar .= '<th>Produto</th>';
$mostrar .= '<th>Categoria</th>';
$mostrar .= '<th colspan="2" >Ação</th>';
$mostrar .= '</tr>';
foreach($listagem as $itens){
    $mostrar .= '<tr class="tr_lista"><td>'.$itens->idproduto.'</td><td>'.$itens->produto.'</td><td>'.$itens->categoria.'</td> <td class="td_alterar"><a onclick="alterar_produto('.$itens->idproduto.', '.$itens->idcategoria.' ,\''.$itens->produto.'\', \''.$itens->preco.'\', \''.$itens->saldo.'\');">Alterar</a></td><td class="td_excluir"><a onclick="excluir('.$itens->idproduto.');" >Excluir</td> </tr>';
}
$mostrar .= '</table>';

if($listagem){
    echo $mostrar;
}else{
    echo"<h2>Não há dados!</h2>";
}