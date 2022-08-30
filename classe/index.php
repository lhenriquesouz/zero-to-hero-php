<?php 
include 'class.php';

$carro1 = new carro("Branco", "Gol", "2000", 13000);
$carro1->mensagem();
//echo $carro1->modelo;


//NULL COALESCE
$a = 5;
//SE NÃO EXISTIR A VARIAVEL $a ELE RETORNA 10
echo $x = $a ?? 10;