<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remarks', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_id');
            $table->text('content');
            $table->string('remarkable_type')->nullable();
            $table->integer('remarkable_id')->nullable();
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
        Schema::dropIfExists('remarks');
    }
}
