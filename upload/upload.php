<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Upload de Arquivos</title>
</head>
<body>  
  <div class="container">
    <h1 class="mt-5 text-center">Upload de arquivos</h1>
    <!-- Obrigatório para enviarmos os arquivos para o servidor não podemos esquecer de colocar enctype="multipart/form-data" desta maneira -->
    <form action="" class="m-3" enctype="multipart/form-data" method="POST">
    <div class="input-group">
      <input type="file" class="form-control" id="arquivo" aria-describedby="arquivo" name="arquivo" aria-label="Upload" required>
      <button class="btn btn-primary" name="enviar" type="submit" id="enviar">Enviar</button>
    </div>
    </form>
  </div>

  <?php
  //Validação para ver se enviamos o post com o arquivo
    if (isset($_POST['enviar'])) {
      //Esta super global tem todas as informações do arquivo que estamos enviando
      //var_dump($_FILES);

      //VALIDAÇÕES
      $tamanhoMaxArquivo =  2097152; // tamanho máximo do arquivo vai ser 2MB porém precisei converter em bytes
      $formatoArquivo = array("jpg", "png", "jpeg", "webp", "mp4"); // Quais formatos de arquivos vamos aceitar.
      //pathinfo é para pegarmos todas as informações do arquivo.
      //No caso pegamos o arquivo através do $_FILES e o nome que esta dentro dele é o mesmo que esta no input no atrbibuto name="".
      //Continuando.. Também precisamos passar qual o atributo que vamos pegar que no caso é o 'name'
      //PATHINFO_EXTENSION pega somente a extensão do arquivo que estamos passando.
      $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

      //Verificar se o tamanho da imagem é permitido
      //Neste caso estamos vendo o atributo size se é maior doque o permitido
      if ($_FILES['arquivo']['size'] >= $tamanhoMaxArquivo) {
        echo '<div class="alert alert-danger" role="alert">
                Tamanho do arquivo maior que 2MB, não foi possivel fazer o Upload!
              </div>';
      }else {
        //Verificar se extensão é permitida
        //in_array verifica se dentro da extensão que esta puxando do $_FILES['arquivo']['name'] existe alguma igual ao array passado no $formatoArquivo
        if (in_array($extensao, $formatoArquivo)) {
          //echo "Extensão permitida";
          $pasta = "imagens/";
          if (!is_dir($pasta)) {
            mkdir($pasta, 0755);
          }

          //Pega o valor do nome temprario do arquivo que ficou salvo no servidor
          $tmp = $_FILES['arquivo']['tmp_name'];
          //uniqid -> cria um id unico
          //Com isso ele forma um novo nome de um arquivo para não ter nomes de arquivos repetidos e sobrescrever algum
          //No caso ele cria um nome com alguns numeros .extensão
          $novoNome = uniqid().".$extensao";

          //move_uploaded_file função para enviar o arquivo para o servidor.
          //Ai no caso passamos o nome temporário do arquivo ',' depois colocamos o novo nome e onde vamos salvar. 
          if (move_uploaded_file($tmp, $pasta.$novoNome)) {
            echo '<div class="alert alert-success container" role="alert">
                  Upload realizado com sucesso!<br>
                  </div>';
          }else{
            echo '<div class="alert alert-danger container" role="alert">
                    Erro: Upload não realizado!
                  </div>';
          }

        }else {
          echo '<div class="alert alert-danger container" role="alert">
                  Erro: A extensão '.$extensao. ' não é permitida!
                </div>';
        }
      }
    }
  ?>

  
  <!-- BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>