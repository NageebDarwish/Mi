<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('landing_image');
            $table->string('landing_title_en');
            $table->string('landing_title_ar');
            $table->text('landing_desc_en');
            $table->text('landing_desc_ar');
            $table->string('about_image');
            $table->string('about_title_en');
            $table->string('about_title_ar');
            $table->text('about_desc_en');
            $table->text('about_desc_ar');
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
        Schema::dropIfExists('home_pages');
    }
}
