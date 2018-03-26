/*==============================================
= Variables   =
==============================================*/

var item = 0;
var itemPaginacion = $("#paginacion li");
var interuumpirCiclo = false;
var imgProducto = $(".imgProducto");
var titulos1 = $("#slide h1");
var titulos2 = $("#slide h2");
var titulos3 = $("#slide h3");
var btnVerProducto = $("#slide button");
var detenerIntervalo = false;
var toogle = false;

$("#slide ul li").css({"width":100/$("#slide ul li").length + "%"});
$("#slide ul").css({"width":$("#slide ul li").length*100 + "%"});

/*==============================================
= paginacion   =
==============================================*/

$("#paginacion li").click(function(){


	item = $(this).attr("item")-1;

	movimientoSlide(item);

})

/*==============================================
= avanzar   =
==============================================*/


function avanzar(){


	if (item == $("#slide ul li").length -1){

		item = 0;

	}else{


		item++;
	}

	movimientoSlide(item);

}

$("#slide #avanzar").click(function(){

	avanzar();

})



/*==============================================
= retroceder   =
==============================================*/

$("#slide #retroceder").click(function(){

	if (item == 0){

		item = $("#slide ul li").length -1;

	}else{


		item--;
	}

	movimientoSlide(item);

})


/*==============================================
= movimiento slide   =
==============================================*/

function movimientoSlide(item){



	$("#slide ul").animate({"left": item * -100 + "%"}, 500, "easeOutQuart");

	$("#paginacion li").css({"opacity":.3})

	$(itemPaginacion[item]).css({"opacity":1});

	interuumpirCiclo = true;

}

/*==============================================
= intervalo cambio de pagina slide  =
==============================================*/

setInterval(function(){

	avanzar();


},4000)