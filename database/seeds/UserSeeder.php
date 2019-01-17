<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persona = User::create(["name"=>"Alberto Gonzalez", "password"=>Hash::make('password'), "email" => "alberto@mail.com"]);
        $persona->assignRole('persona');

        $alumno = User::create(["name"=>"Beto Llanes", "password"=>Hash::make('password'), "email" => "beto@mail.com", "university"=>"UCA","faculty"=>"CyT"]);
        $alumno->assignRole('alumno');
        $alumno = User::create(["name"=>"Josue Ramirez", "password"=>Hash::make('password'), "email" => "josue@mail.com", "university"=>"UCA","faculty"=>"CyT"]);
        $alumno->assignRole('alumno');

        $investigador = User::create(["name"=>"Carlos Mernes", "password"=>Hash::make('password'), "email" => "carlos@mail.com"]);
        $investigador->assignRole('investigador');
        $profesor = User::create(["name"=>"Jose Von Lucken", "password"=>Hash::make('password'), "email" => "jose@mail.com"]);
        $profesor->assignRole('profesor');
        $profesional = User::create(["name"=>"Margarita Espinola", "password"=>Hash::make('password'), "email" => "margarita@mail.com"]);
        $profesional->assignRole('profesional');


    }
}
