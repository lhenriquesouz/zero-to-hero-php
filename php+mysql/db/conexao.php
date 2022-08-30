<?php
//CONFIGURAÇÃO
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "teste";

//CONEXÃO
//Com o try falamos para ele tentar fazer a conexão, caso não de certo passamos um novo parametro que sera o $pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
  $pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
  //Catch é oque vai acontecer caso o Try não funcione
  //No caso estamos mostrando qual é o erro com o $erro->getMessage()
  echo "Falha ao tentar se conectar com o banco " . $erro->getMessage();
}

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