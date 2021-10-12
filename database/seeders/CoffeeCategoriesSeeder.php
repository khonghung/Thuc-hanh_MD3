<?php

namespace Database\Seeders;

use App\Models\CoffeeCategory;
use Illuminate\Database\Seeder;

class CoffeeCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coffeeCategory = new CoffeeCategory();
        $coffeeCategory->name = 'Cà phê say';
        $coffeeCategory->save();


        $coffeeCategory = new CoffeeCategory();
        $coffeeCategory->name = 'Cà phê rang';
        $coffeeCategory->save();


        $coffeeCategory = new CoffeeCategory();
        $coffeeCategory->name = 'Cà phê chồn';
        $coffeeCategory->save();

    }
}
