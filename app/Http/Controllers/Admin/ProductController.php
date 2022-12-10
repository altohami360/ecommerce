<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\AttributeRepositoryInterface;
use App\Repositories\BrandRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Services\AppendAttribute;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $brandRepository;
    private $categoryRepository;
    private $productRepository;
    private $attributeRepository;

    public function __construct(
        BrandRepositoryInterface $brandRepository,
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository,
        AttributeRepositoryInterface $attributeRepository
    ) {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('searchTerm') && $request->searchTerm != null) {

            $products = $this->productRepository->search($request->column, $request->searchTerm);
            $searchTerm = $request->searchTerm;
        } else {

            $products = $this->productRepository->all(['*'],  ['attributes', 'brand', 'categories', 'images']);
            $searchTerm = '';
        }

        return view('admin.products.index', compact('products', 'searchTerm'));
    }

    public function getProductAttribute($product, $attributesModel)
    {
        $attributes = $product->productsAttributes->groupBy('attribute_id');
        // $attributesModel = $this->attributeRepository->all();

        $array = collect();
        foreach ($attributesModel as $attribute) {
            foreach ($attributes as $key => $a) {

                if ($key == $attribute['id']) {
                    $array->push(
                        collect([
                            'attribute' => collect([
                                'name' => $attribute['name'],
                                'value' => $a,
                            ])
                        ])
                    );
                }
            }
        }
        return ($array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = $this->brandRepository->all();
        $categories = $this->categoryRepository->all();
        $attributes = $this->attributeRepository->all();
        return view('admin.products.create', compact('brands', 'categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productRepository->create($request->validated());
        $product->categories()->attach($request->category_id);

        return to_route('products.index')->with('toast_success', 'Create product Successfuly');
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
    public function edit($id)
    {
        $brands = $this->brandRepository->all();
        $categories = $this->categoryRepository->all();
        $attributes = $this->attributeRepository->all();
        $product = $this->productRepository->findOneById($id);

        // refactoring in future 0_*
        // *************************
        $productCate = $product->categories()->get();
        $categories = (new AppendAttribute())->AppendCheckedToCollection($categories, $productCate);
        //
        return view('admin.products.edit', compact('brands', 'categories', 'attributes', 'product', 'productCate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $this->productRepository->update($id, $request->validated());

        $product = $this->productRepository->findOneById($id);

        // refactoring in future 0_*
        // *************************
        $product->categories()->sync($request->category_id);
        //
        return to_route('products.index')->with('toast_success', 'Update Product Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return to_route('products.index')->with('toast_success', 'Delete Product Successfuly');
    }
}
