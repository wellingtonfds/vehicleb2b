<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 10, 0);
            $table->boolean('accept exchange')->default(false);
            $table->boolean('first_owner')->default(false);
            $table->boolean('financed')->default(false);
            $table->boolean('with_fines')->default(false);
            $table->boolean('taxes_paid')->default(false);
            $table->boolean('auction')->default(false);
            $table->integer('mileage');
            $table->enum('gearshift', ['manual', 'automatic', 'semi_automatic']);
            $table->mediumText('description')->nullable();
            $table->unsignedBigInteger('vehicle_version_id');
            $table->unsignedBigInteger('vehicle_color_id');
            $table->foreign('vehicle_color_id')
                ->references('id')
                ->on('vehicle_colors')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('vehicle_version_id')
                ->references('id')
                ->on('vehicle_versions')
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
        Schema::dropIfExists('vehicles');
    }
}
