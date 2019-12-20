<?php

use Illuminate\Database\Seeder;
use App\Models\Newsletting;
class NewslettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Newsletting::class,10)->create();
    }
}
