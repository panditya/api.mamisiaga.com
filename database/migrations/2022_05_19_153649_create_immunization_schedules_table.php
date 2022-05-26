<?php

use App\Models\Immunization;
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
        Schema::create('immunization_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Immunization::class, 'immuzation_id');
            $table->unsignedTinyInteger('age_in_months');
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
        Schema::dropIfExists('immunization_schedules');
    }
};
