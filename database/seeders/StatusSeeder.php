<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('statuses')->truncate();

        DB::table('statuses')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'name' => 'To Do'
        ]);
        
        DB::table('statuses')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'name' => 'Working On It'
        ]);

        DB::table('statuses')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'name' => 'In Review'
        ]);

        DB::table('statuses')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'name' => 'Completed'
        ]);

        DB::table('statuses')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'name' => 'Archived'
        ]);
    }
}
