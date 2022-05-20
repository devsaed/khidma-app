<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function getVisibleStatusAttribute()
    {
        return $this->active ? 'Visible' : 'In-Visible';
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name_en;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
