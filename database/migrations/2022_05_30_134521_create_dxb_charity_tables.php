<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDxbCharityTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso2')->nullable();
            $table->string('iso3')->nullable();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
            $table->string('ar_name')->nullable();
            $table->integer('phonecode')->nullable();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id');
            $table->string('name')->nullable();
            $table->string('ar_name')->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('ar_name')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('items_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('ar_title')->nullable();
            $table->text('description')->nullable();
            $table->text('ar_description')->nullable();
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
        Schema::dropIfExists('countries');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('items');
        Schema::dropIfExists('items_images');
        Schema::dropIfExists('pages');
    }
}
