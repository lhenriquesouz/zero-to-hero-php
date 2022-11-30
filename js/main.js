//Ligar o relógio pela primeira vez
setTimeout(()=>{
  var hora = new Date().toLocaleTimeString("pt-BR",{
    hour: "2-digit",
    minute: "2-digit"
  });
  //Alimentando a div com o id
  $("#relogio").html(hora)
}, 100);

//CONTAR CADA SEGUNDO DO RELÓGIO
setInterval(() => {
  var hora = new Date().toLocaleTimeString("pt-BR", {
    hour: "2-digit",
    minute: "2-digit"
  });

  $("#relogio").html(hora);
}, 1000);

$("#cs").click(function (){
  const audio = new Audio('https://www.myinstants.com/pt/instant/elo-musk-uma-vez-disse-44281/?utm_source=copy&utm_medium=share');
  audio.play;
});

function audio(){
  const audio = new Audio('https://www.myinstants.com/pt/instant/elo-musk-uma-vez-disse-44281/?utm_source=copy&utm_medium=share');
  audio.play;
}

function clicou(){
  document.getElementById("button").setAttribute('class', 'imagem');
}


