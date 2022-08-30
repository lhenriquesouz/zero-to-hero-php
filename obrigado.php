<?php
//echo "<h1>Obrigado, formulario enviado com sucesso!</h1>";
session_start();

print_r($_SESSION);

echo $_SESSION['nome'];