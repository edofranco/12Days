<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>12 Days of Xmas - Hozt & Friends</title>
	<script src="jquery.js"></script>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Roboto:400,300,500);
@font-face {
  font-family: "onclef";
  src:url("onclef.eot");
  src:url("onclef.eot?#iefix") format("embedded-opentype"),
    url("onclef.woff") format("woff"),
    url("onclef.ttf") format("truetype"),
    url("onclef.svg#onclef") format("svg");
  font-weight: normal;
  font-style: normal;
}

	body, html { width: 100%; height: 100%; margin: 0px; padding: 0px; position: relative; }
	body { text-align: center; }
	#logo { text-align: center; padding-top: 100px; display: block; width: 480px; height: auto;  } 
	h1, h2 { margin: 0px; padding: 0px; color:#fff; display: block; width: 100%; text-align: center; font-family:"Roboto"; font-weight: 300;  }
	h1 {  line-height: 80px;  font-size: 60px;   } 
	h2 { line-height: 50px; font-size: 25px; letter-spacing: 4; font-weight: 300; padding-top: 40px;  }
	#centrador { width: 40%; left: 30%;  top: 5%; display: block; position: absolute;  }
	#alerta { width: 100%; min-height: 200px; background:#000; text-align: center;  }
	#alerta p { color: #fff; text-align: center; font-family: "Roboto"; font-size: 12px; line-height: 40px;  }
	#puntaje { color: #fff; background: #ff0000; text-align: center; font-family: "Roboto"; font-size: 12px; line-height: 40px;
				width: 100px;  position: absolute; top: 10px; left: 10px;   }
