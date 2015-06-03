<?php
session_start();
if(!isset($_SESSION['login']) === true && !isset($_SESSION['senha']) === true){
    header('Location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="Pt-BR" >
<head>

    <title>Venda</title>
    <?php include('./head.php'); ?>

</head>

<body>

<?php include('menu.php'); ?>

<h2 class="bem_vindo">Bem vindo,  <?php echo $_SESSION['nome'];  ?></h2>

<div class="corpo_tela">

    <ul class="abas">
        <li><a class="link" href="#cadastro">Cadastro</a></li>
        <li><a class="link" href="#consulta">Consulta</a></li>
    </ul>

    <!--    <div id="mostrar"></div>-->

    <div id="conteudo">

        <div id="cadastro">
            <form id="formulario" class="form" >

                <ul class="inicio_lista_form">

                    <input class="inputs" type="hidden" id="codigo" name="codigo" />


                    <li class="lista_form">
                        <label class="labels">
                            Cliente
                            <select class="inputs" name="cliente" id="cliente">
                                <?php
                                   include('../classe/Conexao.php');
                                   $con = new Conexao();
                                   if($con){
                                      $sql = "select * from cliente";
                                      $result = $con->listar($sql);

                                       foreach($result as $linha):
                                           echo"<option value='$linha->idcliente'> $linha->nome </option>";
                                       endforeach;
                                   }
                                ?>
                            </select>
                        </label>                        
                    
                    </li>

                   <li class="lista_form">
                        <label class="labels">   
                            Código do produto                         
                            <input class="inputs" type="text" id="produto" name="produto" onChange="procuraProduto(this.value);" onKeyUp="javascript: FiltraNumero(this);"  />
                        </label>
                    </li> 

                    <li class="lista_form">
                        <label class="labels">                            
                            <input class="inputs" type="hidden" value="<?php echo $_SESSION['usuario']; ?>" id="usuario" name="usuario" />
                        </label>
                    </li>

                    <li class="lista_form">
                        <label class="labels">
                            Preço
                            <input class="inputs" type="text" readonly id="preco" name="preco" onKeyUp="moeda(this);" />
                        </label>
                    </li>

                    <li class="lista_form">
                        <label class="labels">
                            Quantidade
                            <input class="inputs" type="text" id="quant" name="quant" onChange="checar()" onKeyUp="javascript: FiltraNumero(this);" />
                        </label>
                    </li>

                    <li class="lista_form">
                        <label class="labels">
                            Valor Total
                            <input class="inputs" type="text" readonly id="valortotal" name="valortotal" onKeyUp="moeda(this);" onChange="checar()"  />
                        </label>
                    </li>


                    <li class="lista_form">
                        <label class="labels">
                            Total da compra
                            <input class="inputs" type="text" readonly name="totalItens" value="" id="totalItens"  onKeyUp="moeda(this);" />
                        </label>
                    </li>

                    <li class="lista_form">
                        <label class="labels">
                            <input class="inputs" type="button"  id="mais" name="mais" value="Mais" style="width: 21%;" onclick="adicionarItem();"  />
                        </label>
                    </li>

                    <li class="lista_form">
                        <label class="labels">
                            Valor Pago
                            <input class="inputs" type="text" name="valor_pago" value="" id="valor_pago"  onKeyUp="moeda(this);" />
                        </label>
                    </li>

                </ul>

                <div style="width:100%;  border: 1px solid; height: 150px; overflow: auto; " id="listaItens">  </div>

                <label>
                    <input class="botao_cadastrar" type="button" value="Enviar" onclick="gravar_venda();" />
                </label>

            </form>
        </div>

        <div id="consulta" style="display: none;">
            <form class="form" method="get" >

                <ul class="inicio_lista_form">

                    <li class="lista_form">
                        <select class="inputs" id="filtro" >
                            <option>Geral</option>
                            <option>Código</option>
                        </select>
                    </li>

                    <li class="lista_form">
                        <input class="inputs" type="text" id="escolha"   />
                    </li>

                    <li class="lista_form">
                        <input class="botao_buscar" id="click_del" type="button" value="Buscar" onclick="listar_venda(filtro.selectedIndex, escolha.value);" />
                    </li>

                </ul>

            </form>

            <div id="mostrar_dados"></div>
        </div>

    </div>
</div>
</body>
</html>