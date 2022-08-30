<?php
//MANIPULAÇÃO DE PASTAS (DIRETÓRIOS)

$pasta = "nova-pasta";

$dupla = "Teste/nova-pasta/"; //cria 2 pastas em sequencia, com isso também temos que colocar o true na frente como este exemplo:
//mkdir($dupla, 0755, true); neste caso estamos falando pra criar uma pasta, com segurança 0755 e falando que pode criar outra dentro dela tbm

//COMANDO PARA CRIAR UMA PASTA
if (!is_dir($pasta)) { // Verificação pra ver se a pasta existe is_dir, caso não exista vai criar a pasta
  //Para deixarmos um nivel de segurança para termos um controle total porém as pessoas de fora não conseguem colar algo nesta pasta precisamos usar o CHMODE, quando criamos uma pasta somente com o mkdir ele cria totalmente aberto e sem segurança e este é o código 0777, agora para deixarmos com uma boa segurança colocamos o 0755, que é a segurança citada acima.
  mkdir($pasta, 0755); 
}else{
  //COMANDO PARA DELETAR UMA PASTA
  //Deleta a pasta somente se estiver vazia
  rmdir($pasta);
}

//RENOMEAR PASTA
if (!is_dir($pasta)) { // Verificação pra ver se a pasta existe is_dir, caso não exista vai criar a pasta
  mkdir($pasta, 0755); // colocando segurança ao criar uma pasta com o 0755 do CHMODE
}else{
  //COMANDO PARA RENOMEAR UMA PASTA
  //Renomear uma pasta, no caso temos que passar o antigo nome e o novo
  rename($pasta, 'outra-pasta');

  //Para movermos uma pasta que esta dentro de outra usamos também o rename(), mas para mover precisamos passar o nome da pasta que queremos mover, caso tenhamos uma pasta imagem dentro da pasta 'outra-pasta' colocamos:
  //rename($pasta, 'imagem'); com isso irá mover a pasta imagem de dentro
}