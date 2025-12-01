/**
 * Definición declarativa del Modal Participar
 * Solo contiene: HTML, CSS, validaciones y handlers
 */

const modalParticiparDefinition = {
  // ==================== TEMPLATE ====================
  template: function({ buttonText, showProgress, flowConfig }) {
    return `
      <div class="modal-overlay">
        <div class="modal-content">
          ${showProgress ? `
            <div class="flow-progress">
              <span>Paso ${flowConfig.stepIndex + 1} de ${flowConfig.totalSteps}</span>
              <div class="progress-track">
                <div class="progress-fill" style="width: ${((flowConfig.stepIndex + 1) / flowConfig.totalSteps) * 100}%"></div>
              </div>
            </div>
          ` : ''}

          <div style="padding: ${showProgress ? '0' : '0'};">
            <div class="logo-container">
              <img src="/images/logo-ava.png" alt="Grupo AVAL" class="logo" />
            </div>

            <h2 class="title">¡Nos vamos de concierto!</h2>

            <p class="description">
              Por ser nuestro cliente, participa y gana dos entradas a <strong>PALCO VIP</strong> para disfrutar del gran concierto de <strong>Rayan Castro</strong>.
            </p>

            <p class="small-text">Son 100 entradas dobles las que sortearemos.</p>

            <button id="btn-participar" class="btn-primary" data-submit-button>
              ${buttonText}
            </button>
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
      transform: scale(1);
      transition: all 0.3s ease-out;
      animation: fadeIn 0.3s ease-out;
      box-sizing: border-box;
      overflow: hidden;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: scale(0.95);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    .logo-container {
      display: flex;
      justify-content: center;
      margin-bottom: 1rem;
    }

    .logo {
      height: 3.5rem;
      max-width: 100%;
      width: auto;
      object-fit: contain;
    }

    .title {
      font-size: 1.875rem;
      font-weight: 700;
      text-align: center;
      color: #1e40af;
      margin-bottom: 1.5rem;
    }

    .description {
      color: #374151;
      text-align: center;
      margin-bottom: 2rem;
      font-size: 1.125rem;
    }

    .small-text {
      color: #374151;
      text-align: center;
      margin-bottom: 0.5rem;
      font-size: 0.5rem;
    }

    .btn-primary {
      width: 100%;
      background-color: #1d4ed8;
      color: white;
      font-weight: 700;
      padding: 1rem 1.5rem;
      border-radius: 0.75rem;
      border: none;
      cursor: pointer;
      transition: all 0.2s;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .btn-primary:hover {
      background-color: #1e40af;
      transform: scale(1.05);
    }

    strong {
      font-weight: 700;
    }

    /* Notificación de retorno */
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

    /* Barra de progreso del flujo */
    .flow-progress {
      background: #f3f4f6;
      border-bottom: 1px solid #e5e7eb;
      padding: 0.75rem 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 0.875rem;
      color: #6b7280;
    }

    .progress-track {
      flex: 1;
      height: 4px;
      background: #e5e7eb;
      border-radius: 2px;
      margin: 0 1rem;
      overflow: hidden;
    }

    .progress-fill {
      height: 100%;
      background: #1d4ed8;
      transition: width 0.3s ease;
    }
  `,

  // ==================== VALIDACIONES ====================
  validations: {
    // Este modal no tiene campos de formulario
  },

  // ==================== HANDLERS ====================
  handlers: {
    '#btn-participar': {
      event: 'click',
      callback: function(e) {
        // Verificar si es parte de un flujo
        if (this.getAttribute('data-flow-managed') === 'true') {
          // MODO FLUJO: Completar paso
          this.completeStep({
            accepted: true,
            timestamp: Date.now()
          });
        } else {
          // MODO MANUAL: Emitir evento next-modal
          this.dispatchEvent(new CustomEvent('next-modal', {
            detail: { nextModal: 'modal-condiciones' },
            bubbles: true,
            composed: true
          }));
        }

        this.closeModal();
      }
    }
  },

  // ==================== CONFIGURACIÓN ====================
  config: {
    defaultButtonText: 'Quiero Participar',
    showReturnNotification: true,
    returnMessage: '¡Ya visitaste esta promoción anteriormente. Participa ahora!',
    returnIcon: `
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
    `,
    persistData: false
  }
};

// Exportar para uso en módulos
if (typeof module !== 'undefined' && module.exports) {
  module.exports = modalParticiparDefinition;
}

// Para uso sin módulos
if (typeof window !== 'undefined') {
  window.modalParticiparDefinition = modalParticiparDefinition;
}
