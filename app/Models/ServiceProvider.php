<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getActiveStatusAttribute()
    {
        return $this->active ? 'Active' : 'In-Active';
    }



}
