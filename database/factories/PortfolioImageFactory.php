<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PortfolioCategory;
use App\Models\PortfolioImage;
use Faker\Generator as Faker;

$factory->define(PortfolioImage::class, function (Faker $faker) {
    $portfolioCategory = factory(PortfolioCategory::class)->create();
    $name=$faker->name;
    return [
            'portfolio_category_id'=> $portfolioCategory->id,
            'source'=>'uploads/portfolio/img'.rand(1,10).'.jpg',
            'title'=>$name,
            'slug'=>str_slug($name)     
    ];
});
