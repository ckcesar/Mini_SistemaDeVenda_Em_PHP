<?php
session_start();
if(!isset($_SESSION['login']) === true && !isset($_SESSION['senha']) === true){
    header('Location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="Pt-BR" >
<head>

    <title>Cadastros</title>
    <?php include('./head.php'); ?>

</head>

<body>

<?php include('menu.php'); ?>

<h2 class="bem_vindo">Bem vindo,  <?php echo $_SESSION['nome']; ?></h2>

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
                            Categoria
                            <select class="inputs" name="categoria">
                                <?php
                                   include('../classe/Conexao.php');
                                   $con = new Conexao();
                                   if($con){
                                      $sql = "select * from categoria";
                                      $result = $con->listar($sql);

                                       foreach($result as $linha):
                                           echo"<option value='$linha->idcategoria'> $linha->categoria </option>";
                                       endforeach;
                                   }
                                ?>
                            </select>
                        </label>
                    </li>

                    <li class="lista_form">
                        <label class="labels">
                            Produto
                            <input class="inputs" type="text" id="produto" name="produto" />
                        </label>
                    </li>

                    <li class="lista_form">
                        <label class="labels">
                            Preço
                            <input class="inputs" type="text" id="preco" name="preco" onKeyUp="moeda(this);" />
                        </label>
                    </li>

                    <li class="lista_form">
                        <label class="labels">
                            Saldo
                            <input class="inputs" type="text" id="saldo" name="saldo" onKeyUp="javascript: FiltraNumero(this);" />
                        </label>
                    </li>
                </ul>

                <label>
                    <input class="botao_cadastrar" type="button" value="Enviar" onclick="gravar();" />
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
                            <option>Descrição</option>
                        </select>
                    </li>

                    <li class="lista_form">
                        <input class="inputs" type="text" id="escolha"   />
                    </li>

                    <li class="lista_form">
                        <input class="botao_buscar" id="click_del" type="button" value="Buscar" onclick="listagem(filtro.selectedIndex, escolha.value);" />
                    </li>

                </ul>

            </form>

            <div id="mostrar_dados"></div>
        </div>

    </div>
</div>
</body>
</html>