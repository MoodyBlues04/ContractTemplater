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
        Schema::create('document_type_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_type_id');
            $table->foreignId('field_id');

            $table->foreign('document_type_id')
                ->references('id')
                ->on('document_types')
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
        Schema::dropIfExists('document_type_fields');
    }
};
