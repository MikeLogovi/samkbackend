<?php

use App\Models\PortfolioCategory;
use Illuminate\Database\Seeder;

class PortfolioCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(PortfolioCategory::class,10)->create();
    }
}
