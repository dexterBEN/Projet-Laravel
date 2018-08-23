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
            $table->enum('post_type', ['stage', 'formation', 'indéfinie']);//Liste de string définis
            $table->string('title', 100);
            $table->text('description');//Peut être nullable
            $table->string('date_début', 100);//Peut être nullable
            $table->string('date_fin', 100);//Peut être nullable
            $table->unsignedDecimal('price', 6, 2);//Le 2 après la virgule signifie que l'on à deux chiffre après la virgule (Peut être nullable)
            $table->smallInteger('maxStudent');
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
