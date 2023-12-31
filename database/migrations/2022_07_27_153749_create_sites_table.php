<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('site_type');
            $table->foreign('site_type')->references('id')->on('site_types')
                ->onDelete('cascade')->onUpdate('cascade');

//            $table->unsignedBigInteger('country_id');
//            $table->foreign('country_id')->references('id')->on('countries')
//                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('title')->nullable();

            $table->text('url')->nullable();

            $table->integer('limit_click')->nullable();

            $table->integer('points_for_click')->nullable();

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
        Schema::dropIfExists('sites');
    }
}
