<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index() 
    {
        $product = Product::select('products.id', 'products.name', 'products.slug',
         'products.description', 'products.price', 'products.stock',
         'categories.name as nama_kategory')
        ->join('categories','products.category_id', '=', 'categories.id')
        ->orderBy('products.created_at', 'DESC')
        ->get();

        //buat response terlebih dahulu
        $res = [
            'seccess' => true,
            'message' => 'list product',
            'data' => $product,
        ];

        return response()->json($res, 200);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (! $product) {
            $res = [
                'succes' => false,
                'message' => 'product not found',
            ]; 
            return response()->json($res, 404);
        }

        $res = [
            'succes' => true,
            'message' => 'product detail',
            'data' => $product,
        ];
        return response()->json($res, 200);
    }
}
