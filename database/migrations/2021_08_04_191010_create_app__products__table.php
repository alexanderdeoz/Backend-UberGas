<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))->create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dealer_id')->constrained('app.dealers');
            $table->text('name')->comment('Nombre del producto');
            $table->float('price')->comment('Precio del producto');
            $table->text('description')->comment('Descripción del producto');
            $table->text('img')->comment('imagén del producto');
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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('products');
    }
}
