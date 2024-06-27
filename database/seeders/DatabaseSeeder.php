<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Island;
use App\Models\Region;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //      Island::factory(2)->create()->each(function ($island) {
        //     Contact::factory(4)->create(['island_id' => $island->id]);
        // });
        Region::factory(3)->create()->each(function ($region) {
            Island::factory(4)->create(['region_id' => $region->id])->each(function ($island) {
                Contact::factory(4)->create(['island_id' => $island->id]);
            });
        });
    }
}
