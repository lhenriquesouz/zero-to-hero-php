<?php
  // LAÇOS DE REPETIÇÃO

  //WHILE -> enquanto for verdadeiro ele vai executar esse bloco
  // $x = 1;
  // while ($x <= 5) {
  //   echo "O numero é: $x <br>";
  //   $x++;
  // }


  //DO WHILE -> executa um bloco, e depois repete o loop desde que a condição seja verdadeira
  // $x = 1;
  // do {
  //   echo "O numero é: $x <br>";
  //   $x++;
  // } while ($x <= 10);


  //FOR
  // for ($i=1; $i < 10; $i++) { 
  //   for ($j=0; $j < 10; $j++) { 
  //     echo "$i X $j é: ". $i * $j . "<br>";
  //   }
  // }


  //FOREACH -> executa algo para cada item dentro de uma matriz
  $cores = ["azul", "amarelo", "verde", "vermelho"];
  foreach ($cores as $cor) {
    echo "A cor é $cor <br>";
  }



