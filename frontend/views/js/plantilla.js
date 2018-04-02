/*==============================================
= Tooltip  =
==============================================*/

$('[data-toggle="tooltip"]').tooltip();


/*==============================================
= Cuadricula o lista  =
==============================================*/

var btnList = $(".btnList");

for(var i = 0; i < btnList.length; i++){


	$("#btnGrid"+i).click(function(){

		var numero = $(this).attr("id").substr(-1);

		$(".list"+numero).hide();
		$(".grid"+numero).show();

		// estilo al mostrar en pantalla en el boton de lista o grid

		/*$("#btnGrid"+numero).addClass("backColor");
		$("#btnList"+numero).removeClass("backColor");*/

	})

	$("#btnList"+i).click(function(){

		var numero = $(this).attr("id").substr(-1);

		$(".list"+numero).show();
		$(".grid"+numero).hide();

		// estilo al mostrar en pantalla en el boton de lista o grid

		/*$("#btnGrid"+numero).removeClass("backColor");
		$("#btnList"+numero).addClass("backColor");*/

	})

}

/*==============================================
= efecto parallax  =
==============================================*/

$(window).scroll(function(){


	var scrollY = window.pageYOffset;

	// con este primer if hacemos que el efecto parallax se ejecute de 768px para arriba solamente

	if(window.matchMedia("(min-width:768px)").matches){

		if(scrollY < ($(".banner").offset().top)-100){

			$(".banner img").css({"margin-top":-scrollY/2+"px"})

		}else{

			scrollY = 0;
		}

	}
	
	

})

$.scrollUp({

	scrollText:"",
	scrollSpeed: 1000,
	easingType: "easeOutQuint"


});

/*==============================================
= Migas de pan  =
==============================================*/

var pagActiva = $(".pagActiva").html();

if (pagActiva != null) {

	var regPagActiva = pagActiva.replace(/-/g, " ");

	$(".pagActiva").html(regPagActiva);

}

