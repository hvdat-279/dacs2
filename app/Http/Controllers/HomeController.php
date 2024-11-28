<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\products;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with(['products' => function ($query) {
            $query->take(8);
        }])->get();

        // Trả về view với danh sách sản phẩm
        return view('home_main', compact('categories'));
    }
    public function showCategoryProducts(Request $request)
    {
        $id = $request->query('id');

        $category = Category::findOrFail($id);

        $products = $category->products()->paginate(12)->appends(['id' => $id]);

        return view('partials.home.products', compact('category', 'products'));
    }

    public function showProductDetail(Request $request)
    {
        $id = $request->query('id');
        $productDetail = products::findOrFail($id);
        // dd($productDetail);
        return view('partials.home.product_details', compact("productDetail"));
    }
}
