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
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id();
            $table->integer('pcode');
            $table->string('pscode');
            $table->string('pbrand');
            $table->string('unit');
            $table->string('ptype');
            $table->string('maincategory');
            $table->string('subcategory');
            $table->string('subseller');
            $table->string('supplier');
            $table->string('level');
            $table->string('warrantyp');
            $table->string('costing');
            $table->string('retailmarkup');
            $table->string('retailprice');
            $table->string('specialmarkup');
            $table->string('specialprice');
            $table->string('prommarkup');
            $table->string('promprice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product');
    }
};
