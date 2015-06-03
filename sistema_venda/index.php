<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="Pt-BR">
    <head>
        
        <title>Sistema de venda</title>

        <link rel="stylesheet" type="text/css" href="forms/req/style.css" />

        <script type="text/javascript" src="forms/req/jquery.js"></script>
        <script type="text/javascript" src="forms/req/script.js"></script>


    </head>
    <body>
    
        <div class="div_login">
            
            <form id="form_login" method="post">

                <label>
                    Login
                    <input type="text" name="login" id="login" />
                </label>
                
                <label>
                    Senha
                    <input type="password" name="senha" id="senha" />
                </label>
                
                <input type="button" value="Entrar" onclick="entrar();" />
                
            </form>
            
        </div>  
        
    </body>
</html>
