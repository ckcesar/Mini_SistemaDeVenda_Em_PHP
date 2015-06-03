<?php
session_start();
if(!isset($_SESSION['login']) === true && !isset($_SESSION['senha']) === true){
    header('Location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="Pt-BR">
    <head>
        
        <title>Sistem</title>

        <?php include('./head.php'); ?>
        
    </head>
    <body>
    
        <?php include('./menu.php'); ?>
        

        <h2 class="bem_vindo">Bem vindo,  <?php echo $_SESSION['nome'];  ?></h2>

        
    </body>
</html>
