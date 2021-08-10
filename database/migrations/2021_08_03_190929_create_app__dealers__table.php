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
        Schema::connection(env('DB_CONNECTION_APP'))->create('dealers', function (Blueprint $table) {
            $table->id();
            $table->text('address')->comment('Dirección de la distribuidora');
            $table->integer('calification')->comment('Calificación de la distribuidora');
            $table->text('country')->comment('Pais de la distribuidora');
            $table->text('city')->comment('Ciudad de la distribuidora');
            $table->text('img_url')->comment('url/path de la imagen de la distribuidora');
            $table->text('name')->comment('Nombre de la distribuidora');
            $table->integer('ranking')->comment('Ranking de la distribuidora en ventas');
            $table->text('time_open')->comment('Hora de apertura');
            $table->text('time_close')->comment('Hora de cierre');
            
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
        Schema::dropIfExists('dealers');
    }
}
