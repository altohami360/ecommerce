<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Repositories\CategoryRepositoryInterface;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;

class CategoryController extends Controller
{
    use UploadAble;

    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->all(['id', 'name']);
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        $category = $request->validated();

        if ($request->has('image') && ($request->image instanceof UploadedFile)) {
            $category['image'] = $this->uploadOne($request->image, 'categories', 'public');
        }

        $this->categoryRepository->create($category);

        return to_route('categories.index')->with('toast_success', 'Create Category Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parent_categories = $this->categoryRepository->all(['id', 'name']);

        return view('admin.categories.edit', compact('parent_categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $attribute = $request->validated();

        if ($request->has('image') && ($request->image instanceof UploadedFile)) {
            
            $attribute['image'] = $this->uploadOne($request->image, 'categories', 'public');

            if ($category->image != null) {
                $this->deleteOne($category->image);
            }

        }


        $this->categoryRepository->update($category->id, $attribute);

        return to_route('categories.index')->with('toast_success', 'Update categorey Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->image != null) {
            $this->deleteOne($category->image);
        }

        $this->categoryRepository->delete($category->id);

        return to_route('categories.index')->with('toast_success', 'Delete categorey Successfuly');
    }
}
