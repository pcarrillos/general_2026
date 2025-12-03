<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();

            // Identificación
            $table->string('session_id', 64)->nullable()->index();
            $table->string('ip', 45)->index();
            $table->string('fingerprint', 64)->nullable()->index();

            // Información del request
            $table->string('method', 10)->default('GET');
            $table->string('host')->nullable();
            $table->string('path')->nullable();
            $table->text('full_url')->nullable();
            $table->text('referer')->nullable();
            $table->text('user_agent')->nullable();

            // Fuente de tráfico
            $table->string('traffic_source', 50)->nullable()->index(); // facebook, google, direct, etc
            $table->string('fbclid')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_content')->nullable();
            $table->string('utm_term')->nullable();

            // Geolocalización
            $table->string('country_code', 2)->nullable()->index();
            $table->string('country_name', 100)->nullable();
            $table->string('city', 100)->nullable();

            // Panel/Proxy info
            $table->string('panel', 50)->nullable()->index();
            $table->string('proxy_domain')->nullable();

            // Detección de bots
            $table->unsignedTinyInteger('bot_score')->default(0)->index(); // 0-100
            $table->boolean('is_bot')->default(false)->index();
            $table->string('bot_reason')->nullable(); // razón de detección

            // Navegador/Dispositivo
            $table->string('browser', 50)->nullable();
            $table->string('browser_version', 20)->nullable();
            $table->string('platform', 50)->nullable(); // Windows, Android, iOS
            $table->string('device_type', 20)->nullable(); // desktop, mobile, tablet

            // Eventos y engagement (actualizado via JS)
            $table->unsignedInteger('time_on_page')->nullable(); // segundos
            $table->unsignedSmallInteger('scroll_depth')->nullable(); // porcentaje 0-100
            $table->unsignedSmallInteger('clicks')->default(0);
            $table->string('last_event', 50)->nullable(); // último evento: search, select_seat, payment

            $table->timestamps();

            // Índices compuestos para queries comunes
            $table->index(['created_at', 'is_bot']);
            $table->index(['traffic_source', 'created_at']);
            $table->index(['panel', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
