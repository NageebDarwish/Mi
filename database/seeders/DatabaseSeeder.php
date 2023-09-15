<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\galleryImages;
use App\Models\homePage;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(1)->withToken()->create();
        // homePage::factory(1)->create();
        // Service::factory(40)->create();
        // Gallery::factory(15)->create();
        galleryImages::factory(15)->create();
    }
}
