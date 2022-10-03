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
        
        Schema::create('notes', function (Blueprint $table){
            $table->id();
            $table->string('note');
            $table->string('code_ue');
            $table->foreign('code_ue')->references('code')->on('u_e_s')->onDelete('cascade');
            $table->string('matricule_etud');
            $table->foreign('matricule_etud')->references('matricule')->on('etudiants')->onDelete('cascade');
            $table->unique(['code_ue', 'matricule_etud']);
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
        Schema::dropIfExists('notes');
    }
};