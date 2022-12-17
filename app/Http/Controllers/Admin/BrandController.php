<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Repositories\BrandRepositoryInterface;
use App\Http\Requests\Brand\UpdateBrandRequest;

class BrandController extends Controller
{
    use UploadAble;

    private $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('searchTerm') && $request->searchTerm != null) {

            $brands = $this->brandRepository->search($request->column, $request->searchTerm);
            $searchTerm = $request->searchTerm;
        } else {

            $brands = $this->brandRepository->all();
            $searchTerm = '';
        }

        return view('admin.brands.index', compact('brands', 'searchTerm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = $request->validated();

        $brand['logo'] = $this->uploadOne($request->logo, 'brands', 'public');

        $this->brandRepository->create($brand);

        return to_route('brands.index')->with('toast_success', 'Create brand successfuly');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $attribute = $request->validated();

        $attribute['logo'] = $this->uploadOne($request->logo, 'brands', 'public');

        if ($brand->logo != null) {
            $this->deleteOne($brand->logo);
        }

        $this->brandRepository->update($brand->id, $attribute);

        return to_route('brands.index')->with('toast_success', 'Update brand successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if ($brand->logo != null) {
            $this->deleteOne($brand->logo);
        }

        $this->brandRepository->delete($brand->id);

        return redirect()->route('brands.index')->with('toast_success', 'Delete brand successfuly');
    }
}
