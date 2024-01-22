<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'BackOffice service',
            'monthly_cost' => 7,
            'unit_cost' => null,
            'unit_type' => null,
        ]);

        Service::create([
            'name' => 'Storage service',
            'monthly_cost' => null,
            'unit_cost' => 0.03,
            'unit_type' => 'GB',
        ]);

        Service::create([
            'name' => 'Proxy service',
            'monthly_cost' => null,
            'unit_cost' => 0.03,
            'unit_type' => 'minute',
        ]);

        Service::create([
            'name' => 'Speech translation service',
            'monthly_cost' => null,
            'unit_cost' => 0.00003,
            'unit_type' => 'letter',
        ]);
    }
}
