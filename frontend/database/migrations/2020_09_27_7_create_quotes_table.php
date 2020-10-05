<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('quoid');
            $table->unsignedInteger('tvseries_id');
            $table->tinyInteger('series_season')->unsigned();
            $table->tinyInteger('series_episode')->unsigned();
            $table->tinyInteger('count')->unsigned();
            $table->text('quote_hu');
            $table->text('quote_en');
            $table->string('person', 30);
            $table->string('video_url_hu', 100);
            $table->string('video_url_en', 100);
            $table->string('gif_url_hu', 100);
            $table->string('gif_url_en', 100);
            $table->string('img_url_hu', 100);
            $table->string('img_url_en', 100);
            $table->foreign('tvseries_id')->references('tvsid')->on('tvseries');
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
        Schema::dropIfExists('quotes');
    }
}
