<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->string("entreprise_id");
            $table->string("titre");
            $table->mediumText("description");
            $table->string("lien")->nullable();
            $table->string("mime");
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
        Schema::dropIfExists('alert_etudiants');
    }
}
