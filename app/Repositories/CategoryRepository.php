<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{ // tetep menggunakan interface yang sama
    public function getAllCategories()
    {
        return Category::latest()->get();
    }
}
