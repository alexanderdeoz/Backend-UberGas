<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))->create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clients_id')->constrained('app.users');
            $table->foreignId('driver_id')->constrained('app.drivers');
            $table->text('calification')->comment('Calificación sobre 5 del pedido');
            $table->double('deliveryCost', 8, 2)->comment('Costo de la entrega');
            $table->date('deliveryDate')->comment('Fecha del pedido');
            $table->enum('state', ['pendiente', 'aceptado', 'viaje', 'entregado'])->comment('Estado del pedido');
            $table->enum('payment', ['efectivo', 'tarjeta', 'cupon'])->comment('Método de pago del pedido');
            $table->time('waitTime')->comment('Tiempo de espera desde la aceptación');
            $table->double('totalPrice')->comment('Precio total del pedido');
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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('orders');
    }
}
