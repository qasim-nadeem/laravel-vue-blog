<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\Admin\UploadsService;
use Illuminate\Http\Request;

class UploadsController extends Controller
{
    /**
     * @var UploadsService
     */
    private $service;

    /**
     * UploadsController constructor.
     * @param UploadsService $service
     */
    public function __construct(UploadsService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     */
    public function uploadCategoryImage(Request $request)
    {
        return $this->service->uploadCategoryImage($request->file);
    }
}
