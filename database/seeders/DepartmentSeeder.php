<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['R&D','PR','QC','DSP','QA','ENG','FA','HR','IT','Management'] as $name) {
            Department::firstOrCreate(['name' => $name]);
        }
    }
}

