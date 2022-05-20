<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function subCategories()
    {
        return $this->hasMany(subCategory::class, 'category_id', 'id');
    }

    public function serviceProvider()
    {
        return $this->hasMany(User::class, 'service_provider_id', 'id');
    }
    
    public function getVisibleStatusAttribute()
    {
        return $this->active ? 'Visible' : 'In-Visible';
    }


    
}
