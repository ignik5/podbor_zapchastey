<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateZapchastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zapchasts', function (Blueprint $table) {
            $table->id();
            $table->string('article');
            $table->string('name');
            $table->string('link');
            $table->string('code');
            $table->string('image')->nullable();
            $table->integer('product_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zapchasts');
    }
}