#botones a img  { width: 40px; height: 60px; cursor: pointer;}
.locura1 { background: #ff0000 !important;   }
.locura2 { background: #00ff00 !important;  }
.locura3 { background: #0000ff !important;  }
.locura { font-size: 100px !important; line-height: 140px !important;  font-weight: 500 !important; 
	color: #fff !important; width: 100% !important; top: 0px !important; height: 100% !important; left: 0px !important; z-index: 99;  }

  #vidas { color: #fff; text-align: center; font-family: "onclef"; font-size: 12px; line-height: 40px;
          position: absolute; top: 65px; left: 10px; }
  #vidas ul { list-style: none; margin: 0; padding: 0; }
  #vidas ul li { margin: 0; padding: 0 5px; float: left; line-height: 20px; color: #ff0000; font-size: 18px;   }
  .gris { color: #BBB !important;}
</style>
</head>
<?php 
$regalitos = array("1","2","3","4","5","6","7","8","9","10","11","12");
$nombres = array("Candycane","carbon","carro","ipod","libro","muñeca","oso","patines","patineta","pelota","perrito","psp");

	//$regalitos = array("bicicleta","muñeco","patines","420","dolares","mujeres","psp","carbon","perrito","un coño","condones","libros");
	$clave = $regalitos; 
	shuffle($clave); 
?> 


<body> 
 	<div id="centrador">
 		<div id="serie">
 			<p><?php
 			 			echo 'Orden Secreto: ';
 			 			$mysecret=""; 
            $mynames=""; 
             	foreach ($clave as $regalito) {
 							    echo $nombres[$regalito-1].", ";
 								$mysecret=$mysecret.$regalito.",";
 							}
              foreach ($nombres as $nombre) {
                $mynames=$mynames.$nombre.",";
              }
 			 			?>
 			 </p>
 		</div>
 		<div id="alerta">
 			<p class="mensaje">HOLA</p>
      <p class="contador">3</p>
 		</div>
 		<div id="controles">
 			<?php
 			echo '<p>Controles<p>';
 				$cont=0; 
				foreach ($regalitos as $regalito) {
					$cont++;
					$adder=$cont;
					if($adder==10) $adder=" 0"; 
					if($adder==11) $adder=" espacio"; 
					if($adder==12) $adder=" enter"; 
				    echo $nombres[$regalito-1] ." (Tecla: ".$adder.") <br>";
				}
 			?>
      <div id="botones">
       <a data-id="1"><img src="imx/Candycane.png"></a>
        <a data-id="2"><img src="imx/carbon.png"></a>
        <a data-id="3"><img src="imx/carro.png"></a>
        <a data-id="4"><img src="imx/ipod.png"></a>
        <a data-id="5"><img src="imx/libro.png"></a>
        <a data-id="6"><img src="imx/muñeca.png"></a>
        <a data-id="7"><img src="imx/oso.png"></a>
        <a data-id="8"><img src="imx/patines.png"></a>
        <a data-id="9"><img src="imx/patineta.png"></a>
        <a data-id="10"><img src="imx/pelota.png"></a>
        <a data-id="11"><img src="imx/perrito.png"></a>
        <a data-id="12"><img src="imx/psp.png"></a>
 
      </div>
 		</div>



 	</div>

<div id="puntaje">
SCORE: <span id="score">00</span>
</div>
<div id="vidas">
<ul>
<li id="vida1">h</li>
<li id="vida2">h</li>
<li id="vida3">h</li>
<li id="vida4">h</li>
<li id="vida5">h</li>
</ul>
  
 </div>
</body>

<script type='text/javascript'>
<?php
echo "var ordensecreto = '". $mysecret . "';";
echo "var nombres = '". $mynames . "';";

?>

ordensecreto = ordensecreto.split(",");
nombres = nombres.split(",");
</script>
<script type='text/javascript'>
var estamosen=0; //ESTE ES EL ESTADO ACTUAL DEL CICLO QUE SE VA AUMENTANDO SOLO CUANDO STEP LO PERMITE
var vidas=5;
var score=0;
var limitcont=3;
jQuery( document ).ready( function( $ ) { 
 
function cambiatexto(textin) {
$("#alerta p.mensaje" ).fadeTo( 100 , 0, function() { 
	$("#alerta p.mensaje" ).html(textin);
		$("#alerta p.mensaje" ).fadeTo( 100 , 1, function() { 	});
} ); 
}//FIN CAMBIA TEXTO
  
  function cambiacontador(numerin) {
$("#alerta p.contador" ).fadeTo( 100 , 0, function() { 
  $("#alerta p.contador" ).html(numerin);
    $("#alerta p.contador" ).fadeTo( 100 , 1, function() {   });
} ); 
}//FIN CAMBIA CONTADOR

function setIntervalX(callback, delay, repetitions) {
    var x = 0;
    var intervalID = window.setInterval(function () {
       callback();
       if (++x === repetitions) {
           window.clearInterval(intervalID);
       }
    }, delay);
}




function contador(limite){
  var veces = limite;
alert(limite);
setIntervalX(function () {
  veces--;
  cambiacontador(veces);
}, 1000, limite); 

}



cambiatexto("EN ESTA NAVIDAD MI HERMANA ME REGALO");

setTimeout(function () { step(); }, 1000);

  window.addEventListener("keydown", function(e) {  // ESTE ES EL LISTENER PARA DETECTAR CUANDO SE TECLEA
  	var codigo = e.keyCode; 
  	alert(codigo+" "+estamosen+" "+ordensecreto[(estamosen-1)]);
  	/*LOS CODIGOS VIENEN DE ACUERDO A LA TECLA, AHORA VAMOS A ASIGNAR A  CADA TECLA UN CODIGO SECRETO */
  	var secret="";
  	if(codigo==49 || codigo==97) secret="1"; // CADA UNO TIENE DOS CODIGOS PORQUE ES EL TECLADO NUMERICO TAMBIEN
  	if(codigo==50 || codigo==98) secret="2";
  	if(codigo==51 || codigo==99) secret="3";
  	if(codigo==52 || codigo==100) secret="4";
  	if(codigo==53 || codigo==101) secret="5";
  	if(codigo==54 || codigo==102) secret="6"; 
  	if(codigo==55 || codigo==103) secret="7";
  	if(codigo==56 || codigo==104) secret="8";
  	if(codigo==57 || codigo==105) secret="9";
  	if(codigo==48 || codigo==96) secret="10";
  	if(codigo==32) secret="11";
  	if(codigo==13) secret="12";
  	if(secret==ordensecreto[(estamosen-1)] && codigo!=18 && codigo!=17 && codigo!=9) {  scoring(); step(); } //SI LA TECLA ES IGUAL A LA SERIE, PROCEDEMOS 
  	else error(); 
  }); 


function error(){
  if(vidas>0){
    $("#vida"+vidas).addClass("gris");
    vidas--;

  }else{
	$("#puntaje" ).html("ESA NO ERA Y PERDISTE :(");
		var contlocura=1;
	setInterval(function(){  $("#puntaje" ).removeClass(); $("#puntaje" ).addClass("locura locura"+contlocura); contlocura++; if(contlocura==4) contlocura=1;  }, 30);
  $("#vidas").hide();
}
}

function ganador(){
	$("#puntaje" ).html("GANAAA AAA AAA AA AA ADOR");
	var contlocura=1; 
	setInterval(function(){  $("#puntaje" ).removeClass(); $("#puntaje" ).addClass("locura locura"+contlocura); contlocura++; if(contlocura==4) contlocura=1;  }, 100);
}


function scoring(){
	score++;
	$("#score" ).html(score); 
}

function step() {
  contador(3); 
	ciclon(estamosen);
	estamosen++;
}

function ciclon(vary) {
switch(vary) {
    case 0:
        cambiatexto("un "+nombres[(ordensecreto[0]-1)]);
        break;
    case 1:
        cambiatexto("un "+nombres[(ordensecreto[1]-1)]); 
        break;
    case 2:
        cambiatexto("un "+nombres[(ordensecreto[2]-1)]);
        break;
    case 3:
        cambiatexto("un "+nombres[(ordensecreto[3]-1)]); 
        break;
    case 4:
        cambiatexto("un "+nombres[(ordensecreto[4]-1)]);
        break;
    case 5:
        cambiatexto("un "+nombres[(ordensecreto[5]-1)]);
        break;
    case 6:
        cambiatexto("un "+nombres[(ordensecreto[6]-1)]);
        break;
    case 7:
        cambiatexto("un "+nombres[(ordensecreto[7]-1)]); 
        break;
    case 8:
        cambiatexto("un "+nombres[(ordensecreto[8]-1)]);
        break;
    case 9:
        cambiatexto("un "+nombres[(ordensecreto[9]-1)]); 
        break;
    case 10:
        cambiatexto("un "+nombres[(ordensecreto[10]-1)]);
        break;
    case 11:
        cambiatexto("un "+nombres[(ordensecreto[11]-1)]);
                break;
    case 12:
        ganador();
        break;
	}
}


  $( "#botones a" ).click(function() {
  var vary = $(this).attr('data-id'); // BUSCA EL VALOR QUE ALMACENA EL LINK BAJO EL ATRIBUTO DATA-ID
    if(vary==ordensecreto[(estamosen-1)]) { scoring(); step();  } //SI LA TECLA ES IGUAL A LA SERIE, PROCEDEMOS 
    else error(); 
  });


});
</script>
</html> 