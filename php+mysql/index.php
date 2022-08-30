<?php
require('db/conexao.php');

//INSERIR UM DADO NO BANCO (MODO SIMPLES)
// $sql = $pdo->prepare("INSERT INTO cliente VALUES (null,'Luis', 'luis.henrique@gmail.com', '29-08-2022')");
// //depois da query precisamos dar este comando para eecutar a inserção que fizemos
// $sql->execute();


//MODO CORRETO ANTI SQL INJECTION
// $nome   = "Gabi";
// $email  = "gabi@gmail.com";
// $data   = date("Y-m-d");

// $sql = $pdo->prepare("INSERT INTO cliente VALUES (null,?,?,?)");
// $sql->execute(ARRAY($nome, $email, $data));


//SELECIONAR DADOS DA TABELA
$sql = $pdo->prepare("SELECT * FROM cliente");
//Comando pra executar a query
$sql->execute();
//Método para pegar todas as informações que estão retornando
$dados = $sql->fetchAll();

//SELECIONAR UM CAMPO UNICO
$sql = $pdo->prepare("SELECT * FROM cliente WHERE email = ?");
$email = 'luis.henrique@gmail.com';
//Comando pra executar a query, porém com o parametro para procurar o email especifico
$sql->execute(array($email));
//Método para pegar todas as informações que estão retornando
$dados = $sql->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inserindo dados</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Aula Inserindo Dados</h1>
    <form method="post">
      <input type="text" name="nome" placeholder="Digite seu nome" required>
      <input type="email" name="email" placeholder="Digite seu email" required>
      <button type="submit" name="salvar">Salvar</button>
    </form>
    <br>

    <?php
      //No caso para validar sempre pegamos o atributo 'name' do botão para vermos se estamos enviando, caso estejamos enviamos pegamos os outros campos que no caso tmabém estão no atributo name="".
      if (isset($_POST['salvar']) && isset($_POST['nome']) && isset($_POST['email'])) {

      //Limpando o nome e email com a sanitização
      $nome   = limparPost($_POST['nome']);
      $email  = limparPost($_POST['email']);
      $data   = date("d-m-Y");

      //VALIDAÇÃO DE CAMPO VAZIO
      if ($nome == "" or $nome == null) {
        echo "<b style='color: red'>Nome não pod ser vazio</b>";
        exit();
      }
      if ($email == "" or $email == null) {
        echo "<b style='color: red'>Email não pod ser vazio</b>";
        exit();
      }

      //VALIDAÇÕES DE NOME E EMAIL

      //VERIFICAR SE NOME ESTA CORRETO
      if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
        echo "<b style='color: red'>Somente permitido letras e espaços em branco para o nome!</b>";
        exit();
      }

      //VERFICIAR SE É UM EMAIL VALIDO
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<b style='color: red'>Formato de email inválido!</b>";
        exit();
      }

      $sql = $pdo->prepare("INSERT INTO cliente VALUES (null,?,?,?)");
      $sql->execute(ARRAY($nome, $email, $data));

      echo "<b style='color: green'>Dados cadastrado com sucesso!</b>";
    }
    ?>

    <?php
    if (count($dados) > 0) {
      echo  "<table>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
              </tr>";

            foreach ($dados as $key => $dado) {
              echo "<tr>
                      <td>".$dado['id']."</td>
                      <td>".$dado['nome']."</td>
                      <td>".$dado['email']."</td>
                    </tr>";
            }

      echo "<table>";              
    }else{
      echo  "<table>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
              </tr>";
              echo "<th colspan='3'>Nenhum cliente cadastrado!</th>";
              echo "</table>";
    }

    ?>

</body>
</html>
