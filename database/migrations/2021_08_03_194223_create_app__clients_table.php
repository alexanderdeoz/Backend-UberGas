<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))->create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('app.users');
            $table->text('address')->comment('Dirección domiciliaria');
            $table->enum('payment', ['efectivo', 'tarjeta'])->comment(' método de pago del cliente');
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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('clients');
    }
}
