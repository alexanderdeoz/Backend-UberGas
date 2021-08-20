<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))
            ->create('app.travels', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('app.users');
                $table->foreignId('driver_id')->constrained('app.drivers');              
                $table->foreignId('order_id')->constrained('app.orders');
                //$table->foreignId('detail_order_id')->constrained('app.detailsOrders');
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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('app.travels');
    }
}
