<?php

use App\Models\Children;
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
        Schema::create('children_body_mass_indices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Children::class, 'children_id');
            $table->unsignedTinyInteger('age_in_months');
            $table->unsignedSmallInteger('mass_in_kg')->nullable();
            $table->unsignedSmallInteger('height_in_cm')->nullable();
            $table->unsignedSmallInteger('head_circumference_in_cm')->nullable();
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
        Schema::dropIfExists('children_body_mass_indices');
    }
};
