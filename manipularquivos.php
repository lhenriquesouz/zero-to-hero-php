<?php
/*MANIPULAÇÃO DE ARQUIVOS */
//fopen() -> Abrir / Criar.
// fwrite() -> Escrever no arquivo.
// fclose() -> Fechar o arquivo.
// feof() -> Durante a leitura avisa que chegou no final de um arquivo.
// fgets() -> Pega uma linha do arquivo até o máximo de 1024bytes.
// file_put_contents() -> Cria arquivos.
// file_get_contents() -> Pega todo.
// unlink() -> Deleta um arquivo.
// copy() -> Copiar o arquivo.


// $nome_arquivo = date('Y-m-d-H-i-s').".txt"; // fazendo isso cada hora que criarmos uma pasta ele gera com a data e hora diferente
// //Quando criamos com fopen precisamos passar o nome do arquivo e depois da vírgula é o mode que é o modo de execução do fopen, no caso como colocamos o 'a+'ele permite ler e escrever no arquivo.
// $arquivo = fopen($pasta.$nome_arquivo, 'a+'); // Quando colocamos o nome da pasta que criamos '.' o nome que do arquivo que tbm criamos ele coloca o arquivo dentro da pasta. Lembrando que temos que deixar uma '/' no final da pasta criada.
// //Coloca algo dentro do aqruivo, no caso vamos escrever dentro dele.
// fwrite($arquivo, 'Uma linha injetada pelo PHP' . PHP_EOL);
// fwrite($arquivo, 'Uma linha injetada pelo PHP 2' . PHP_EOL);
// fwrite($arquivo, 'Uma linha injetada pelo PHP 3' . PHP_EOL);
// //No caso sempre que abrirmos um arquivo com fopen() temos que fechar ele com o fclose()
// fclose($arquivo);

// //Criamos uma variável somente para passat o caminho do arquivo para ela
// $caminhoArquivo = $pasta.$nome_arquivo;

//Ver se um arquivo existe para ler ele
//file_exists() verifica se o arquivo existe, is_file verifica se é um arquivo
if (file_exists($caminhoArquivo) && is_file($caminhoArquivo)) {
  //Vamos abrir o arquivo usando fopen() e colocando o 'r' ele só vai ler o arquivo
   $abrirArquivo = fopen($caminhoArquivo, 'r');

   //Equanto não chegar no final !feof vai executar o while
   while (!feof($abrirArquivo)) {
    //Pega o conteudo da linha
    echo fgets($abrirArquivo) . "<br>";
   }
   //Lembrando que sempre que abrirmos temos que fechar com o fclose()
   fclose($abrirArquivo);

//   /********* FAZ A MESMA COISA QUE O CÓDIGO DE CIMA FAZ PORÉM MAIS FÁCIL ************/
//   //Porém ele pega todo o conteúdo em uma linha só transformando em 1 só string
  echo file_get_contents($caminhoArquivo);
// }

if (is_dir($pasta)) {
  //Mostra tudo oque tem dentro de uma pasta, lista tudo que tem dentro scandir
  foreach (scandir($pasta) as $aquivo) {
    //Criamos o caminho da pasta + o nome do arquivo que ta dentro da pasta
    $caminho = $pasta.$arquivo;
    //Se o caminho for um arquivo
    if (is_file($caminho)) {
      //Vamos apagar ele com o unlink
      unlink($caminho);
    }
  }

  //No final vamos apagar a pasta
  rmdir($pasta);
}


/*CRIA PAGINA HTML DINAMICA */
$aqruivo = "teste.html";
$titulo = "<h1>Luis</h1>";
file_put_contents($aqruivo, '
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>'
    .$titulo.
  '</body>
  </html>'
);