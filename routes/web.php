<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/admin/tag/create', [\App\Http\Controllers\Admin\TagsController::class,'createTag'])->name('tag.create');
Route::post('/admin/tag/edit', [\App\Http\Controllers\Admin\TagsController::class,'editTag'])->name('tag.edit');
Route::post('/admin/tag/remove', [\App\Http\Controllers\Admin\TagsController::class,'removeTag'])->name('tag.remove');
Route::get('/admin/tag/all', [\App\Http\Controllers\Admin\TagsController::class,'tags'])->name('tag.all');

/*
 * Category admin routes
 */
Route::post('/admin/category/image/upload', [\App\Http\Controllers\Admin\UploadsController::class, 'uploadCategoryImage'])
    ->name('category.image.upload');

Route::any('/', function () {
    return view('app');
});
Route::any('{slug}', function () {
    return view('app');
});
