<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Models\Brand;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class BrandController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        if ($request->has('logo') && ($request->logo instanceof UploadedFile)) {
            $logo = $this->uploadOne($request->logo, 'brands');
        }

        Brand::create([
            'name' => $request->name,
            'logo' => $logo
        ]);

        return redirect()->route('brands.index')->with('toast_success', 'Create brand successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        // dd($brand->logo);
        if ($request->has('logo') && ($request->logo instanceof UploadedFile)) {
            if ($brand->logo != null) {
                $this->deleteOne($brand->logo);
            }
            $logo = $this->uploadOne($request->logo, 'brands', '', time());
        }

        $brand->update([
            'name' => $request->name,
            'logo' => $logo
        ]);

        return redirect()->route('brands.index')->with('toast_success', 'Update brand successfuly');
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
        
        $brand->delete();

        return redirect()->route('brands.index')->with('toast_success', 'Delete brand successfuly');
    }
}
