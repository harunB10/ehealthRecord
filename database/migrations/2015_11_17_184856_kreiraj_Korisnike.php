<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajKorisnike extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korisnicis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imePrezime');

            $table->string('imeOca');
            $table->string('adresa');
            $table->date('datumRodjenja');
            $table->string('mjestoPrebivalista');
            $table->string('statusZaposlenja');
            $table->string('bracnoStanje');
            $table->string('tezina');
            $table->string('visina');
            $table->string('alergija');
            $table->string('jmbg');
            $table->string('vrstaOsiguranja');
            $table->string('brojZdravstveneKnjizice');
            $table->string('email');
            $table->string('krvnaGrupa');

            $table->integer('idDoktor')->unsigned();







        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('korisnicis');
    }
}
