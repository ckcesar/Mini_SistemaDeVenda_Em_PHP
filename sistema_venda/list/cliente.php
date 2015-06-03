<?php

include("../classe/Conexao.php");

$con = new Conexao();

if($_GET['op'] === '0'){
    $sql = "select * from cliente";
}else if($_GET['op'] === '1'){
    $sql = "select * from cliente where idcliente = " .(int)$_GET['pesquisar'];
}else if($_GET['op'] === '2'){
    $sql = "select * from cliente where nome like '%" . $_GET['pesquisar'] . "%'";
}

$listagem = $con->listar($sql);

$mostrar = '<table class="tabela_lista" >';
$mostrar .= '<tr class="tr_th_lista">';
$mostrar .= '<th>Código</th>';
$mostrar .= '<th>Nome</th>';
$mostrar .= '<th>E-mail</th>';
$mostrar .= '<th colspan="2" >Ação</th>';
$mostrar .= '</tr>';
foreach($listagem as $itens){
    $mostrar .= '<tr class="tr_lista"><td>'.$itens->idcliente.'</td><td>'.$itens->nome.'</td><td>'.$itens->email.'</td> <td class="td_alterar"><a onclick="alterar_cliente('.$itens->idcliente.' ,\''.$itens->nome.'\', \''.$itens->email.'\' );">Alterar</a></td><td class="td_excluir"><a onclick="excluir('.$itens->idcliente.');" >Excluir</td> </tr>';
}
$mostrar .= '</table>';

if($listagem){
    echo $mostrar;
}else{
    echo"<h2>Não há dados!</h2>";
}