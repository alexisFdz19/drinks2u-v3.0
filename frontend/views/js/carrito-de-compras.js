/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
Visualizar la cesta del carrito
=============================================*/

if(localStorage.getItem("cantidadCesta") != null){

	$(".cantidadCesta").html(localStorage.getItem("cantidadCesta"));
	$(".sumaCesta").html(localStorage.getItem("sumaCesta"));

}else{

	$(".cantidadCesta").html("0");
	$(".sumaCesta").html("0");

}


/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
Visualizar productos en la pagina
=============================================*/

if(localStorage.getItem("listaProductos") != null){

	var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));

	listaCarrito.forEach(funcionForEach);

	function funcionForEach(item, index){

		$(".cuerpoCarrito").append(

			'<div clas="row itemCarrito">'+
				
				'<div class="col-sm-1 col-xs-12">'+
					
					'<br>'+

					'<center>'+
						
						'<button class="btn btn-default backColorN quitarItemCarrito" idProducto="'+item.idProducto+'">'+
							
							'<i class="fa fa-times"></i>'+

						'</button>'+

					'</center>'+

					'<br>'+	

				'</div>'+

				'<div class="col-sm-1 col-xs-12">'+
					
					'<figure>'+
						
						'<img src="'+item.imagen+'" class="img-thumbnail">'+

					'</figure>'+

				'</div>'+

				'<div class="col-sm-4 col-xs-12">'+

					'<br>'+

					'<p class="tituloCarritoCompra text-left">'+item.titulo+'</p>'+

				'</div>'+

				'<div class="col-md-2 col-sm-1 col-xs-12">'+

					'<br>'+

					'<p class="precioCarritoCompra text-center">MXN $<span>'+item.precio+'</span></p>'+

				'</div>'+

				'<div class="col-md-2 col-sm-3 col-xs-8">'+

					'<br>'+	

					'<div class="col-xs-8">'+

						'<center>'+
						
							'<input type="number" class="form-control cantidadItem" min="1" max="5" value="'+item.cantidad+'" precio="'+item.precio+'" idProducto="'+item.idProducto+'">'+	

						'</center>'+

					'</div>'+

				'</div>'+

				'<div class="col-md-2 col-sm-1 col-xs-4 text-center">'+
					
					'<br>'+

					'<p class="subTotal'+item.idProducto+' subtotales">'+
						
						'<strong>MXN $<span>'+item.precio+'</span></strong>'+

					'</p>'+

				'</div>'+
				
			'</div>'+

			'<div class="clearfix"></div>'+

			'<hr>');


	}

}else{

	$(".cuerpoCarrito").html('<div class="well">Aún no tienes productos en tu carrito de compras</div>');
	$(".sumaCarrito").hide();
	$(".cabeceraCheckout").hide();
}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
Visualizar productos en el carrito
=============================================*/

$(".agregarCarrito").click(function(){

	var idProducto = $(this).attr("idProducto");
	var imagen = $(this).attr("imagen");
	var titulo = $(this).attr("titulo");
	var precio = $(this).attr("precio");

	/*=============================================
	Almacenar en localstorage los productos agregados
	=============================================*/

		/*=============================================
		Recuperar almacenamiento de localstorage
		=============================================*/

		if(localStorage.getItem("listaProductos") == null){

			listaCarrito = [];

		}else{

			listaCarrito.concat(localStorage.getItem("listaProductos"));

		}

		listaCarrito.push({"idProducto":idProducto,
						   "imagen":imagen,
						   "titulo":titulo,
						   "precio":precio,
				           "cantidad":"1"});

		localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));

		/*=============================================
		Actualizar cesta
		=============================================*/

		var cantidadCesta = Number($(".cantidadCesta").html()) + 1;
		var sumaCesta = Number($(".sumaCesta").html()) + Number(precio);

		$(".cantidadCesta").html(cantidadCesta);
		$(".sumaCesta").html(sumaCesta);

		localStorage.setItem("cantidadCesta", cantidadCesta);
		localStorage.setItem("sumaCesta", sumaCesta);

		/*=============================================
		Alerta al agregar producto
		=============================================*/

		swal({
			  title: "",
			  text: "Agregado a tu carrito de compras",
			  type: "success",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  cancelButtonText: "Continuar comprando",
			  confirmButtonText: "Ir a mi carrito",
			  closeOnConfirm: false
			},
			function(isConfirm){
				if (isConfirm) {	   
					 window.location = rutaOculta+"carrito-de-compras";
				} 
		});

})

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
Quitar productos del carrito
=============================================*/

