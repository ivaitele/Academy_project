<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Managers\FileManager;
use App\Models\Category;
use Illuminate\View\View;

class AdminCategoriesController extends Controller
{
    public function __construct(protected FileManager $fileManager)
    {
    }

    public function index(): View
    {
        $categories = Category::all();

        return view('admin.categories.index', ['active'=> 'categories', 'categories' => $categories]);
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        $file = $this->fileManager->storeFile($request, 'photo','images/category');
        // Ši kodo dalis atsakinga uz paveiksliuko isaugojima produkto lenteleje
        $category->photo = $file->url;
        $category->save();
        return redirect()->route('categories.index', $category);
    }

    public function create()
    {
        $active = 'categories';
        return view('admin.categories.create', compact('active'));
    }

    public function edit(Category $category)
    {
        $active = 'categories';
        return view('admin.categories.edit', compact('category', 'active'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        if ($request->photo) {
            $this->fileManager->removeFile($category->photo, $category->id, Category::class);
            $file = $this->fileManager->storeFile($request, 'photo', 'images/category');

            $category->photo = $file->url;
        }

        $category->save();

        return redirect()->route('categories.index', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
