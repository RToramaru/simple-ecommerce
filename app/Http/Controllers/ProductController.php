<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Services\SaleService;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $products = Product::all();
        $data['products'] = $products;
        return view('product.home', $data);
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

        return view('product.category', $data);
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
        return view('product.cart', $data);
    }

    public function remove_cart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            unset($cart[$id]);
        }       
        session()->put('cart', $cart);
        return redirect()->route('view_cart');
    }

    public function finalize(Request $request)
    {
        $cart = session()->get('cart', []);
        $sale_services = new SaleService();
        $result = $sale_services->finalize_sale($cart, \Auth::user());

        if($result['status'] == 'success')
            session()->put('cart', []);
            
        return redirect()->route('home')->with( $result['status'], $result['message']);
    }
}
