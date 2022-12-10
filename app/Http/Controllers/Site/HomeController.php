<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(private ProductRepositoryInterface $productRepository)
    { }

    public function index()
    {
        $products = $this->productRepository->all();
        return view('welcome', compact('products'));
    }
}
