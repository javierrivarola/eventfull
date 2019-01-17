<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(EventTypesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PaymentGatewaySeeder::class);
    }
}
