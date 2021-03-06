<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))->create('app.drivers', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->constrained('app.users');
            $table->foreignId('role_id')->constrained('app.roles');
            $table->string('name')->comment('Nombre del conductor');
            $table->string('lastname');
            $table->date('birthdate');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->double('phone')->comment('Telefono del conductor');
            $table->text('placa')->comment('Placa del vehiculo ');
            $table->string('vehicle')->comment('tipo de vehiculo');
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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('app.drivers');
    }
}
