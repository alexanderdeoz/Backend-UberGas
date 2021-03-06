<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))->create('app.dealers', function (Blueprint $table) {
            $table->id();
            $table->text('name')->comment('Nombre de la distribuidora');
            $table->text('address')->comment('Dirección de la distribuidora');
            $table->text('city')->comment('Ciudad de la distribuidora');
            $table->text('timeOpen')->comment('Hora de apertura');
            $table->text('timeClose')->comment('Hora de cierre');
            
            $table->softDeletes();
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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('app.dealers');
    }
}
