

$(document).ready(function(){

    var hash = window.location.hash;
 

    if(hash != '') {
        $('.abas li a[href="' + hash + '"]').parent().addClass('ativo');
        if(hash ===  '#consulta'){
            $('#cadastro').hide();
            $('#consulta').show();

        }else if(hash === '#cadastro'){
            $('#consulta').hide();
            $('#cadastro').show();

        }
    } else {
        $('.abas li a[href="#cadastro"]').parent().addClass('ativo');
    }

    $('.abas li .link').click(function(){

        if(hash === ''){

            $('.abas li').removeClass('ativo');
            $(this).parent().addClass('ativo');

            var ancora = $(this).attr('href').replace(hash, '');

            if(ancora ===  '#consulta'){
                $('#cadastro').hide();
                $('#consulta').show();

            }else if(ancora === '#cadastro'){
                $('#consulta').hide();
                $('#cadastro').show();

            }
        }else{

            $('.abas li').removeClass('ativo');
            $(this).parent().addClass('ativo');

            var ancora = $(this).attr('href');

            if(ancora ===  '#consulta'){
                $('#cadastro').hide();
                $('#consulta').show();

            }else if(ancora === '#cadastro'){
                $('#consulta').hide();
                $('#cadastro').show();

            }
        }

    });

});

function entrar(){
    $.ajax({
        url:'forms/login.php',
        type:'POST',
        data: $('#form_login').serialize(),
        success:function(data){
            if(data === '1'){
                alert('entrou');
                location.href='forms/sistem.php'
            }else{
                alert('erro');
                location.href='index.php';
            }
        }
    });
}

function gravar(){
    var hash = window.location.hash;
    var url_total = window.location.href;
    var url = url_total.replace('http://projetos.local/Arquivos_Cesar/sistema_venda/forms/','');
    var url_final = url.replace(hash,'');

    $.ajax({
        url:'../cad/'+url_final,
        type:'POST',
        data: $('#formulario').serialize(),
        success:function(data){
            if(data === '1'){
                alert('Gravou.');
                document.getElementById("formulario").reset();
            }else if(data === '2'){
                alert('Alterado com sucesso.');
                document.getElementById("formulario").reset();
            }else{
                alert('Erro!"'+data);
            }
        }
    });

}

function listagem(opcao,codigo){
    var hash = window.location.hash;
    var url_total = window.location.href;
    var url = url_total.replace('http://projetos.local/Arquivos_Cesar/sistema_venda/forms/','');
    var url_final = url.replace(hash,'');


    $.ajax({
        url:'../list/'+url_final,
        type:'GET',
        data:{
            op:opcao,
            pesquisar:codigo
        },
        success:function(data){
           $('#mostrar_dados').html(data);
        }
    });

}

function alterar_categoria(codigo, categoria){

    var hash = window.location.hash;

    if(hash === '#consulta'){

        $('.abas li').removeClass('ativo');
        $('.abas li a[href="#cadastro"]').parent().addClass('ativo');

        $('#consulta').hide();
        $('#cadastro').show();

        location.href='#cadastro';

        $('#codigo').val(codigo);
        $('#categoria').val(categoria);

    }

}

function alterar_produto(codigo, categoria, produto, preco, saldo){

    var hash = window.location.hash;

    if(hash === '#consulta'){

        $('.abas li').removeClass('ativo');
        $('.abas li a[href="#cadastro"]').parent().addClass('ativo');

        $('#consulta').hide();
        $('#cadastro').show();

        location.href='#cadastro';

        $('#codigo').val(codigo);
        $('#categoria').val(categoria);
        $('#produto').val(produto);
        $('#preco').val(preco);
        $('#saldo').val(saldo);

    }

}

function alterar_cliente(codigo, nome, email){

    var hash = window.location.hash;

    if(hash === '#consulta'){

        $('.abas li').removeClass('ativo');
        $('.abas li a[href="#cadastro"]').parent().addClass('ativo');

        $('#consulta').hide();
        $('#cadastro').show();

        location.href='#cadastro';

        $('#codigo').val(codigo);
        $('#nome').val(nome);
        $('#email').val(email);

    }

}

function alterar_usuario(codigo, nome, email){

    var hash = window.location.hash;

    if(hash === '#consulta'){

        $('.abas li').removeClass('ativo');
        $('.abas li a[href="#cadastro"]').parent().addClass('ativo');

        $('#consulta').hide();
        $('#cadastro').show();

        location.href='#cadastro';

        $('#codigo').val(codigo);
        $('#nome').val(nome);
        $('#email').val(email);

    }

}

