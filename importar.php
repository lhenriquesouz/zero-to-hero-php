<?php
$hoje = date('Y-m-d');


//Converter data para padrão Brasileiro
$data_convertida = explode('-', $hoje);

echo $hoje . "<br>";
echo $data_convertida[0] . "<br>";
var_dump($data_convertida);