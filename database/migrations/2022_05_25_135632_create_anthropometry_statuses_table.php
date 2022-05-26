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
        Schema::create('anthropometry_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Anthropometry::class, 'anthropometry_id');
            $table->string('name');
            $table->tinyInteger('max_z_score')->nullable();
            $table->tinyInteger('min_z_score')->nullable();
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
        Schema::dropIfExists('anthropometry_statuses');
    }
};
