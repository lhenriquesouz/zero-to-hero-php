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


// //SELECIONAR DADOS DA TABELA
// $sql = $pdo->prepare("SELECT * FROM cliente");
// //Comando pra executar a query
// $sql->execute();
// //Método para pegar todas as informações que estão retornando
// $dados = $sql->fetchAll();

// //SELECIONAR UM CAMPO UNICO - EXEMPLO COM FILTRAGEM
// $sql = $pdo->prepare("SELECT * FROM cliente WHERE email = ?");
// $email = 'luis.henrique@gmail.com';
// //Comando pra executar a query, porém com o parametro para procurar o email especifico
// $sql->execute(array($email));
// //Método para pegar todas as informações que estão retornando
// $dados = $sql->fetchAll();


// //ATUALIZAR DADOS DE UMA TABELA
// $id = '';
// $nome = '';
// $email = '';
// $sql = $pdo->prepare("UPDATE cliente SET nome=?, email=? WHERE id=?");
// $sql->execute(array($nome, $email, $id));


// //DELETAR DADOS DE UMA TABELA
// $id = '';
// $sql = $pdo->prepare("DELETE FROM cliente WHERE id=?");
// $sql->execute(array($id));


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
  <h1 style="color: white">Aula Inserindo Dados</h1>
    <form id="form_salva" method="post">
      <input type="text" name="nome" placeholder="Digite seu nome" required>
      <input type="email" name="email" placeholder="Digite seu email" required>
      <button class="btn-salvar" type="submit" name="salvar">Salvar</button>
    </form>

    <form id="form_atualiza" method="post" class="ocultar">
      <input type="text" id="id_editado" name="id_editado" placeholder="Id" readonly="readonly" required>
      <input type="text" id="nome_editado" name="nome_editado" placeholder="Editar nome" required>
      <input type="email" id="email_editado" name="email_editado" placeholder="Editar email" required>
      <button class="btn-salvar" type="submit" name="atualizar">Atualizar</button>
      <button class="btn-cancelar" type="button" id="cancelar" name="cancelar">Cancelar</button>
    </form>

    <form id="form_deleta" method="post" class="ocultar">
      <input type="hidden" id="id_deleta" name="id_deleta" placeholder="Id" readonly="readonly" required>
      <input type="hidden" id="nome_deleta" name="nome_deleta" placeholder="Editar nome" required>
      <input type="hidden" id="email_deleta" name="email_deleta" placeholder="Editar email" required>
      <b>Tem ceretza que deseja deletar o cliente <span id="cliente"></span>?</b>
      <button class="btn-salvar" type="submit" name="deletar">Confirmar</button>
      <button class="btn-cancelar" type="button" id="cancelar_delete" name="cancelar_delete">Cancelar</button>
    </form>
    <br>

    <!-- INSERIR DADOS -->
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

      echo "<b style='color: green'>Dados cadastrado com sucesso!</b><br><br>";
    }
    ?>

    <!-- ATUALIZAR DADOS -->
    <?php
      //PROCESSO DE ATUALIZAÇÃO
      if (isset($_POST['atualizar']) && isset($_POST['id_editado']) && isset($_POST['nome_editado']) && isset($_POST['email_editado'])) {
        $id = limparPost($_POST['id_editado']);
        $nome = limparPost($_POST['nome_editado']);
        $email = limparPost($_POST['email_editado']);

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

        //ATUALIZAR DADOS DE UMA TABELA 
        $sql = $pdo->prepare("UPDATE cliente SET nome=?, email=? WHERE id=?");
        $sql->execute(array($nome, $email, $id));

        if ($sql->rowCount() > 1) {
          echo "<b style='color: green'>Atualizado ".$sql->rowCount() . " registros</b>";
        }
        echo "<b style='color: green'>Atualizado ".$sql->rowCount() . " registro</b>";
        
        header("Location: index.php");
      }
    ?>

    <!-- DELETAR DADOS -->
    <?php
      //PROCESSO DE DELETAR
      //Caso a pessoa clique no botão confirmar delete os dados serão deletados
      if (isset($_POST['deletar']) && isset($_POST['id_deleta']) && isset($_POST['nome_deleta']) && isset($_POST['email_deleta'])) {
        $id = $_POST['id_deleta'];
        $nome = $_POST['nome_deleta'];
        $email = $_POST['email_deleta'];

        //DELETAR DADOS DE UMA TABELA
        $sql = $pdo->prepare("DELETE FROM cliente WHERE id=? AND nome=? AND email=?");
        $sql->execute(array($id, $nome, $email));
      }
    ?>

    <?php
      //SELECIONAR DADOS DA TABELA
      $sql = $pdo->prepare("SELECT * FROM cliente");
      //Comando pra executar a query
      $sql->execute();
      //Método para pegar todas as informações que estão retornando
      $dados = $sql->fetchAll();
    ?>

    <?php
    if (count($dados) > 0) {
      echo  "<table>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
              </tr>";

            foreach ($dados as $key => $dado) {
              echo "<tr>
                      <td>".$dado['id']."</td>
                      <td>".$dado['nome']."</td>
                      <td>".$dado['email']."</td>
                      <td><a href='#' class='btn-atualizar' data-id='".$dado['id']."' data-nome='".$dado['nome']."' data-email='".$dado['email']."'>Editar</a> | <a href='#' class='btn-deletar' data-id='".$dado['id']."' data-nome='".$dado['nome']."' data-email='".$dado['email']."' >Deletar</a></td>
                    </tr>";
            }
            //data-id='' recebe o id que ta vindo do PHP, assim o campo nomes e email tbm.

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
      //Pega o evento de click do botão
      $(".btn-atualizar").click(function(){
        //Cada campo esta recebendo o valor respectivo que ja esta cadastrado
        //NOta-se que attr esta pegando o atributo la da tabela para atualizar
        var id = $(this).attr("data-id");
        var nome = $(this).attr("data-nome");
        var email = $(this).attr("data-email");

        //Habilita form_atualiza quando vai editar e desabilita form_salva
        //Lembrando sempre que estes campos são Id e não pode esquecer do '#'
        $("#form_salva").addClass('ocultar');
        $("#form_atualiza").removeClass('ocultar');
        $("#form_deleta").addClass('ocultar');

        //Quando for clicado os campos vão receber o valor que estão cadastrados nos respectivos campos, vindo do link
        $("#id_editado").val(id);
        $("#nome_editado").val(nome);
        $("#email_editado").val(email);

        //Exemplo que está vindo os valores
        // alert('O ID é: ' + id + ' | nome: ' + nome + ' | email:' + email);
      });

      $(".btn-deletar").click(function(){
        //Cada campo esta recebendo o valor respectivo que ja esta cadastrado
        //NOta-se que attr esta pegando o atributo la da tabela para atualizar
        var id = $(this).attr("data-id");
        var nome = $(this).attr("data-nome");
        var email = $(this).attr("data-email");

        //Habilita form_atualiza quando vai editar e desabilita form_salva
        //Lembrando sempre que estes campos são Id e não pode esquecer do '#'
        $("#form_salva").addClass('ocultar');
        $("#form_atualiza").addClass('ocultar');
        $("#form_deleta").removeClass('ocultar');

        //Quando for clicado os campos vão receber o valor que estão cadastrados nos respectivos campos, vindo do link
        $("#id_deleta").val(id);
        $("#nome_deleta").val(nome);
        $("#email_deleta").val(email);
        $("#cliente").html(nome);//Este html alimenta campos do tipo <span>
      });

      $('#cancelar').click(function(){
        $("#form_salva").removeClass('ocultar');
        $("#form_atualiza").addClass('ocultar');
        $("#form_deleta").addClass('ocultar');
      });

      $('#cancelar_delete').click(function(){
        $("#form_salva").removeClass('ocultar');
        $("#form_atualiza").addClass('ocultar');
        $("#form_deleta").addClass('ocultar');
      });
    </script>
</body>
</html>
