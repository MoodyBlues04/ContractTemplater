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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->json('data')->nullable();

            $table->foreignId('user_id');
            $table->foreignId('template_id');
            $table->foreignId('docx_file_id')->nullable();
            $table->foreignId('pdf_file_id')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('template_id')
                ->references('id')
                ->on('templates')
                ->onDelete('cascade');
            $table->foreign('docx_file_id')
                ->references('id')
                ->on('files')
                ->onDelete('set null');
            $table->foreign('pdf_file_id')
                ->references('id')
                ->on('files')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
