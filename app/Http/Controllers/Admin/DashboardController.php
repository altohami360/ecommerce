<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;

class DashboardController extends Controller
{
    private $userRepository;
    private $productRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        ProductRepositoryInterface $productRepository,
    ) {
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }

    public function __invoke(Request $request)
    {
        $users = $this->userRepository->count();
        $products = $this->productRepository->count();
        return view('admin.dashboard');
    }
}
