<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up() : void
    {
        try {
            Schema::create('posts', function (Blueprint $table)
            {
                $table->id();
                $table->bigInteger('user_id');
                $table->string('title', 50);
                $table->text('text');
                $table->dateTime('publish_at')->nullable();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
            });
        } catch ( Throwable $e ) {
            $this->down();

            throw $e;
        }
    }

    public function down() : void
    {
        Schema::table('posts', function (Blueprint $table){
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('posts');
    }
}
