<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //only get 4 product for this one(featured product)
    public function index()
    {
        $products = Product::where('subcategory', 'shoes')
            ->take(4)
            ->get();

        return view('/pages/homepage', compact('products'));
    }
    //get product by navbar click
    public function getProducts($category, $subcategory)
    {
        $products = Product::where('category', $category)
            ->where('subcategory', $subcategory)
            ->get();

        return response()->json($products);
    }

    //product detail
    public function show($id)
    {
        $product = DB::table('products')
            ->join('product_details', 'products.product_id', '=', 'product_details.product_id')
            ->select('products.product_id', 'products.product_name', 'products.price', 'product_details.product_images', 'product_details.size', 'product_details.color')
            ->where('products.product_id', $id)
            ->first();

        return view("/pages/product_detail", compact("product"));
    }
    public function searchPage(Request $request)
    {
        $search = $request->query('query');
        return view('/pages/search', ['initial_query' => $search]);
    }

    public function searchAPI(Request $request)
    {
        $search = $request->query('query');

        $results = DB::table('products')
            ->where('product_name', 'like', '%' . $search . '%')
            ->get();

        return response()->json($results);
    }
}
