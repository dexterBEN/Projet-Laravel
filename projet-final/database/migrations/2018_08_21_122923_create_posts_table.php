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
            $table->enum('post_type', ['stage', 'formation']);//Liste de string définis
            $table->string('title', 100);
            $table->text('description')->nullable();//Peut être nullable
            $table->dateTime('date_début')->nullable();//Peut être nullable
            $table->dateTime('date_fin')->nullable();//Peut être nullable
            $table->unsignedDecimal('price', 6, 2)->nullable();//Le 2 après la virgule signifie que l'on à deux chiffre après la virgule (Peut être nullable)
            $table->smallInteger('maxStudent')->nullable();
            $table->enum('status', ['published', 'unpublished'])->default('unpublished');
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
