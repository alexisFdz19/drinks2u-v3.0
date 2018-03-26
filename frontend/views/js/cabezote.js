/*==============================================
        = Cabezote =
==============================================*/

 /* boton para realizar funcion / orden de que hará una funcion */
$("#btnCategorias").click(function(){

	/* condición para que aparezca debajo del boton de categorias las categorias en dispositivos mayores a 767px*/
	if(window.matchMedia("(max-width:767px)").matches){

		 /* sección debajo de la que aparecerá / sección que se desplegará */
		$("#btnCategorias").after($("#categorias").slideToggle("fast"))

	}else{

		$("#cabezote").after($("#categorias").slideToggle("fast"))
	}

})