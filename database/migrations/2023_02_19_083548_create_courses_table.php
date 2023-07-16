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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description');
            $table->text('short_description');
            $table->text('section');
            $table->text('requirements');
            $table->string('image');
            $table->string('video_url');
            $table->string('course_overview_provider');
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->boolean('is_free_course')->nullable();
            $table->boolean('status');
            $table->boolean('is_top_course');
            $table->double('price');
            $table->double('discount_price');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub__categories')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('multi_instructor');

            $table->enum('language',['English','Arabic']);
            $table->enum('level',['beginner','advanced','intermediate']);
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
        Schema::dropIfExists('courses');
    }
};
