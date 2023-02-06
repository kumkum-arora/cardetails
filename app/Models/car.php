<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class car extends Model
{
    use HasFactory;
    protected $table = "cars";
    public $timestamps = false;

    protected $fillable = [
        'carname',
        'brand',
        'price',
        'average',
        'transmission',
        'engine',
        'seatingcapacity',
        'fueltype',
        'color',
        'fuelcapacity',
        'releasedate',
        'image',
    ];
}
