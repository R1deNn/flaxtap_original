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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->integer('id_category');
            $table->integer('id_vobler')->nullable();
            $table->string('title');
            $table->string('description');
            $table->integer('default_price');
            $table->integer('price_student');
            $table->integer('price_opt_student');
            $table->integer('amount');
            $table->integer('active')->default(1);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
