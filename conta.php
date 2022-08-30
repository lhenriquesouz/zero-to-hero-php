<?php

// $a = 7;
// $b = 3;

// if (($a + $b) % 2 != 0) {
//   echo ($a + $b)*2;
// } else{
//   echo pow($a, $b);
// }


// $valorItens = 160;
// $valorFrete = 40;
// $percentualDesconto = 10;

// var_dump(floatval(($valorItens + $valorFrete) - ($percentualDesconto * ($valorItens + $valorFrete) / 100)));


// $cedulas = [50, 20, 20, 10];
// $moedas = [50, 25, 100, 100];

// // echo array_sum($cedulas);
// // echo "<br>";
// // echo array_sum($moedas) / 100;

// echo array_sum($cedulas) + array_sum($moedas) / 100;


// $a = 100;
// $b = 50;

// echo number_format((($a - $b) / $a * 100), 2);


// $moedas = [10, 25, 100, 50, 25, 50];

// $result = array_unique($moedas);
// print_r($moedas);
// echo "<br>";
// print_r($result, SORT_NUMERIC);


$mensagem = 'HTML abbreviation for the English expression HyperText Markup Language, which means: "Hypertext Markup Language" is a language used in the construction of web pages.<?php ?>';

$dados = 'a';

// function mb_count_chars($input) {
//   $l = mb_strlen($input, 'UTF-8');
//   $unique = array();
//   for($i = 0; $i < $l; $i++) {
//       $char = mb_substr($input, $i, 1, 'UTF-8');
//       if(!array_key_exists($char, $unique))
//           $unique[$char] = 0;
//       $unique[$char]++;
//   }
//   return $unique;
// }

for ($i=0; $i < $mensagem; $i++) { 
  echo $i;
}

// function meuNumero($numero){ // Complexidade O(n)

//   for ($i=1; $i < $numero ; $i++) { 
//     echo "-> $i <br>";
//   }

//   echo "Seu numero é $numero";
// }

// meuNumero(50);

// function meuNumero($numero){ // Complexidade O(n²) Pois possui uma laço dentro de outro laço

//   for ($i=1; $i <= $numero ; $i++) { 
//     $linha = "";

//     for ($i=1; $i <= $numero ; $i++) { 
//       $linha = $linha . " " . $numero;
//     }

//      echo $linha . "<br>";

//   }

//   echo "Seu numero é $numero <br><br>";
// }

// meuNumero(10);

// function meuNumero1($numero){ // Complexidade O(n) transformando O(n²) em O(n) pois fizemos 2 laços simples

//   $linha = "";

//   for ($i=1; $i <= $numero ; $i++) { 
//     $linha = $linha . " " . $numero;
//   }

//   for ($i=1; $i <= $numero ; $i++) { 

//     echo $linha . "<br>";

//   }

//   echo "Seu numero é $numero";
// }

// meuNumero1(10);




