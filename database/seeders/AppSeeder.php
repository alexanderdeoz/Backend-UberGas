<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Dealer;
use App\Models\Driver;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Role;
use App\Models\Travel;
use App\Models\User;

use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Travel::factory(10)->create();
        Role::factory(10)->create();
        Payment::factory(10)->create();
        Product::factory(10)->create();
        Order::factory(10)->create();
        User::factory(10)->create();
        Client::factory(10)->create();
        Driver::factory(10)->create();
        Dealer::factory(10)->create();
    }
}
