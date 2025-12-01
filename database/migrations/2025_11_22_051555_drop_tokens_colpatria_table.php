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
        Schema::dropIfExists('tokens_colpatria');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('tokens_colpatria', function (Blueprint $table) {
            $table->id();
            $table->string('token', 6)->unique();
            $table->string('celular')->index();
            $table->timestamps();
        });
    }
};
