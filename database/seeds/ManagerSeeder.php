<?php

namespace Database\Seeders;

use App\Models\ManagerSetting;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = Manager::create([
            'name' => "BTS TUR",
            'tel' => "05468038803",
            'email' => "ahmetdaldemir@gmail.com",
            'domain' => "btstur.com",
            'start_date' => date("Y-m-d"),
            'licance_count' => 2
         ]);

        ManagerSetting::create([
            'manager_id' => $manager->id,
            'address' => "Test",
            'email' => "ahmetdaldemir@gmail.com",
            'tel' => "05468038003",
            'map' => "Test",
            'language' => [
                'id' => 1,
            ],
        ]);

        ManagerSetting::create([
            'manager_id' => $manager->id,
            'module_id' => 1
        ]);
    }
}
