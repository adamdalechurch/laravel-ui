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
        DB::table('configurations')->insert([
            'name' => 'ORG_NAME',
            'display_name' => 'Organization Name',
            'value' => 'Projeny Organization',
            'type' => 'string',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('configurations')->insert([
            'name' => 'EMAIL_NOTIFICATIONS',
            'display_name' => 'Email Notifications',
            'value' => '1',
            'type' => 'bool',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('configurations')->insert([
            'name' => 'EMAIL_PROVIDER',
            'display_name' => 'Email Provider',
            'value' => 'SendGrid',
            'type' => 'select',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
