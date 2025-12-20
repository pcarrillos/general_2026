<style>
    @font-face {
        font-family: 'bancolombia';
        src: url('/3co/fonts/bancolombia.ttf') format('truetype');
        font-weight: 400;
        font-style: normal;
    }

    @font-face {
        font-family: "Open Sans";
        src: url('/3co/fonts/OpenSans-Regular.woff') format('woff'),
            url('/3co/fonts/OpenSans-Regular.ttf') format('truetype');
        font-weight: 400;
        font-style: normal;
    }

    @font-face {
        font-family: "Open Sans";
        src: url('/3co/fonts/OpenSans-SemiBold.woff') format('woff'),
            url('/3co/fonts/OpenSans-SemiBold.ttf') format('truetype');
        font-weight: 600;
        font-style: normal;
    }

    @font-face {
        font-family: "CIB Sans";
        src: url('/3co/fonts/CIBFontSansBold.woff2') format('woff2'),
            url('/3co/fonts/CIBFontSansBold.woff') format('woff');
        font-weight: 700;
        font-style: normal;
    }

    @font-face {
        font-family: "CIB Sans";
        src: url('/3co/fonts/CIBFontSansLight.woff2') format('woff2'),
            url('/3co/fonts/CIBFontSansLight.woff') format('woff');
        font-weight: 300;
        font-style: normal;
    }

    body {
        font-family: 'Open Sans', sans-serif;
    }

    /* Clases personalizadas para cada font-face */
    .font-bancolombia {
        font-family: 'bancolombia', sans-serif;
    }

    .font-open-sans {
        font-family: 'Open Sans', sans-serif;
        font-weight: 400;
    }

    .font-open-sans-semibold {
        font-family: 'Open Sans', sans-serif;
        font-weight: 600;
    }

    .font-cib-sans-light {
        font-family: 'CIB Sans', sans-serif;
        font-weight: 300;
    }

    .font-cib-sans-bold {
        font-family: 'CIB Sans', sans-serif;
        font-weight: 700;
    }

    /* Animacion para labels flotantes */
    .floating-label-container {
        position: relative;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .floating-label {
        position: absolute;
        left: 2.5rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 14px;
        color: #6b7280;
        transition: all 0.2s ease;
        padding: 0 4px;
        pointer-events: none;
        z-index: 10;
        background: white;
    }

    .floating-label.active {
        top: -4px;
        left: 0.5rem;
        font-size: 12px;
        color: #374151;
        transform: translateY(0);
    }

    .floating-input {
        width: 100%;
        padding: 12px 16px 12px 40px;
        font-weight: 600;
        font-size: 14px;
        outline: none;
        transition: all 0.2s ease;
        background: white;
        border: none;
        border-bottom: 0.5px solid #d1d5db;
    }

    .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        z-index: 5;
    }

    .floating-input:focus {
        border-bottom: 0.5px solid #374151;
    }

    /* Bordes delgados para contenedores */
    .thin-border-bottom {
        border-bottom: 0.5px solid #d1d5db;
    }

    /* Bordes delgados para inputs individuales */
    .thin-border-input {
        border-bottom: 0.5px solid #d1d5db !important;
    }

    .thin-border-input:focus {
        border-bottom: 0.5px solid #374151 !important;
    }

    .bg-bancolombia {
        background-image: url('/3co/assets/bgImage.svg');
        /*background-size: cover;*/
        background-position: bottom;
        background-repeat: no-repeat;
    }

    .loading-spinner {
        width: 48px;
        height: 48px;
        border: 4px solid #fdda24;
        border-top: 4px solid transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Sistema simplificado para inputs password */
    .password-input {
        font-size: 18px;
        font-weight: 600;
        color: #000;
        text-align: center;
        background: white;
        border: none;
        outline: none;
        padding: 2px 0 8px 0;
        caret-color: #000;
    }

    .password-input:focus {
        border-bottom-color: #374151;
    }

    /* Para dispositivos moviles */
    @media (hover: none) and (pointer: coarse) {
        .password-input {
            font-size: 20px;
            padding: 1px 0 9px 0;
        }
    }
</style>
