<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailConfigSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('email_configs')->updateOrInsert(
            ['event_key' => 'tmr.submitted'],
            [
                'send_to_roles' => json_encode(['superadmin','admin','dephead','supervisor']),
                'send_to_users' => json_encode([]),
                'send_to_emails'=> json_encode([]),
                
                'active' => true,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}

