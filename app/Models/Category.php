<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['name', 'description', 'slug', 'image'];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'category_medicine');
    }
}
