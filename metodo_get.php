//Método $_GET - Passa os valores através do link que fica na URL
?>
<?php
  // if (isset($_GET['nome'])) {
  //   $nome = htmlspecialchars($_GET['nome']);
  // }else{
  //   $nome = "Mundo!";
  // }

  // if (isset($_GET['cor'])) {
  //   $cor = htmlspecialchars($_GET['cor']);
  // }else{
  //   $cor = 'white';
  // }

  if (isset($_GET['nome']) && isset($_GET['idade'])) {
    echo "<h1>O nome é: $_GET[nome] e a idade é $_GET[idade] </h1>";
  }

  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* body{
      background: <?php echo $cor; ?>;
    } */
  </style>
</head>
<body>
  <form method="GET" action="">
    <input type="text" name="nome" placeholder="Digite seu nome aqui"><br><br>
    <input type="text" name="idade" placeholder="Digite sua idade">
      <hr><button type="submit">Enviar</button>
  </form>
</body>
</html>