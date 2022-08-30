<?php
//MÉTODO POST - manda informações via formulário

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Método POST</title>
</head>
<body>
<form method="POST" action="">
    <input type="text" name="nome" placeholder="Digite seu nome aqui"><br><br>
    <input type="text" name="idade" placeholder="Digite sua idade">
      <hr><button type="submit">Enviar</button>
  </form>

  <?php 
  if (isset($_POST['nome'])&&isset($_POST['idade'])) {
    $nome = limpaPost($_POST['nome'], FILTER_VALIDATE_EMAIL);
    $idade = limpaPost($_POST['idade']);
    echo "<h2>O nome é $nome e a idade é $idade </h2>";
  }

  function limpaPost($valor){//Validação de entradas
    $valor = trim($valor); //remove espaços em brancos do inicio e fim de uma variavel
    $valor = stripslashes($valor); //remove barras de uma string
    $valor = htmlspecialchars($valor); //remove caracteres especiais do html
    return $valor;
  }

  ?>

</body>
</html>