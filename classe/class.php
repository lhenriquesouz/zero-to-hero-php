<?php
  class carro {
      public $cor;
      public $modelo;
      public $ano;
      public $valor;
      public function __construct($cor, $modelo, $ano, $valor){
        $this->cor = $cor;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->valor = $valor;
      }

      public function mensagem(){
        echo "A cor do carro é $this->cor e o modelo é $this->modelo do ano $this->ano valor:R$ $this->valor";
      }
}  