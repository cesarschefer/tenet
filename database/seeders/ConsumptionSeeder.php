<?php

namespace Database\Seeders;

use App\Models\Consumption;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsumptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = Service::all();

        foreach ($services as $service) {
            Consumption::factory(10)->create([
                'service_id' => $service->id
            ]);
        }

    }
}
