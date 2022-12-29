<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Event;
use App\Models\HeroBanner;
use App\Models\Service;
use App\Models\News;

use File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $filepath = 'storage/app/public/images';

        File::makeDirectory($filepath,               $mode = 0777, true, true);
		File::makeDirectory($filepath.'/HeroBanner', $mode = 0777, true, true); //storage for hero banner images
		File::makeDirectory($filepath.'/Event',      $mode = 0777, true, true); //storage for event images
		File::makeDirectory($filepath.'/News',       $mode = 0777, true, true); //storage for news images
		File::makeDirectory($filepath.'/Service',    $mode = 0777, true, true); //storage for service images
        File::makeDirectory($filepath.'/User',       $mode = 0777, true, true); //storage for user images

        User::factory(50)
            ->hasUserImages(2)
            ->create();

        HeroBanner::factory(2)
            ->hasBannerImages(3)
            ->create();

        Event::factory(25)
            ->hasInvolvedTalent(5)
            ->create();

        News::factory(35)
            ->create();

        Service::factory(5)
            ->create();
    }
}
