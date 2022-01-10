<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->q;
        $product = Product::where('name', 'like', '%' . $query . '%')->paginate(10);
        return ProductResource::collection($product);
    }
}
