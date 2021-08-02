<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_model_versions', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('cod_fipe')->nullable();
            $table->unsignedBigInteger('car_model_id');
            $table->foreign('car_model_id')
                ->references('id')
                ->on('car_models')
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
        Schema::dropIfExists('car_model_versions');
    }
}
