<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(PortfolioImagesTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(SocialitesTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        //$this->call(WebsiteTableSeeder::class);
    }
}
