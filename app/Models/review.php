<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\car;
use App\Models\User;

class review extends Model
{
    use HasFactory;
    protected $table = "reviews";

    protected $fillable = [
        'review',
        'cars_id',
        'users_id',
        'created_at',
        'updated_at',
    ];

    public function cars()
    {
        return $this->belongsTo(car::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