function excluir(codigo){
    var hash = window.location.hash;
    var url_total = window.location.href;
    var url = url_total.replace('http://projetos.local/Arquivos_Cesar/sistema_venda/forms/','');
    var url_final = url.replace(hash,'');

    if(confirm('Deseja excluir?')){

        $.ajax({
            url:'../del/'+url_final,
            type:'POST',
            data:'codigo='+codigo,
            success:function(data){
                if(data === '1'){
                    alert('Foi excluido!');
                    document.getElementById('click_del').click();
                }else{
                    alert('Tabela tem dependência.');
                }
            }
        });

    }

}

function FiltraNumero(campo){
    var digits="0123456789"
    var campo_temp
    for (var i=0;i<campo.value.length;i++){
        campo_temp=campo.value.substring(i,i+1)
        if (digits.indexOf(campo_temp)==-1){
            campo.value = campo.value.substring(0,i);
            alert("Por Favor digite somente números!");
            break;
        }
    }
}

function moeda(z){
    v = z.value;
    v=v.replace(/\D/g,"")  //permite digitar apenas números
    v=v.replace(/[0-9]{12}/,"inválido")   //limita pra máximo 999.999.999,99
    v=v.replace(/(\d{1})(\d{8})$/,"$1.$2")  //coloca ponto antes dos últimos 8 digitos
    v=v.replace(/(\d{1})(\d{1,2})$/,"$1.$2")  //coloca ponto antes dos últimos 5 digitos
    //v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2")    //coloca virgula antes dos últimos 2 digitos
    z.value = v;
}

function procuraProduto(codigo){
    $.ajax({
        url: '../list/prod.php',
        data: 'codigo=' + codigo,
        type: 'POST',
        success: function (data) {
            if(data) {
                var campos = data.split("|");
                $('#produto').val(campos[0]);
                $('#preco').val(campos[1]);
                $('#codigo').val(campos[2]);

                if(campos[3]=='s') {
                    document.getElementById('quant').focus();
                }
            }
        }
    });
}

                function checar() {
                    /* é criado uma var para cada select */
                    campo1 = $('#preco').val();
                    campo2 = $('#quant').val();

                    /* se o select1 estiver com valor selecionado, é somado o valor dele */
                    if(campo1 !== "") {
                        valor1 = campo1;
                    } else {
                        valor1 = ""; // se não, o valor do select será vazio
                    }

                    /* se o select2 estiver com valor selecionado, é somado o valor dele */
                    if(campo2 != "") {
                        valor2 = campo2;
                    } else {
                        valor2 = ""; // se não, o valor do select será vazio
                    }

                    /* aqui é criado: um e dois, e feito um calculo para soma */
                    um = valor1*2/2; // calculo para o select1
                    dois = valor2*2/2; // calculo para o select2

                    if(um === "" && dois === "") {
                        document.getElementById('valortotal').value = "";
                    } else {
                        document.getElementById('valortotal').value = um*dois; // se os selects tem algum valor

                    }

                }

function listItens () {
    $.ajax({
        url: '../venda/itens.php',
        success: function(data){
            $('#listaItens').html(data);
        }
    });
    $.ajax({
        url: '../venda/totalItens.php',
        success: function(data){
            $('#totalItens').val(data);
        }
    });
}

function adicionarItem(){
    $.ajax({
        url: '../venda/novoItem.php',
        data: $('#formulario').serialize(),
        type: 'POST',
        success: function (data) {
            if (data === '1'){
                document.forms[0].reset();
                document.getElementById('produto').focus();
            listItens();
        }}
    });
}


function deletar (codigo) {
    if (confirm('Deseja realmente excluir o registro ?')) {
        $.ajax({
            url: '../venda/delItem.php',
            data: 'codigo='+codigo,
            type: 'POST',
             success: function (data) {
                if (data == '1') {
                    listItens ();
                } else {
                    alert('Erro: Consulte o administrador.');
            }
         }
        });
    }
}

function gravar_venda(){
    $.ajax({
        url: '../venda/cadvenda.php',
        data: $('#formulario').serialize(),
        type: 'POST',
         success: function (data){
            if (data === '1'){
                document.forms[0].reset();
                alert('Gravou a venda!');
                 document.getElementById('cliente').focus();
                 listItens();
             } else {
                alert('Erro!'+data);
              }
        }
    });
}

function listar_venda(opcao, codigo){
    $.ajax({
        url:'../venda/listarVenda.php',
        type:'GET',
        data:{
            op:opcao,
            pesquisar: codigo
        },
        success: function(data){
            $('#mostrar_dados').html(data);
        }
    });
}

function excluir_venda(codigo){
    if(confirm('Deseja excluir?')){

        $.ajax({
            url:'../venda/delVenda.php',
            type:'POST',
            data:'codigo='+codigo,
            success:function(data){
                if(data === '1'){
                    alert('Foi excluido!');
                    document.getElementById('click_del').click();
                }else{
                    alert('Tabela tem dependência.');
                }
            }
        });

    }
}