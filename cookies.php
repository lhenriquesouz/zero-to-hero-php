<?php
/* COOKIES */

//Cookie pra salvar nome
//Determinamos o tempo que o cookie vai ficar salvo, no caso esse 86400 são os segundos, que no caso são 1 dia.
// **** setcookie('nome', 'Luis', time()+(86400 * 30)); 

//deletar um cookie
// **** setcookie('nome', '', time() - 3600); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cookie</title>
</head>
<body>
    <h1>Cookies 🍪</h1>

    <!-- Recuperar o valor do cookie -->
    <?php if (isset($_COOKIE['nome'])){
      $nome = $_COOKIE['nome'];
      echo "O nome que esta no cookie é $nome";
    }else{
      echo "Não existe cookie armazenado";
    }
    ?>

    <!-- Saber quantos cookies temos armazenados no localhost -->
    <?php if(count($_COOKIE) > 0){
      $qtd = count($_COOKIE);
      echo "Tem cookies $qtd";
    }else{
      echo "Não tem cookies";
    }
     ?>

</body>
</html>

