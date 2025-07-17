<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Contact::factory()->count(35)->create();

        $this->call([
            CategoriesTableSeeder::class,
        ]);
    }
}
