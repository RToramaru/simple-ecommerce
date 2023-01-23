<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $products = Product::all();
        $data['products'] = $products;
        return view('home', $data);
    }

    public function category(Request $request, $id = null)
    {
        $data = [];

        $categories = Category::all();
        $products = Product::all();

        if ($id) {
            $products = Product::where('category_id', $id)->get();
        }

        $data['products'] = $products;
        $data['categories'] = $categories;
        $data['id'] = $id;

        return view('category', $data);
    }

    public function add_cart(Request $request, $id)
    {
        $product = Product::find($id);

        if($product){
            $cart = session()->get('cart', []);
            array_push($cart, $product);
            session()->put('cart', $cart);
        }

        return redirect()->route('home');
    }

    public function view_cart(Request $request)
    {
        $data = [];
        $cart = session()->get('cart', []);
        $data['cart'] = $cart;
        return view('cart', $data);
    }
}
