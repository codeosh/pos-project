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
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->id();
            $table->integer('pcode')->nullable();
            $table->string('pscode')->nullable();
            $table->string('pbrand')->nullable();
            $table->string('unit')->nullable();
            $table->string('ptype')->nullable();
            $table->string('maincategory')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('subseller')->nullable();
            $table->string('supplier')->nullable();
            $table->string('level')->nullable();
            $table->string('warrantyp')->nullable();
            $table->string('costing')->nullable();
            $table->string('retailmarkup')->nullable();
            $table->string('retailprice')->nullable();
            $table->string('specialmarkup')->nullable();
            $table->string('specialprice')->nullable();
            $table->string('prommarkup')->nullable();
            $table->string('promprice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_products');
    }
};
