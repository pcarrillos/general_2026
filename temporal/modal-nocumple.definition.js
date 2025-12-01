/**
 * Definición declarativa del Modal No Cumple
 * Modal informativo cuando el usuario no cumple requisitos
 */

const modalNoCumpleDefinition = {
  // ==================== TEMPLATE ====================
  template: function({ buttonText, showProgress, flowConfig }) {
    return `
      <div class="modal-overlay">
        <div class="modal-content">
          <div class="content">
            <div class="icon-container">
              <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
              </svg>
            </div>

            <p class="message">
              No cumples con uno o varios de los requisitos para participar
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
      padding: 2rem 1.5rem;
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
      text-align: center;
    }

    .icon-container {
      background-color: #fee2e2;
      border-radius: 50%;
      padding: 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .icon {
      width: 3rem;
      height: 3rem;
      color: #dc2626;
    }

    .message {
      color: #374151;
      font-size: 1.125rem;
      font-weight: 600;
      line-height: 1.6;
      max-width: 100%;
    }

    .return-notification {
      background: #FEF3C7;
      border-left: 4px solid #F59E0B;
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
      color: #F59E0B;
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
    // Este modal no tiene interacción del usuario
  },

  // ==================== CICLO DE VIDA ====================
  lifecycle: {
    // No se requiere lógica especial en este modal
  },

  // ==================== MÉTODOS PERSONALIZADOS ====================
  // No se requieren métodos personalizados

  // ==================== CONFIGURACIÓN ====================
  config: {
    defaultButtonText: null, // Este modal no tiene botón
    showReturnNotification: false, // No mostrar notificación de retorno para este modal
    returnMessage: 'Ya has revisado esta información anteriormente.',
    returnIcon: `
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
    `,
    persistData: false,
    observedAttributes: []
  }
};

// Exportar
if (typeof window !== 'undefined') {
  window.modalNoCumpleDefinition = modalNoCumpleDefinition;
}

if (typeof module !== 'undefined' && module.exports) {
  module.exports = modalNoCumpleDefinition;
}