$(".quitarItemCarrito").click(function(){

	$(this).parent().parent().parent().remove();

	var idProducto = $(".cuerpoCarrito button");
	var imagen = $(".cuerpoCarrito img");
	var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
	var precio = $(".cuerpoCarrito .precioCarritoCompra span");
	var cantidad = $(".cuerpoCarrito .cantidadItem");

	/*=============================================
	Si aun quedan productos volverlos agregar al localstorage
	=============================================*/

	listaCarrito = [];

	if(idProducto.length != 0){

		for(var i = 0; i < idProducto.length; i++){

			var idProductoArray = $(idProducto[i]).attr("idProducto");
			var imagenArray = $(imagen[i]).attr("src");
			var tituloArray = $(titulo[i]).html();
			var precioArray = $(precio[i]).html();
			var cantidadArray = $(cantidad[i]).val();

			listaCarrito.push({"idProducto":idProductoArray,
						   "imagen":imagenArray,
						   "titulo":tituloArray,
						   "precio":precioArray,
				           "cantidad":cantidadArray});

		}

		localStorage.setItem("listaProductos",JSON.stringify(listaCarrito));

		sumaSubtotales();
		cestaCarrito(listaCarrito.length);

	}else{

		/*=============================================
		Si no hay productos en el carrito
		=============================================*/	

		localStorage.removeItem("listaProductos");

		localStorage.setItem("cantidadCesta","0");
		
		localStorage.setItem("sumaCesta","0");

		$(".cantidadCesta").html("0");
		$(".sumaCesta").html("0");

		$(".cuerpoCarrito").html('<div class="well">Aún no tienes productos en tu carrito de compras</div>');
		$(".sumaCarrito").hide();
		$(".cabeceraCheckout").hide();

	}

})

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
Generar subtotal al cambiar cantidad
=============================================*/
$(".cantidadItem").change(function(){

	var cantidad = $(this).val();
	var precio = $(this).attr("precio");
	var idProducto = $(this).attr("idProducto");

	$(".subTotal"+idProducto).html('<strong>MXN $<span>'+(cantidad*precio)+'</span></strong>');

	/*=============================================
	Actualizar cantidad en localstorage
	=============================================*/

	var idProducto = $(".cuerpoCarrito button");
	var imagen = $(".cuerpoCarrito img");
	var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
	var precio = $(".cuerpoCarrito .precioCarritoCompra span");
	var cantidad = $(".cuerpoCarrito .cantidadItem");

	listaCarrito = [];

	for(var i = 0; i < idProducto.length; i++){

			var idProductoArray = $(idProducto[i]).attr("idProducto");
			var imagenArray = $(imagen[i]).attr("src");
			var tituloArray = $(titulo[i]).html();
			var precioArray = $(precio[i]).html();
			var cantidadArray = $(cantidad[i]).val();

			listaCarrito.push({"idProducto":idProductoArray,
						   "imagen":imagenArray,
						   "titulo":tituloArray,
						   "precio":precioArray,
				           "cantidad":cantidadArray});

		}

		localStorage.setItem("listaProductos",JSON.stringify(listaCarrito));

		sumaSubtotales();
		cestaCarrito(listaCarrito.length);
		
})

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
Se actualiza subtotal
=============================================*/
var precioCarritoCompra = $(".cuerpoCarrito .precioCarritoCompra span");
var cantidadItem = $(".cuerpoCarrito .cantidadItem");

for(var i = 0; i < precioCarritoCompra.length; i++){

	var precioCarritoCompraArray = $(precioCarritoCompra[i]).html();
	var cantidadItemArray = $(cantidadItem[i]).val();
	var idProductoArray = $(cantidadItem[i]).attr("idProducto");

	$(".subTotal"+idProductoArray).html('<strong>MXN $<span>'+(precioCarritoCompraArray*cantidadItemArray)+'</span></strong>')

	sumaSubtotales();
	cestaCarrito(precioCarritoCompra.length);

}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
Suma de los subtotales
=============================================*/
function sumaSubtotales(){

	var subtotales = $(".subtotales span");
	var arraySumaSubtotales = [];
	
	for(var i = 0; i < subtotales.length; i++){

		var subtotalesArray = $(subtotales[i]).html();
		arraySumaSubtotales.push(Number(subtotalesArray));
		
	}

	
	function sumaArraySubtotales(total, numero){

		return total + numero;

	}

	var sumaTotal = arraySumaSubtotales.reduce(sumaArraySubtotales);
	
	$(".sumaSubTotal").html('<strong>MXN $<span>'+sumaTotal+'</span></strong>');

	$(".sumaCesta").html(sumaTotal);

	localStorage.setItem("sumaCesta", sumaTotal);


}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
Actualizar cesta al cabiar cantidad
=============================================*/
function cestaCarrito(cantidadProductos){

	/*=============================================
	Si hay productos en el carrito
	=============================================*/

	if(cantidadProductos != 0){
		
		var cantidadItem = $(".cuerpoCarrito .cantidadItem");

		var arraySumaCantidades = [];
	
		for(var i = 0; i < cantidadItem .length; i++){

			var cantidadItemArray = $(cantidadItem[i]).val();
			arraySumaCantidades.push(Number(cantidadItemArray));
			
		}
	
		function sumaArrayCantidades(total, numero){

			return total + numero;

		}

		var sumaTotalCantidades = arraySumaCantidades.reduce(sumaArrayCantidades);
		
		$(".cantidadCesta").html(sumaTotalCantidades);
		localStorage.setItem("cantidadCesta", sumaTotalCantidades);

	}

}