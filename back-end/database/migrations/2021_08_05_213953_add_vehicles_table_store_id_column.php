<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVehiclesTableStoreIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->unsignedBigInteger('store_id')->after('vehicle_color_id');

            $table->foreign('store_id', 'v_store_fk')
                ->references('id')
            ->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropForeign('v_store_fk');
            $table->dropColumn('store_id');
        });
    }
}
