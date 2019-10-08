<?php

use App\Models\Socialite;
use Illuminate\Database\Seeder;

class SocialitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Socialite::class,10)->create();
    }
}
