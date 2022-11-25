<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['menu_name',
                           'cost_price',
                           'selling_price',
                           'description',
                           'category_id',
                           'menu_images',
                           'created_at',
                           'updated_at'
                           ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
