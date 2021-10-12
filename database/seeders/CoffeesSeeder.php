<?php

namespace Database\Seeders;

use App\Models\Coffee;
use Illuminate\Database\Seeder;

class CoffeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coffee = new Coffee();
        $coffee->name = 'Cà phê Trung Nguyên';
        $coffee->price = '500000';
        $coffee->image = 'image/image.png';
        $coffee->save();

        $coffee = new Coffee();
        $coffee->name = 'Cà phê Mon';
        $coffee->price = '5000';
        $coffee->image = 'image/image.png';
        $coffee->save();
        
        
        $coffee = new Coffee();
        $coffee->name = 'Cà phê Gay';
        $coffee->price = '50000';
        $coffee->image = 'image/image.png';
        $coffee->save();
    
    }
}
