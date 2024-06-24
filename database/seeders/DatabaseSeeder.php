<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Island;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
             Island::factory(2)->create()->each(function ($island) {
            Contact::factory(4)->create(['island_id' => $island->id]);
        });

    }
}