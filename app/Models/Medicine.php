<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'm_name',
        'm_slug',
        'm_description',
        'm_price',
        'm_image',
        'm_quantity',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_medicine');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }
}
