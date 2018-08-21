;
//Asignar un nombre y version al cache
const CACHE_NAME = 'v1_cache_drinks2u',
urlsToCache = [
	'./',
	'views/js/plugins/bootstrap.min.js',
	'views/js/plugins/flowplayer.hlsjs.light.min.js',
	'views/js/plugins/flowplayer.min.js',
	'views/js/plugins/flowplayer.speed-menu.min.js',
	'views/js/plugins/jquery.easing.js',
	'views/js/plugins/jquery.flexslider.js',
	'views/js/plugins/jquery.min.js',
	'views/js/plugins/jquery.scrollUp.js',
	'views/js/plugins/knob.jquery.js',
	'views/js/plugins/playa.json',
	'views/js/plugins/sweetalert.min.js',
	'views/css/cabezote.css',
	'views/css/carrito-de-compras.css',
	'views/css/footer.css',
	'views/css/infoproducto.css',
	'views/css/perfil.css',
	'views/css/plantilla.css',
	'views/css/productos.css',
	'views/css/slide.css',
	'views/css/fonts/fontawesome-webfont.eot',
	'views/css/fonts/fontawesome-webfont.svg',
	'views/css/fonts/fontawesome-webfont.ttf',
	'views/css/fonts/fontawesome-webfont.woff',
	'views/css/fonts/fontawesome-webfont.woff2',
	'views/css/fonts/FontAwesome.otf',
	'views/css/fonts/glyphicons-halflings-regular.eot',
	'views/css/fonts/glyphicons-halflings-regular.svg',
	'views/css/fonts/glyphicons-halflings-regular.ttf',
	'views/css/fonts/glyphicons-halflings-regular.woff',
	'views/css/fonts/glyphicons-halflings-regular.woff2',
	'views/css/plugins/bootstrap.min.css',
	'views/css/plugins/breakpoint.css',
	'views/css/plugins/flexslider.css',
	'views/css/plugins/font-awesome.min.css',
	'views/css/plugins/skin.css',
	'views/css/plugins/sweetalert.css',
	'views/css/plugins/fonts/flexslider-icon.eot',
	'views/css/plugins/fonts/flexslider-icon.svg',
	'views/css/plugins/fonts/flexslider-icon.ttf',
	'views/css/plugins/fonts/flexslider-icon.woff',
	'views/css/plugins/icons/flowplayer.eot',
	'views/css/plugins/icons/flowplayer.woff',
	'views/css/plugins/icons/flowplayer.woff2',
	'views/img/plantilla/efectivo.jpg',
	'views/img/plantilla/flecha.png',
	'views/img/plantilla/icon-email.png',
	'views/img/plantilla/icon-pass.png',
	'views/img/plantilla/paypal.png',
	'views/img/plantilla/logonav2.png',
	'views/img/plantilla/logonav3.png',
	'views/img/plantilla/logonav4.png',
	'views/img/plantilla/logonav5.png',
	'views/img/plantilla/logonav6.png',
	'views/img/plantilla/logonav7.png',
	'views/img/plantilla/logonav8.png',
	'views/img/plantilla/logonav9.png',
	'views/img/plantilla/logonav10.png',
	'views/img/plantilla/logonav11.png',
	'../backend/views/img/banner/banner.png',
	'../backend/views/img/banner/banner2.jpg',
	'../backend/views/img/banner/botanasyextras.jpg',
	'../backend/views/img/banner/cerveza.jpg',
	'../backend/views/img/banner/paquetes.jpg',
	'../backend/views/img/banner/tequila.jpg',
	'../backend/views/img/banner/vinos.jpg',
	'../backend/views/img/banner/vodka.jpg',
	'../backend/views/img/usuarios/default/anonimo.jpg',
	'../backend/views/img/slide/default/back_default.jpg',
	'../backend/views/img/plantilla/logonav2.png',
	'../backend/views/img/plantilla/logotipografia.png',
]

//Durante la fase de instalación, generalmente se almacena caché los archivos estáticos
self.addEventListener('install', e => {

	e.waitUntil(
		caches.open(CACHE_NAME)
		.then(cache=>{
			return cache.addAll(urlsToCache)
			.then(()=>self.skipWaiting())
		})
		.catch(err=>console.log('Falló registro de cache', err))
	)

})

//Una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
self.addEventListener('activate', e=>{

	const cacheWhitelist = [CACHE_NAME]

	e.waitUntil(
		caches.keys()
		.then(cachesNames=>{
			cacheNames.map(cacheName=>{
				//Elimina lo que ya no se necesita en el caché
				if(cacheWhitelist.indexOf(cacheName)===-1){
					return caches.delete(cacheName)
				}
			})
		})
		//Le indica al SW activar el cache actual
		.then(()=>self.clients.claim())

	)


})

//Cuando el navegador recupera una URL
self.addEventListener('fetch', e=>{

	//Responder ya sea con el objeto en caché o continuar y buscar la url real
	e.respondWith(
		caches.match(e.request)
			.then(res=>{
				if(res){
					//Recuperando del caché
					return res
				}
				//Recuperar de la petición a la URL
				return fetch(e.request)
			})
	)


})