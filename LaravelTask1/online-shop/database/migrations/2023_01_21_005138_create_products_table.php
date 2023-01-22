<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('size_id')->default(0);
            $table->unsignedBigInteger('color_id')->default(0);
            $table->float('price');
            $table->float('discount')->default(0);
            $table->boolean('is_recent')->default(true);
            $table->boolean('is_featured')->default(true);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->restrictOnDelete();
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('color_id')->references('id')->on('colors');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products', function (Blueprint $table) {
            $table->dropColumn('is_recent');
            $table->dropColumn('is_featured');
        });
    }
};