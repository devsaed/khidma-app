<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class, 'city_id', 'id');
    }

    public function serviceProvider()
    {
        return $this->hasMany(User::class, 'service_provider_id', 'id');
    }
}
