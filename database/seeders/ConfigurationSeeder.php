<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('statuses')->truncate();
        
        DB::table('configuration')->insert([
            'name' => 'ORG_NAME',
            'display_name' => 'Organization Name',
            'value' => 'Projeny Organization',
            'type' => 'string',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('configuration')->insert([
            'name' => 'EMAIL_NOTIFICATIONS',
            'display_name' => 'Email Provider',
            'value' => 'true',
            'type' => 'bool',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('configuration')->insert([
            'name' => 'EMAIL_PROVIDER',
            'display_name' => 'Email Provider',
            'value' => 'SendGrid',
            'type' => 'select',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        
    }
}
