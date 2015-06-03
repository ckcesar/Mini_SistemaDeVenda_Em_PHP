<?php

session_start();

$codigo = $_POST['codigo'];

unset($_SESSION['itensVenda'][$codigo]);

echo '1';

?>