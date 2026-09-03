<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Shoe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'thubnail',
        'about',
        'price',
        'category_id',
        'brand_id',
        'is_popular'
    ];

    // digunakan untuk pembuatan slug
    public function setNameAttribute($value)
    {
        // mengambil nama
        $this->attributes['name'] = $value;
        // menggubah menjadi slug
        $this->attributes['slug'] = Str::slug($value);
    }

    // satu sepatu memiliki satu brand, satu categori, satu poto satu size
    
    public function brand(): BelongsTo 
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    
    // many to one, mengabungkan beberapa sepatu menjadi 1 kategori
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class , 'category_id');    
    }

    public function photos() :BelongsTo {
        return $this->belongsTo(ShoePhoto::class);
    }

    public function sizes():BelongsTo {
        return $this->belongsTo(ShoeSize::class);
    }

}