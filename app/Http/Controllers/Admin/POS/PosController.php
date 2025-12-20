<?php

namespace App\Http\Controllers\Admin\POS;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $categories = Category::whereHas('products')->with('products')->get();
        $products = Product::with('category')->get();
        return view('admin.POS.index',compact('categories','products'));
    }
}
