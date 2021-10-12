<?php

namespace App\Models;

use App\Models\CoffeeCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coffee extends Model
{
    protected $table = 'coffees';
    use HasFactory;

    function category() {
        return $this->belongsTo(CoffeeCategory::class);
    }

}
