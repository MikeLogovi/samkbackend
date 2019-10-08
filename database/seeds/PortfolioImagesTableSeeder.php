<?php

use App\Models\PortfolioImage;
use Illuminate\Database\Seeder;

class PortfolioImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PortfolioImage::class,10)->create();
    }
}
