<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->float('valor');
            $table->integer('quantidade');
            $table->string('fornecedora');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};
