<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "teste";

$pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

//FUNÇÃO PARA SANITIZAR (LIMPAR ENTRADAS)
function limparPost($dado){
  //Tira espaços do começo e do fim
  $dado = trim($dado);
  //Tira as barras da variavel
  $dado = stripslashes($dado);
  //Tira caracteres especiais da variavel
  $dado = htmlspecialchars($dado);
  return $dado;
}