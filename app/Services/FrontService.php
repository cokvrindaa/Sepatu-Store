<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ShoeRepositoryInterface;

class FrontService
{
    protected $categoryRepository;

    protected $shoeRepository;

    // digunakan agar kita bisa mengakses ShoeRepostiry dan juga CategoryRepository, yang ada setelah kode ini dalam bentu method
    public function __construct(ShoeRepositoryInterface $shoeRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->shoeRepository = $shoeRepository;
    }

    public function searchShoe(string $keyword)
    {
        return $this->shoeRepository->searchByName($keyword);
    }

    public function getFrontPageData()
    {
        $categories = $this->categoryRepository->getAllCategories();
        $popularShoes = $this->shoeRepository->getPopularShoes(4);
        $newShoes = $this->shoeRepository->getAllNewShoes();

        // data ini akan di bawah ke front controller
        return compact('categories', 'popularShoes', 'newShoes');
    }
}