<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Evidencija extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencija', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazivUstanove');
            $table->text('dijagnoza');
            $table->string('lijek');
            $table->text('napomena');
            $table->binary('data');
            $table->integer('idKorisnik')->unsigned();
            $table->integer('idDoktor')->unsigned();

            $table->timestamps();

            $table->foreign('idKorisnik')
                ->references('id')
                ->on('korisnicis');

            $table->foreign('idDoktor')
                ->references('id')
                ->on('doktor');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evidencija');
    }
}
