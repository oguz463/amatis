<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\User;
use App\Clinic;
use App\Equipment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $user = User::factory()->count(1)->create([
            'name'  => 'User',
            'email' => 'user@example.com'
          ]);

          $clinics = Clinic::factory()->count(50)->create();
          $equipments = Equipment::factory()->count(100)->create();

          $equipments->each(function($equipment) use ($clinics){
            foreach ($clinics as $clinic) {
              $rand = rand(0, 3);
              if($rand !== 0) $clinic->equipments()->attach($equipment, ['count' => $rand]);
            }
          });
    }
}
