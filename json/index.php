<?php
/* JSON - "JavaScript Object Notation" */

/* CONVERTE TEXTO EM UM OBJETO OU MATRIZ */
//json_decode();

/* CONVERTE ARRAY/OBJETO EM TEXTO, UMA STRING JSON */
//json_encode();

// $texto = '{
//   "cep": "37757-000",
//   "logradouro": "",
//   "complemento": "",
//   "bairro": "",
//   "localidade": "Poço Fundo",
//   "uf": "MG",
//   "ibge": "3151701",
//   "gia": "",
//   "ddd": "35",
//   "siafi": "5033"
// }';

//Para transormar um objeto em array colocamos dentro do json_decode o parametro TRUE json_decode($texto, TRUE)
//Uma vantagem ao transformar um objeto em array é que conseguimos inserir dados mais facilmente.
//$dados = json_decode($texto, true); //JSON_DECODE = CONVERTE TEXTO EM MATRIZ
//A setinha -> usamos para pegar ou mostrar algum valor quando estamos mexendo com objeto em PHP
//echo $dados->cep;
//Ja quando estamos mexendo com array ou transformamos o objeto em array, pegamos o valor dele da seguinte forma
//echo $dados['cep'];

//Quando transformamos em array conseguimos inserir dados assim, com isso facilita muito.
//echo $dados['profissao'] = "Programador";

//Para deixarmos o json transformado em texto mais bonito, passamos como parametro o seguinte argumento JSON_PRETTY_PRINT
//Para colocarmos acentuação correta usamos o JSON_UNESCAPED_UNICODE com isso ele mostra os acentos corretamente
//$json = json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

//var_dump($dados);
//echo "<pre>$json</pre>";

$texto = $_POST['texto']; // Recebe os dados do Ajax
$dados = json_decode($texto, true); // transforma texto em objeto ou array, no caso como passou ", true" transformou em array

$dados['professor'] = "PHP";

$json = json_encode($dados); // Transforma o array em texto novamente pra mandar pro Ajax
echo $json;