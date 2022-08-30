<?php
//SUPERGLOBAIS
/*Algumas variaveis predefinidas no PHP são "Superglobais", 
o que significa que eleas são sempre acessíveis, independetemente do escopo - 
e você pode acessá-las a partir de qualquer função, classe ou 
arquivo sem ter que fazer nada de especial. */

/* ******* SÂO ELAS ********
$GLOBALS
$_SERVER
$_REQUEST
$_POST
$_GET
$_FILES
$_ENV
$_COOKIE
$_SESSION
*/

//$GLOBALS -> TRASNFORMANDO VARIAVEIS EM GLOBAIS, assim ela funciona em qualquer escopo
$a = 10;
$b = 10;

function soma(){
  //Estas 2 formas de globais estão certas
  //$GLOBALS['c'] = $GLOBALS['a'] + $GLOBALS['b'];
  global $a, $b, $c;

  $c = $a + $b;
}

soma();
echo $c;


//$_SERVER -> 
echo $_SERVER['PHP_SELF']; //mostra o caminho do arquivo que estamos trabalhando
echo "<br>";
echo $_SERVER['SERVER_NAME']; //Mostra o nome do servidor
echo "<br>";
echo $_SERVER['HTTP_HOST']; //Mostra o cabeçalho do servidor que estamos
echo "<br>";
echo $_SERVER['REMOTE_ADDR']; //Mostra o endereço remoto, ou seja o endereço de IP da rede
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT']; //Informações de quem esta acessando a página

foreach ($_SERVER as $key => $value) {
  echo "<br>Chave <strong>$key</strong> - $value";
}
