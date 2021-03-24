<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics_equipments', function (Blueprint $table) {
          $table->unsignedInteger('clinic_id');
          $table->unsignedInteger('equipment_id');
          $table->unsignedInteger('count')->default(1);
          $table->primary(['clinic_id', 'equipment_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinics_equipments');
    }
}
