<?php
//Sempre que for trabalhar com sessão começar com session_start() no inicio
session_start();

$_SESSION['nome'] = "Luis";
$_SESSION['profissao'] = "desenvolvedor";

/* SESSIONS (SESSÔES) --- Sempre colocar no inicio ao iniciar as tags <?php*/
/*Sessão funciona como o cookie, porém ela funciona somente enquanto o site esta sendo rodado, assim que a aba é fechada a sessão se encerra!!! 

//Iniciar sessão
//session_start()

//Criar / modificar variavel de sessao
$_SESSION['nome'] = "Luis";
$_SESSION['profissao'] = "desenvolvedor";

//remover todas as variaveis de sessao pode se usar qualquer uma das 2 opções
session_unset(); 
$_SESSION = array();

//Destruir a sessão
session_destroy();

*/