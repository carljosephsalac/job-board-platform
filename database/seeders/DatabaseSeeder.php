<?php

namespace Database\Seeders;

use App\Models\Job;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Carl',
            'last_name' => 'Salac',
            'email' => 'test@example.com',
        ]);

        Job::factory(15)->create();

        // - php artisan db:seed, pwedeng makapag add ng dummy data sa ibat-ibang table sa isang command lang.
        // - php artisan make:seeder SeederName, para makagawa ng specific seeder class.
        // - php artisan db:seed --class=SeederName, pag specific na table lang ang gustong lagyan ng dummy data.
    }
}