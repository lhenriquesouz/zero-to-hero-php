<?php
  // Manipulado numeros
  $valor1 = 100;
  $valor2 = 100.5;
  $valor3 = "teste";
  $valor4 = array();

  var_dump(is_numeric($valor3));
  var_dump(is_int($valor1));
  var_dump(is_float($valor4));
  var_dump(is_array($valor4));