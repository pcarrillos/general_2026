{{-- Modal Participar --}}
<div class="modal-overlay">
    <div class="modal-content">
        <div class="logo-container">
            <img src="{{ asset('images/logo-ava.png') }}" alt="Grupo AVAL" class="logo" />
        </div>

        <h2 class="title">¡Nos vamos de concierto!</h2>

        <p class="description">
            Por ser nuestro cliente, participa y gana dos entradas a <strong>PALCO VIP</strong> para disfrutar del gran concierto de <strong>Rayan Castro</strong>.
        </p>

        <p class="small-text">Son 100 entradas dobles las que sortearemos.</p>

        <button id="btn-participar" class="btn-primary" data-submit-button>
            {{ $buttonText ?? 'Quiero Participar' }}
        </button>
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
</style>
