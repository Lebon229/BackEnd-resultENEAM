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
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('matricule_etud');
            $table->foreign('matricule_etud')->references('matricule')->on('etudiants')->onDelete('cascade');
            $table->string('annee');
            $table->string('filliere');
            $table->string('ue');
            $table->string('fiche');
            $table->string('quittance');
            $table->string('email');
            $table->string('carte');
            $table->string('valider')->nullable();            
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
        Schema::dropIfExists('reclamations');
    }
};