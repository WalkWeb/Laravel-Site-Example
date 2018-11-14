<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLkPostToCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lk_post_to_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('lk_post_to_category_id');
            $table->string('lk_post_to_category_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lk_post_to_category');
    }
}
