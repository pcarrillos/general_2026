<!-- Error -->
<div id="error" class="w-full flex flex-col justify-center items-center pb-6 hidden">
    <div class="w-full flex mt-4 flex-col justify-center items-center gap-4 pl-1">
        <div class="w-[100%] bg-white py-6 px-4 rounded-xl flex flex-col items-center">

            <div class="mt-2.5">
                <svg class="w-12 h-12 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="w-[90%] flex flex-col mt-4 mb-4">
                <span class="text-[16px] text-center text-gray-800">
                    Lo sentimos, no es posible continuar con el proceso. Intenta mas tarde.
                </span>
                <div id="countdown-error" class="text-[14px] text-center text-gray-600 mt-3 hidden">
                    Redirigiendo en <span id="timer-error">5</span> segundos...
                </div>
            </div>
        </div>
    </div>
</div>
