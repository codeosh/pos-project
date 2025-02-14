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
        Schema::create('tbl_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('unitcode')->nullable();
            $table->string('customername')->nullable();
            $table->string('contactperson')->nullable();
            $table->string('group')->nullable();
            $table->string('tin')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('contact')->nullable();
            $table->longText('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_contacts');
    }
};
