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
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lawyer_id');
            $table->string('subject');
            $table->string('jurisdiction');
            $table->decimal('cause_value', 20, 2)->nullable();
            $table->boolean('justice_secret')->default(0);
            $table->boolean('free_justice')->default(0);
            $table->boolean('tutelary')->default(0);
            $table->string('priority');
            $table->string('judgmental_organ');
            $table->string('judicial_office');
            $table->string('competence');
            $table->string('url_collective', 2048)->nullable();
            $table->string('url_notices', 2048)->nullable();
            $table->string('email_coorporative');
            $table->string('email_client')->nullable();
            $table->integer('qtd_update')->nullable();
            $table->integer('qtd_finish')->nullable();
            $table->boolean('progress')->default(0);
            $table->boolean('finish')->default(0);
            $table->boolean('update')->default(0);
            $table->string('type_process');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('lawyer_id')->references('id')->on('lawyers')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collectives');
    }
};
