<?php

use App\Models\Anthropometry;
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
        Schema::create('anthropometry_standards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Anthropometry::class, 'anthropometry_id');
            $table->unsignedTinyInteger('age_in_months');
            $table->float('standard_deviation');
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
        Schema::dropIfExists('anthropometry_standards');
    }
};
