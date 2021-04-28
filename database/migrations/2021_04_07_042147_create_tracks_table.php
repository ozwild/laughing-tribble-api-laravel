<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('title');
            $table->string('source')->nullable();
            $table->string('key')->nullable();
            $table->string('bpm')->nullable();
            $table->integer('duration')->nullable();
            $table->text('lyrics')->nullable();
            $table->enum('type', ['ORIGINAL', 'COVER', 'REMIX'])->default('ORIGINAL');

            $table->uuid('collection_id')->nullable();

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
        Schema::dropIfExists('tracks');
    }
}
