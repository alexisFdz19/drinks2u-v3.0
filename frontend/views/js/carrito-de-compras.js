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

	$(".cuerpoCarrito").html('<div class="well" style="margin-bottom: 290px;">Aún no tienes productos en tu carrito de compras</div>');
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

		$(".cuerpoCarrito").html('<div class="well" style="margin-bottom: 290px;">Aún no tienes productos en tu carrito de compras</div>');
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
var test;
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

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
Pasarela de pago
=============================================*/

$("#btnCheckout").click(function(){

	$(".listaProductos table.tablaProductos tbody").html("");

	var idUsuario = $(this).attr("idUsuario");
	var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
	var cantidad = $(".cuerpoCarrito .cantidadItem");
	var subtotal = $(".cuerpoCarrito .subtotales span");

	/*=============================================
	Mostrar el subtotal en la pasarela de pago
	=============================================*/

	var sumaSubTotal = $(".sumaSubTotal span");

	$(".valorSubtotal").html($(sumaSubTotal).html());
	$(".valorSubtotal").attr("valor",$(sumaSubTotal).html());


	/*=============================================
	Variables array
	=============================================*/

	for(var i = 0; i < titulo.length; i++){

		var tituloArray = $(titulo[i]).html();
		var cantidadArray = $(cantidad[i]).val();		
		var subtotalArray = $(subtotal[i]).html();

		/*=============================================
		Mostrar los productos a comprar en la pasarela
		=============================================*/

		$(".listaProductos table.tablaProductos tbody").append('<tr>'+
															   '<td class="valorTitulo">'+tituloArray+'</td>'+
															   '<td class="valorCantidad">'+cantidadArray+'</td>'+
															   '<td>$<span class="valorItem" valor="'+subtotalArray+'">'+subtotalArray+'</span></td>'+
															   '<tr>');

		/*=============================================
		Capturar datos del JSON y mostrar la Seleccion de la ubicacion
		=============================================*/

		$.ajax({
				url:rutaOculta+"views/js/plugins/playa.json",
				type: "GET",
				cache: false,
				contentType: false,
				processData:false,
				dataType:"json",
				success: function(respuesta){

					respuesta.forEach(seleccionarEntrega);

					function seleccionarEntrega(item, index){

						var ubicacion = item.name;
						var codPostal = item.code;
						var precioEntrega = item.price;

						$("#seleccionarEntrega").append('<option value="'+precioEntrega+'">'+ubicacion+'</option>');

					}

				}

		})

		/*=============================================
		Mostrar el precio de la ubicacion seleccionada
		=============================================*/

		$("#seleccionarEntrega").change(function(){

			$(".alert").remove();

			var precioUbicacionSeleccionada = $(this).val();

			$(".precioEntrega").html('<span class="precioEntregaNumero" valor="'+precioUbicacionSeleccionada+'">'+precioUbicacionSeleccionada+'</span>');

				/*if ($("#seleccionarEntrega").val() != ""){

					$("#direccionEntrega").show();

				}else{

					$("#direccionEntrega").hide();

				}*/

				/*=============================================
				Retornar la divisa a MXN al cambiar ubicacion de nuevo
				=============================================*/

				$("#cambiarDivisa").val("MXN");

				$(".cambioDivisa").html("MXN");

				$(".valorSubtotal").html((1 * Number($(".valorSubtotal").attr("valor"))).toFixed(2))
				$(".precioEntregaNumero").html((1 * Number($(".precioEntregaNumero").attr("valor"))).toFixed(2))
				$(".valorTotalCompra").html((1 * Number($(".valorTotalCompra").attr("valor"))).toFixed(2))

				var valorItem = $(".valorItem");

				for(var i = 0; i < valorItem.length; i++){

					$(valorItem[i]).html((1 * Number($(valorItem[i]).attr("valor"))).toFixed(2))

				}

				/*=============================================
							Fin
				=============================================*/	

			sumaTotalCompra(); // Ejecucion de la suma

		})

	}

})

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
Suma total de la compra
=============================================*/

function sumaTotalCompra(){

	
	var sumaTotalTasas = Number($(".valorSubtotal").html())+
	                     Number($(".precioEntregaNumero").html());



	//var chichi = parseInt(sumaTotalTasas);
	//console.log(parseInt(sumaTotalTasas)+ "  2222")
	$(".valorTotalCompra").html(sumaTotalTasas.toFixed(2));
	$(".valorTotalCompra").attr("valor",sumaTotalTasas.toFixed(2));

}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
MÉTODO DE PAGO PARA CAMBIO DE DIVISA
=============================================*/

