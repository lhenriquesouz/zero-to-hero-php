<?php
//Para iniciar as variaveis, pois se não inicar elas dará um erro de variaveis não enonctradas
$erroNome = "";
$erroEmail = "";
$erroSenha = "";
$erroRepeteSenha = "";

//VALIDAÇÂO DE FORMULÁRIO
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Verificar se está vazio o POST nome
  if (empty($_POST['nome'])) {
    $erroNome = 'Por favor preencha o campo nome';
  }else {
    //Pegar o valor vindo do POST e limpar
    $nome = limpaPost($_POST['nome']);
    //Verificar se tem somente letras
    if (!preg_match("/^[a-zA-Z-' ]*$/", $nome)) {
      $erroNome = "Aceitamos apenas letras";
    }
  }

  //Verificar se está vazio o POST EMAIL
  if (empty($_POST['email'])) {
    $erroEmail = 'Por favor, informe o email!';
  }else {
    $email = limpaPost($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erroEmail = 'Por favor, insira um email válido!';
    }
  }

  //Verificar se está vazio o POST SENHA
  if (empty($_POST['senha'])) {
    $erroSenha = 'Por favor, informe uma senha!';
  }else {
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    if (strlen($senha) < 6) {
      $erroSenha = 'A senha precisa ter no minimo 6 digitos!';
    }
  }

  //Verificar se está vazio o POST REPETE-SENHA
  if (empty($_POST['repete_senha'])) {
    $erroRepeteSenha = 'Por favor, repita a senha que colocou no campo acima!';
  }else {
    $repete_senha = $_POST['repete_senha'];
    if (!password_verify($repete_senha, $senha)) {
      $erroRepeteSenha = "Senhas não combinam, por favor repita a senha corretamente!";
    }
  }

  //Caso não tenha nenhum erro envia para a página de agradecimento
  // if (($erroNome == "") && ($erroEmail == "") && ($erroSenha == "") && ($erroRepeteSenha == "")) {
  //   //Redireciona para uma página
  //   header('Location: obrigado.php');
  // }

}

//Função para validar e limpar os campos preenchidos
function limpaPost($valor){
  $valor = trim($valor);
  $valor = stripslashes($valor);
  $valor = htmlspecialchars($valor);
  return $valor;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>
<body>
  <main>
    <h1>Validação de Formulário</h1>

    <form action="" method="POST">

      <label for="">Nome Completo</label>
      <input type="text" name="nome" <?php if(!empty($erroNome)){echo "class='invalido'";}?> <?php if(isset($_POST['nome'])){echo "value='".$_POST['nome']."'";} ?> placeholder="Digite seu nome" required>
      <br><span class="erro"><?php echo $erroNome; ?></span>

      <label for="">Email</label>
      <input type="text" name="email" <?php if(!empty($erroEmail)){echo "class='invalido'";}?> <?php if(isset($_POST['email'])){echo "value='".$_POST['email']."'";} ?> placeholder="Digite seu email" required>
      <br><span class="erro"><?php echo $erroEmail; ?></span>

      <div class="senha-relative">
      <label for="">Senha</label>
      <input type="password" id="senha" name="senha" <?php if(!empty($erroSenha)){echo "class='invalido'";}?> <?php if(isset($_POST['senha'])){echo "value='".$_POST['senha']."'";} ?> placeholder="Digite sua senha" required>
      <br><span class="erro"><?php echo $erroSenha; ?></span>
      <img id="olho" class="lnr lnr-eye" src=""/>
      </div>

      <div class="repete-senha-relative">
      <label for="">Repita senha</label>
      <input type="password" id="senha2" name="repete_senha" <?php if(!empty($erroRepeteSenha)){echo "class='invalido'";}?> <?php if(isset($_POST['repete_senha'])){echo "value='".$_POST['repete_senha']."'";} ?> placeholder="Digite sua senha novamente" required>
      <br><span class="erro"><?php echo $erroRepeteSenha; ?></span>
      <span id="olho2" class="lnr lnr-eye ln"></span>
      </div>

      <button type="submit">Enviar Formulário</button>
    </form>

    <?php
      if (isset($_POST['nome'])&&isset($_POST['email'])&&isset($_POST['senha'])&&isset($_POST['repete_senha'])) {
        echo "$nome";
        echo "<br>$email";
        echo "<br>$senha";
      }
    ?>

  </main>
  <script>
    var senha = $('#senha');
    var senha2 = $('#senha2');
    var olho= $("#olho");
    var olho2= $("#olho2");

    olho.mousedown(function() {
      senha.attr("type", "text");
    });
    olho2.mousedown(function() {
      senha2.attr("type", "text");
    });

    olho.mouseup(function() {
      senha.attr("type", "password");
    });
    olho2.mouseup(function() {
      senha2.attr("type", "password");
    });
    // para evitar o problema de arrastar a imagem e a senha continuar exposta, 
    //citada pelo nosso amigo nos comentários
    $( "#olho" ).mouseout(function() { 
      $("#senha").attr("type", "password");
    });
    $( "#olho2" ).mouseout(function() { 
      $("#senha2").attr("type", "password");
    });
  </script>
</body>
</html>
