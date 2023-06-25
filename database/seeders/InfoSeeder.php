<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('info')->insert([
            'userid'=>1,
            'job'=>'Django Developer',
            'school'=>'Tech Academy',
            'password'=>'asd131232',
            'created_at'=>date(format:"Y-m-d H:i:s"),
            'updated_at'=>date(format:"Y-m-d H:i:s")


        ]);
    }
}
