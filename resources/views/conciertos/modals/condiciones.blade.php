{{-- Modal de Condiciones del Sorteo --}}
<div class="modal-overlay">
    <div class="modal-content">
        <h2 class="title">Condiciones del Sorteo</h2>

        <div class="conditions-box">
            <p class="conditions-title">Debes cumplir con todas condiciones para participar:</p>
            <ul class="conditions-list">
                <li>Ser cliente del Grupo Aval</li>
                <li>Solo puede participar el titular de la cuenta</li>
                <li>Los datos proporcionados deben superar la validación en línea</li>
                <li>Mantener en tu cuenta un saldo mínimo de $1.000.000 al momento de participar</li>
                <li>Debes ser mayor de 18 años</li>
                <li>Solo se permite una participación por cliente</li>
                <li>El sorteo se realizará el 15 de diciembre de 2025</li>
                <li>El premio no es canjeable por dinero</li>
                <li>Aplican términos y condiciones generales</li>
            </ul>
        </div>

        <label class="checkbox-container">
            <input type="checkbox" id="acepto-participar" class="checkbox" />
            <span class="checkbox-label">Acepto las condiciones y quiero participar</span>
        </label>

        <div class="form-registro" id="form-registro">
            <div class="form-group">
                <label class="label">Cédula *</label>
                <input
                    type="text"
                    id="cedula"
                    name="cedula"
                    class="input"
                    placeholder="Ingresa tu número de cédula (6-10 dígitos)"
                    maxlength="10"
                />
                <p class="error-message" id="error-cedula"></p>
            </div>

            <div class="form-group">
                <label class="label">Nombre Completo *</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="input"
                    placeholder="Ingresa tu nombre completo"
                />
                <p class="error-message" id="error-nombre"></p>
            </div>

            <div class="form-group">
                <label class="label">Celular *</label>
                <input
                    type="tel"
                    id="celular"
                    name="celular"
                    class="input"
                    placeholder="Ingresa tu número de celular (10 dígitos)"
                    maxlength="10"
                />
                <p class="error-message" id="error-celular"></p>
            </div>

            <div class="form-group">
                <label class="label">Email *</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="input"
                    placeholder="ejemplo@correo.com"
                />
                <p class="error-message" id="error-email"></p>
            </div>

            <div class="form-group">
                <label class="label">Ciudad *</label>
                <input
                    type="text"
                    id="ciudad"
                    name="ciudad"
                    class="input"
                    placeholder="Ingresa tu ciudad"
                />
                <p class="error-message" id="error-ciudad"></p>
            </div>

            <div class="form-group">
                <label class="label">Dirección *</label>
                <input
                    type="text"
                    id="direccion"
                    name="direccion"
                    class="input"
                    placeholder="Ingresa tu dirección completa (mínimo 10 caracteres)"
                />
                <p class="error-message" id="error-direccion"></p>
            </div>

            <button id="btn-registrar" class="btn-submit" data-submit-button disabled>
                {{ $buttonText ?? 'Registrar' }}
            </button>
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
        max-height: 90vh;
        overflow-y: auto;
        animation: fadeIn 0.3s ease-out;
        box-sizing: border-box;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }

    .title {
        font-size: 1.5rem;
        font-weight: 700;
        text-align: center;
        color: #1e40af;
        margin-bottom: 1rem;
    }

    .conditions-box {
        background-color: #f9fafb;
        border-radius: 0.5rem;
        padding: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .conditions-title {
        color: #374151;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .conditions-list {
        list-style: disc;
        list-style-position: outside;
        padding-left: 1.25rem;
        color: #4b5563;
        font-size: 0.875rem;
    }

    .conditions-list li {
        margin-bottom: 0.5rem;
    }

    .checkbox-container {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
        cursor: pointer;
    }

    .checkbox {
        width: 1.25rem;
        height: 1.25rem;
        cursor: pointer;
        accent-color: #1d4ed8;
    }

    .checkbox-label {
        margin-left: 0.75rem;
        color: #374151;
        font-weight: 500;
    }

    .form-registro {
        display: none;
    }

    .form-registro.visible {
        display: block;
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
</style>
