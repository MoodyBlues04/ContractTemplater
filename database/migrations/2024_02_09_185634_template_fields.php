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
        Schema::create('template_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id');
            $table->foreignId('field_id');

            $table->foreign('template_id')
                ->references('id')
                ->on('templates')
                ->onDelete('cascade');
            $table->foreign('field_id')
                ->references('id')
                ->on('fields')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('template_fields');
    }
};
