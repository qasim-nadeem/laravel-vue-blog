<?php


namespace App\Services\Admin;

use App\Models\Category;

class CategoryService
{
    public function createCategory($catgeoryName, $iconImage)
    {
        return Category::create([
            'categoryName' => $catgeoryName,
            'iconImage' => $iconImage
        ]);
    }
}
