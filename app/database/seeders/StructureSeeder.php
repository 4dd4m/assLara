<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $data = [
        ['Structure','ST'],
        ['Abstracts','AB'],
        ['Introduction Material','IN'],
        ['Programming','PR'],
        ['Terminology','TE'],
        ['Results','RS'],
        ['Conclusions','CO'],
        ['Reflection','RF'],
        ['References','RE'],
        ['Appendix','AP'],
        ['Spelling Mistakes','SP'],
        ['Plagilarism','PL']
        ];




        for($i = 0; $i <count($data); $i++){
            DB::table('sructures')->insert([
                'name' => $data[$i][0],
                'code' => $data[$i][1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
    }
}
