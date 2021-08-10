<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Dealer;
use App\Models\Driver;
use App\Models\Order;
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
        Dealer::factory(10)
        ->has(User::factory()->count(3), 'users')
        ->has(Role::factory()->count(3), 'roles')
        ->create();
        User::factory(10)
            ->has(User::factory()->count(3), 'users')
            ->has(Role::factory()->count(3), 'roles')
            ->create();
        Driver::factory(10)
            ->has(User::factory()->count(3), 'users')
            ->has(Role::factory()->count(3), 'roles')
            ->create();
        Client::factory(10)
            ->has(User::factory()->count(3), 'users')
            ->has(Role::factory()->count(3), 'roles')
            ->create();
        Order::factory(10)
            ->has(Order::factory()->count(3), 'orders')
            ->has(Product::factory()->count(3), 'products')
            ->create();
        Travel::factory(10)
            ->has(Driver::factory()->count(3), 'drivers')
            ->has(Client::factory()->count(3), 'clients')
            ->has(Order::factory()->count(3), 'orders')
            ->create();
    }
}
