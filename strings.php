<?php

$texto = "ola mundo";

//strlen
//echo strlen($texto); // Conta quantas letras tem no texto

//str_word_count
//echo str_word_count($texto); // Conta quantas palavras tem no texto

//strrev
//echo strrev($texto); // Coloca o texto de trás pra frente

//strpos
//echo strpos($texto, "mundo"); // acha a posição que esta a palavra que vc esta procurando no texto que vc passou, o primeiro parametro é o texto, o segundo é a palavra que vc quer

//str_replace
echo str_replace("mundo","Luis", $texto); // Neste caso troca as palavras que queremos em um determinado texto, temos 3 parametros que é 1º a palavra que vc quer tirar que ja existe,2º a palavra que vc quer inserir, 3º varivael que vc quer mudar e que esta o valor