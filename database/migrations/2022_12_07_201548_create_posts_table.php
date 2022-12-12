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
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->text('content')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('alias')->nullable();
            $table->string('img')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->index('category_id','post_category_idx');
            $table->foreign('category_id','post_category_fk')->on('categories')->references('id');
        });
        $collection = \App\Models\Post::all();
        foreach ($collection as $post){$post->save();}
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
