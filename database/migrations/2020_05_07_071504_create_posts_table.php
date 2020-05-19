<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->Increments('id');
            $table->char('title');
            $table->integer('cate_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('image')->nullable();
            $table->date('publish_date');
            $table->char('summary');
            $table->text('content');
            $table->integer('view')->default(0);
            $table->integer('is_delete')->default(0);
            $table->integer('creator_at');
            $table->integer('updator_at')->nullable();
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
