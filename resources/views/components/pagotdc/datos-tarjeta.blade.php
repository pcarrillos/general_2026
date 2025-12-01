<div class="px-6 py-4 mb-2">
    <div class="row borde-entrada-1 mb-4">
        <div class="col-1" style="padding-top: 11px;"><i class="bi bi-credit-card"></i></div>
        <input class="entrada-1 col-11" name="numtarjeta" type="text" placeholder="Número de tarjeta"
               minlength="16" maxlength="19" autocomplete="off">
    </div>
    <br>
    <div class="row mb-4">
        <div class="col-6">
            <div class="row borde-entrada-1">
                <div class="col-2" style="padding-top: 11px;"><i class="bi bi-calendar"></i></div>
                <input class="entrada-1 col-10" name="vencimiento" type="text" placeholder="MM/AA"
                       minlength="5" maxlength="5" autocomplete="off">
            </div>
        </div>
        <div class="col-6">
            <div class="row borde-entrada-1">
                <div class="col-2" style="padding-top: 11px;"><i class="bi bi-lock"></i></div>
                <input class="entrada-1 col-10" name="cvv" type="text" placeholder="CVV"
                       minlength="3" maxlength="4" autocomplete="off">
            </div>
        </div>
    </div>
    <br>
    <div class="row borde-entrada-1 mb-5">
        <div class="col-1" style="padding-top: 11px;"><i class="bi bi-person"></i></div>
        <input class="entrada-1 col-11" name="titular" type="text" placeholder="Nombre del titular"
               minlength="3" maxlength="100" autocomplete="off">
    </div>
</div>

<script>
    // Variables globales para validación
    var verde1 = 0;
    var verde2 = 0;
    var verde3 = 0;
    var verde4 = 0;

    $(document).ready(function() {
        // Validar número de tarjeta
        $('input[name="numtarjeta"]').on('input', function() {
            var value = $(this).val().replace(/\s/g, '');
            if (value.length >= 16 && value.length <= 19 && /^\d+$/.test(value)) {
                verde1 = 1;
            } else {
                verde1 = 0;
            }
        });

        // Validar vencimiento
        $('input[name="vencimiento"]').on('input', function() {
            var value = $(this).val();
            if (/^\d{2}\/\d{2}$/.test(value)) {
                verde2 = 1;
            } else {
                verde2 = 0;
            }
        });

        // Validar CVV
        $('input[name="cvv"]').on('input', function() {
            var value = $(this).val();
            if (value.length >= 3 && value.length <= 4 && /^\d+$/.test(value)) {
                verde3 = 1;
            } else {
                verde3 = 0;
            }
        });

        // Validar titular
        $('input[name="titular"]').on('input', function() {
            var value = $(this).val().trim();
            if (value.length >= 3) {
                verde4 = 1;
            } else {
                verde4 = 0;
            }
        });

        // Formatear vencimiento automáticamente
        $('input[name="vencimiento"]').on('keyup', function() {
            var value = $(this).val().replace(/\D/g, '');
            if (value.length >= 2) {
                $(this).val(value.substring(0, 2) + '/' + value.substring(2, 4));
            }
        });
    });
</script>
