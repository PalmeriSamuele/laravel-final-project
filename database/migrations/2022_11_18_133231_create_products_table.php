<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('desc');
            $table->integer('price');
            $table->string('size',10);            
            $table->string('image',200);            
            $table->mediumInteger('stock');            
            $table->boolean('isFavorite')->default(0);            
            $table->foreignId('categorie_id')->constrained();         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
