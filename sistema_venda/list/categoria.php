<?php

include("../classe/Conexao.php");

$con = new Conexao();

if($_GET['op'] === '0'){
    $sql = "select * from categoria";
}else if($_GET['op'] === '1'){
    $sql = "select * from categoria where idcategoria = " .(int)$_GET['pesquisar'];
}else if($_GET['op'] === '2'){
    $sql = "select * from categoria where categoria like '%" . $_GET['pesquisar'] . "%'";
}

$listagem = $con->listar($sql);

$mostrar = '<table class="tabela_lista" >';
$mostrar .= '<tr class="tr_th_lista">';
$mostrar .= '<th>Código</th>';
$mostrar .= '<th>Categoria</th>';
$mostrar .= '<th>Status</th>';
$mostrar .= '<th colspan="2" >Ação</th>';
$mostrar .= '</tr>';
foreach($listagem as $itens){
    $mostrar .= '<tr class="tr_lista"><td>'.$itens->idcategoria.'</td><td>'.$itens->categoria.'</td><td>'.$itens->status.'</td> <td class="td_alterar"><a onclick="alterar_categoria('.$itens->idcategoria.' ,\''.$itens->categoria.'\');">Alterar</a></td><td class="td_excluir"><a onclick="excluir('.$itens->idcategoria.');" >Excluir</td> </tr>';
}
$mostrar .= '</table>';


if($listagem){
    echo $mostrar;
}else{
    echo"<h2>Não há dados!</h2>";
}