var metodoPago = "paypal";
divisas(metodoPago);

$("input[name='pago']").change(function(){

	var metodoPago = $(this).val();

	divisas(metodoPago);


})

/*=============================================
/*=============================================
/*=============================================
/*=============================================
FUNCIÓN PARA EL CAMBIO DE DIVISA
=============================================*/

function divisas(metodoPago){

	$("#cambiarDivisa").html("");

	if(metodoPago == "paypal"){

		$("#cambiarDivisa").append('<option value="MXN">MXN</option>'+
			                       '<option value="USD">USD</option>'+
			                       '<option value="EUR">EUR</option>')

	}else{

		$("#cambiarDivisa").append('<option value="MXN">MXN</option>'+
			                       '<option value="USD">USD</option>')

	}

}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
CAMBIO DE DIVISA
=============================================*/

var divisaBase = "MXN";

$("#cambiarDivisa").change(function(){

	$(".alert").remove();

	if ($("#seleccionarEntrega").val() == ""){

		$("#cambiarDivisa").after('<div class="alert alert-warning">Debes seleccionar tu ubicacion de entrega</div>')

		return;

	}
	
	var divisa = $(this).val();

	$.ajax({

		url: "http://free.currencyconverterapi.com/api/v3/convert?q="+divisaBase+"_"+divisa+"&compact=y", // URL de la API del conversor de divisas
		type:"GET",
		cache: false,
	    contentType: false,
	    processData: false,
	    dataType:"jsonp", // jsonp porque es una app de otro servidor para hacer cruce de origen y traer la información
	    success:function(respuesta){
   	
	    	var divisaString = JSON.stringify(respuesta); //Se convierte la respuesta en string
	    	var conversion = divisaString.substr(18,4); //Quitamos 18 caracteres a la izquierda tomamos solo el valor y lo dejamos en 4 digitos
	    	//console.log("conversion", conversion);

	    	if(divisa == "MXN"){

	    		conversion = 1;
	    	}

	    	$(".cambioDivisa").html(divisa);

	    	$(".valorSubtotal").html((Number(conversion) * Number($(".valorSubtotal").attr("valor"))).toFixed(2))
	    	$(".precioEntregaNumero").html((Number(conversion) * Number($(".precioEntregaNumero").attr("valor"))).toFixed(2))
	    	$(".valorTotalCompra").html((Number(conversion) * Number($(".valorTotalCompra").attr("valor"))).toFixed(2))

	    	var valorItem = $(".valorItem");

	    	for(var i = 0; i < valorItem.length; i++){

	    		$(valorItem[i]).html((Number(conversion) * Number($(valorItem[i]).attr("valor"))).toFixed(2))

	    	}

	    }

	})	

})

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
Botón pagar
=============================================*/

$(".btnPagar").click(function(){

	if ($("#seleccionarEntrega").val() != 0) /*&& $("#direccionEntregaInput").val().length*/{

		//var ubicacion = $("#seleccionarEntrega option:selected").text();
		//var direccion = $("#direccionEntregaInput").val();
		var divisa = $("#cambiarDivisa").val();
		var total = $(".valorTotalCompra").html();
		var envio = $(".precioEntregaNumero").html();
		var subtotal = $(".valorSubtotal").html();
		var titulo = $(".valorTitulo");
		var cantidad = $(".valorCantidad");
		var valorItem = $(".valorItem");
		var idProducto = $('.cuerpoCarrito button');

		var tituloArray = [];
		var cantidadArray = [];
		var valorItemArray = [];
		var idProductoArray = [];

		for(var i = 0; i < titulo.length; i++){

			tituloArray[i] = $(titulo[i]).html();
			cantidadArray[i] = $(cantidad[i]).html();
			valorItemArray[i] = $(valorItem[i]).html();
			idProductoArray[i] = $(idProducto[i]).attr("idProducto");

		}

		var datos = new FormData();

		datos.append("divisa", divisa);
		datos.append("total", total);
		datos.append("envio", envio);
		datos.append("subtotal", subtotal);
		datos.append("tituloArray", tituloArray);
		datos.append("cantidadArray", cantidadArray);
		datos.append("valorItemArray", valorItemArray);
		datos.append("idProductoArray", idProductoArray);

		$.ajax({

			url:rutaOculta+"ajax/carrito.ajax.php",
			method:"POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){

				window.location = respuesta;

			}

		})


	}else{

		$(".btnPagar").after('<div class="alert alert-warning">Debes seleccionar tu ubicacion de entrega</div>');

		return;

	}

})