<?php
/*MANIPULAÇÂO DE DATAS E HORAS - date() */

//Data completa
// echo date('d/m/Y');
// echo '<br>';

// //Hora
// echo date('H:i:s');

//Calcular dias entre datas
$hoje = date('Y-m-d');
$vencimento = '2022-08-01';

$diferenca = strtotime($vencimento) - strtotime($hoje); //strtotime converte uma data para numeros contando com horas e segundos

//Arredondar a diferença - floor arredonda numero para inteiro (60 segundos, 60 minutos, 24 horas)
$dias = floor($diferenca / (60*60*24));

//Converter data para padrão Brasileiro
$data_convertida = explode('-', $hoje);
$hoje_formatado = $data_convertida[2]."/".$data_convertida[1]."/".$data_convertida[0];

echo $dias . "<br>";
echo $hoje_formatado;

//COMPARAR DUAS DATAS MAIOR OU MENOR
$data1 = date('Y-m-d');
$data2 = '2022-08-01';

if (strtotime($data1) > strtotime($data2)) {
  echo "A data 1 é maior que a data 2";
}elseif (strtotime($data1) == strtotime($data2)) {
  echo "A data 1 é igual a data 2";
} else {
  echo "A data 1 é menor que a data 2";
}

