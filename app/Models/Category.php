<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name', // contoh : nike new
        'slug', // jika dijadikan slug dengan fungsi di bawah maka akan : localhost/nike-new
        'icon',
    ];

    // digunakan untuk 1 kategory memiliki mungkin lebih dari 1 sepatu. Contoh sport : nike, adiddas
    public function shoes(): HasMany
    {
        return $this->hasMany(Shoe::class);
    }

    // digunakan untuk pembuatan slug
    public function setNameAttribute($value) {
        // mengambil nama
        $this->attributes['name'] = $value;
        // menggubah menjadi slug
        $this->attributes['slug'] = Str::slug($value);
    }
}