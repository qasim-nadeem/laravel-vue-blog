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

    public function updateCategory(array $category)
    {
        $updated = Category::find($category['id'])->update([
            'iconImage' => $category['iconImage'],
            'categoryName' => $category['categoryName'],
        ]);
        if($updated){
            return Category::find($category['id']);
        } else {
            return fasle;
        }
    }
}
