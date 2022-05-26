<?php

use App\Models\Mother;
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
        Schema::create('childrens', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Mother::class, 'mother_id');
            $table->string('name');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->unsignedTinyInteger('sex');
            $table->string('blood_type', 2);
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
        Schema::dropIfExists('childrens');
    }
};
