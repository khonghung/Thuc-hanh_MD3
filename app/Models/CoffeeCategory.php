<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeCategory extends Model
{
    protected $table = 'coffee_categories';
    use HasFactory;

    function coffees() {
        return $this->hasMany(Coffee::class);
    }

}
