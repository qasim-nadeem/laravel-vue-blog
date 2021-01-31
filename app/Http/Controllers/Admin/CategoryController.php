<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryService
     */
    private $service;

    /**
     * CategoryController constructor.
     * @param CategoryService $service
     */
    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function createCategory(Request $request)
    {
        $request->validate([
            'categoryName' => 'required',
            'iconImage' => 'required'
        ]);
        return $this->service->createCategory($request->categoryName,$request->iconImage);
    }

    public function updateCategory(Request $request){
        return $this->service->updateCategory($request->all());
    }

    public function categories()
    {
        return Category::all();
    }
}
