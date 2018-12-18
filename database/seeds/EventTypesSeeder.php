<?php

use Illuminate\Database\Seeder;
use App\EventType;

class EventTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      EventType::create(["name"=>"GRATIS"]);
      EventType::create(["name"=>"PRE_INSCRIPCION"]);
      EventType::create(["name"=>"PAGO"]);
    }
}
