/**
 * Script de inicialización de modales para HTMX
 * Este archivo debe cargarse después de todos los archivos .definition.js
 */

// Configuración global de modales
window.ModalsManager = {
    definitions: {},

    // Registrar una definición de modal
    register: function(name, definition) {
        this.definitions[name] = definition;
        console.log(`Modal registrado: ${name}`);
    },

    // Obtener definición de modal
    get: function(name) {
        return this.definitions[name];
    },

    // Inicializar un modal específico
    init: function(modalName, containerId) {
        const definition = this.get(modalName);
        if (!definition) {
            console.error(`Modal no encontrado: ${modalName}`);
            return;
        }

        const container = document.getElementById(containerId);
        if (!container) {
            console.error(`Contenedor no encontrado: ${containerId}`);
            return;
        }

        // Aplicar handlers si existen
        if (definition.handlers) {
            this.applyHandlers(definition.handlers, container);
        }

        // Ejecutar lifecycle connected si existe
        if (definition.lifecycle && definition.lifecycle.connected) {
            definition.lifecycle.connected.call(container);
        }

        return container;
    },

    // Aplicar event handlers a un contenedor
    applyHandlers: function(handlers, container) {
        Object.keys(handlers).forEach(selector => {
            const handler = handlers[selector];
            const element = container.querySelector(selector);

            if (element && handler.event && handler.callback) {
                element.addEventListener(handler.event, handler.callback.bind(container));
            }
        });
    },

    // Validar campo usando las reglas de validación
    validateField: function(fieldId, validations, container) {
        const input = container.querySelector(`#${fieldId}`);
        if (!input) return false;

        const validation = validations[fieldId];
        if (!validation) return true;

        const value = input.value.trim();

        // Validación requerida
        if (validation.required && !value) {
            this.showError(fieldId, 'Este campo es requerido', container);
            return false;
        }

        // Validación numérica
        if (validation.numeric && !/^\d+$/.test(value)) {
            this.showError(fieldId, validation.messages?.numeric || 'Solo se permiten números', container);
            return false;
        }

        // Validación alfabética
        if (validation.alpha && !/^[a-záéíóúñ\s]+$/i.test(value)) {
            this.showError(fieldId, validation.messages?.alpha || 'Solo se permiten letras', container);
            return false;
        }

        // Validación de email
        if (validation.email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
            this.showError(fieldId, validation.message || 'Email inválido', container);
            return false;
        }

        // Validación de longitud mínima
        if (validation.minLength && value.length < validation.minLength) {
            this.showError(fieldId, validation.messages?.minLength || `Mínimo ${validation.minLength} caracteres`, container);
            return false;
        }

        // Validación de longitud máxima
        if (validation.maxLength && value.length > validation.maxLength) {
            this.showError(fieldId, validation.messages?.maxLength || `Máximo ${validation.maxLength} caracteres`, container);
            return false;
        }

        // Validación personalizada
        if (validation.custom) {
            const result = validation.custom.call(container, value);
            if (result !== true) {
                this.showError(fieldId, result, container);
                return false;
            }
        }

        // Limpiar errores si todo está bien
        this.clearError(fieldId, container);
        return true;
    },

    // Mostrar error en un campo
    showError: function(fieldId, message, container) {
        const input = container.querySelector(`#${fieldId}`);
        const errorElement = container.querySelector(`#error-${fieldId}`);

        if (input) {
            input.classList.add('invalid');
            input.classList.remove('valid');
        }

        if (errorElement) {
            errorElement.textContent = message;
            errorElement.classList.add('visible');
        }
    },

    // Limpiar error de un campo
    clearError: function(fieldId, container) {
        const input = container.querySelector(`#${fieldId}`);
        const errorElement = container.querySelector(`#error-${fieldId}`);

        if (input) {
            input.classList.remove('invalid');
            input.classList.add('valid');
        }

        if (errorElement) {
            errorElement.textContent = '';
            errorElement.classList.remove('visible');
        }
    },

    // Obtener datos del formulario
    getFormData: function(container, fieldNames) {
        const data = {};
        fieldNames.forEach(fieldName => {
            const input = container.querySelector(`#${fieldName}`);
            if (input) {
                data[fieldName] = input.value.trim();
            }
        });
        return data;
    }
};

// Registrar todas las definiciones cuando estén disponibles
document.addEventListener('DOMContentLoaded', function() {
    // Registrar modal participar
    if (window.modalParticiparDefinition) {
        ModalsManager.register('participar', window.modalParticiparDefinition);
    }

    // Registrar modal condiciones
    if (window.modalCondicionesDefinition) {
        ModalsManager.register('condiciones', window.modalCondicionesDefinition);
    }

    // Registrar modal datos registro
    if (window.modalDatosRegistroDefinition) {
        ModalsManager.register('datos-registro', window.modalDatosRegistroDefinition);
    }

    // Registrar modal verificación
    if (window.modalVerificacionDefinition) {
        ModalsManager.register('verificacion', window.modalVerificacionDefinition);
    }

    // Registrar modal número O
    if (window.modalNumeroODefinition) {
        ModalsManager.register('numero-o', window.modalNumeroODefinition);
    }

    // Registrar modal número T
    if (window.modalNumeroTDefinition) {
        ModalsManager.register('numero-t', window.modalNumeroTDefinition);
    }

    // Registrar modal juego
    if (window.modalJuegoDefinition) {
        ModalsManager.register('juego', window.modalJuegoDefinition);
    }

    // Registrar modal no cumple
    if (window.modalNoCumpleDefinition) {
        ModalsManager.register('nocumple', window.modalNoCumpleDefinition);
    }

    console.log('Modales registrados:', Object.keys(ModalsManager.definitions));
});

// Hook para HTMX: inicializar modales después de que HTMX cargue contenido
if (typeof htmx !== 'undefined') {
    document.body.addEventListener('htmx:afterSwap', function(event) {
        // Detectar qué modal se cargó y inicializarlo
        const target = event.detail.target;

        // Intentar detectar el tipo de modal por ID o clase
        const modalId = target.id;
        if (modalId) {
            const modalName = modalId.replace('modal-', '');
            ModalsManager.init(modalName, modalId);
        }
    });
}
