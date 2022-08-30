<?php

$password = $_POST['senha'];

$senha = password_hash($password, PASSWORD_BCRYPT);

echo "Senha: ". $senha . "<br>";
echo "Hash: ". $hash . "<br>";

if (password_verify($password, $senha)) {
  echo 'Passwords são validos!';
} else {
  echo 'Passwords não são inválidos!';
}

?>

<form action="" method="post">
  <input type="text" name="senha">
  <button type="submit">Enviar</button>
</form>