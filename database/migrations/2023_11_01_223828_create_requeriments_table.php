<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requeriments', function (Blueprint $table) {
            $table->id();
            $table->string('officio_num');
            $table->string('destination');
            $table->string('office');
            $table->string('subject');
            $table->text('description')->nullable();
            $table->string('cord_1');
            $table->string('cord_office_1');
            $table->string('cord_2')->nullable();
            $table->string('cord_office_2')->nullable();
            $table->string('cord_3')->nullable();
            $table->string('cord_office_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requeriments');
    }
};
