<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'gwaidho',
            'email'=>'gwaidhosaluwahlillian@gmail.com',
            'password'=>bcrypt ('12345678'),
        ]);

        User::create([
            'name'=>'abenaitwe',
            'email'=>'abenitweshield1842@gmail.com',
            'password'=>bcrypt ('12345678'),
        ]);

        User::create([
            'name'=>'naswagi',
            'email'=>'naswagisharifah@gmail.com',
            'password'=>bcrypt ('12345678'),
        ]);
        User::create([
            'name'=>'jash',
            'email'=>'jash@gmail.com',
            'password'=>bcrypt ('2200706771'),
        ]);
    }
}
