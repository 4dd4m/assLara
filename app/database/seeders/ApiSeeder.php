<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApiSeeder extends Seeder
{
    public function run()
    {

        for($i = 0; $i <=5; $i++){
            DB::table('apis')->insert([
                'comment' => Str::random(100),
                'firstName' => Str::random(10),
                'lastName' => Str::random(10),
                'section' => Str::random(10),
                'email' => Str::random(10)."@email.com",
                'tone' => 1,
            ]);
        }
    }
}
