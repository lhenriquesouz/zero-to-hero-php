<?php
// ARRAY (matrizes) ***************** INDEXADO ****************

// Pode ser de 2 formas
$carros = array("fusca","uno","gol","toyota", "abelha", "zebra", "luis");
$carros2 = ["fusca","uno","gol"];

//Trocar valor no array
//$carros[0] = "ferrari";

//Inserir valor no array
//$carros[] = "toyota";

//mostra quantidade de itens no array
//$qtd = count($carros);

//******Coloca em ordem alfabética se for numeros ele coloca em ordem ascendente, do menor para o maior********/
//sort($carros);

//******Coloca em ordem alfabética de trás pra frente se for numeros ele coloca em ordem descendente, do maior para o menor********/
//rsort($carros);

// foreach ($carros as $carro) {
//   echo $carro . "<br>";
// }

// echo $carros[3];
// echo $qtd;

//MOSTRAR CONTEUDO DE UM ARRAY DE UMA MATRIZ
/*for ($i=0; $i < $qtd; $i++) { 
  echo $carros[$i] . "<br>";
}

foreach ($carros as $key => $carro) {
  echo $key . $carro . "<br>";
}
*/

// ARRAY (matrizes) ***************** ASSOCIATIVO ****************
//Com o array associativo não pegamos mais os valores por indices e sim por chave
//Isto é, ao invés de pegarmos o valor com echo $idade[0] usamos agora echo $idade["Luis"]
$idade = ["Luis" => "26", "Gabi" => "23", "Vera" => "62", "Amor" => "100"];

//Coloca em ordem alfabética ascendente a-z de acordo com o valor que no caso são os que vem na frente do "=>" 
asort($idade);

//Coloca em ordem descendente z-a de acordo com o valor que no caso são os que vem na frente do "=>" 
//arsort($idade);


//Coloca em ordem alfabética ascendente a-z de acordo com a chave que no caso são os que vem atrás do "=>"
//ksort($idade);

//Coloca em ordem alfabética descendente z-a de acordo com a chave que no caso são os que vem atrás do "=>"
//krsort($idade);

foreach ($idade as $key => $value) {
  echo $key;
  echo $value;
  echo "<br>";
}
