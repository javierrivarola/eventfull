<?php

use Illuminate\Database\Seeder;
use App\PaymentGateway;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      PaymentGateway::create(["name"=>"EFECTIVO"]);
      PaymentGateway::create(["name"=>"TARJETA"]);
      PaymentGateway::create(["name"=>"PAYPAL"]);
    }
}
