<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdComposition extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user_applications()
    {
        return $this->hasMany(UserApplication::class);
    }
}
