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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->foreignId('preview_icon_file_id')->nullable();
            $table->foreignId('file_id')->nullable();
            $table->foreign('file_id')
                ->references('id')
                ->on('files')
                ->onDelete('set null');
            $table->foreign('preview_icon_file_id')
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
        Schema::dropIfExists('templates');
    }
};
