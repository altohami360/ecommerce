<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductImageRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Repositories\ProductImageRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ProductImageController extends Controller
{
    use UploadAble;

    private $productRepository;
    private $productImageRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        ProductImageRepositoryInterface $productImageRepository,
    ) {
        $this->productRepository = $productRepository;
        $this->productImageRepository = $productImageRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $productImages = $this->productImageRepository->getByforeignId('product_id', $product->id);
        return view('admin.products.image', compact('productImages', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductImageRequest $request, Product $product)
    {

        $productImages = $request->validated();

        $productImages['path'] = $this->uploadOne($request->image, 'products', 'public');
        $productImages['product_id'] = $product->id;

        $this->productImageRepository->create($productImages);

        return to_route('product.image', compact('product'));
    }

    public function destroy(Product $product, ProductImage $image)
    {
        $this->deleteOne($image->path);

        $this->productImageRepository->delete($image->id);

        return to_route('product.image', compact('product'));
    }
}
