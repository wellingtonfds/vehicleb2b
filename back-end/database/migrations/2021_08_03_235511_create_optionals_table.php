<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optionals', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('vehicle_type_id');
            $table->foreign('vehicle_type_id')
                ->references('id')
                ->on('vehicle_types')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
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
        Schema::dropIfExists('optionals');
    }
}
