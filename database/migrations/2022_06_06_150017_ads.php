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
        Schema::create('ads', function(Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->foreignIdFor(\App\Models\User::class, 'user_id');
            $blueprint->foreignIdFor(\App\Models\Category::class, 'category_id');
            $blueprint->foreignIdFor(\App\Models\City::class,'city_id');
            $blueprint->string('ad_header');
            $blueprint->string('description');
            $blueprint->string('action');
            $blueprint->float('price');
            $blueprint->string('picture');
            $blueprint->string('condition');
            $blueprint->string('phone_number');
            $blueprint->string('email');
            $blueprint->string('website');
            $blueprint->string('video');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
