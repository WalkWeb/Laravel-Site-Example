<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('category_id')->unsigned()->nullable(false);
            $table->text('desc_short')->nullable(false);
            $table->text('desc')->nullable(false);
            $table->string('meta_title')->nullable(false);
            $table->string('meta_desc');
            $table->string('meta_key');
            $table->boolean('published');
            $table->integer('view')->default(0);
            $table->integer('created_by')->unsigned()->nullable(false);
            $table->integer('edit_by')->unsigned();
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('edit_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
