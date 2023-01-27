<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Services\SaleService;
use App\Models\Order;
use App\Models\OrderItems;
use PagSeguro\Configuration\Configure;

class ProductController extends Controller
{

    private $_configs;

    public function __construct()
    {
        $this->_configs = new Configure();
        $this->_configs->setCharset('UTF-8');
        $this->_configs->setAccountCredentials(env('PAG_SEGURO_EMAIL'), env('PAG_SEGURO_TOKEN'));
        $this->_configs->setEnvironment(env('PAG_SEGURO_ENVIRONMENT'));
        $this->_configs->setLog(true, storage_path('logs/pagseguro.log'));
    }

    public function get_credentials()
    {
        return $this->_configs->getAccountCredentials();
    }

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

        if($result['status'] == 'success'){

            $cred_card = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();
            $cred_card->setReceiverEmail(env('PAG_SEGURO_EMAIL'));
            $cred_card->setReference($result['order']->id);
            $cred_card->setCurrency("BRL");
            foreach($cart as $item){
                $cred_card->addItems()->withParameters(
                    $item->id,
                    $item->name,
                    1,
                    $item->price
                );
            }
            $cred_card->setSender()->setName(\Auth::user()->name . " " . \Auth::user()->name);
            //$cred_card->setSender()->setEmail(\Auth::user()->email);
            $cred_card->setSender()->setEmail('c02539923026126515461@sandbox.pagseguro.com.br'); // Email teste do pagseguro sandbox
            $cred_card->setSender()->setHash($request->input('senderHash'));
            $cred_card->setSender()->setPhone()->withParameters(
                11,
                56273440
            );
            $cred_card->setSender()->setDocument()->withParameters(
                'CPF',
                '22111944785'
            );
            $cred_card->setShipping()->setAddress()->withParameters(
                'Av. Brig. Faria Lima',
                1384,
                'Jardim Paulistano',
                '01452002',
                'São Paulo',
                'SP',
                'BRA'
            );
            $cred_card->setBilling()->setAddress()->withParameters(
                'Av. Brig. Faria Lima',
                1384,
                'Jardim Paulistano',
                '01452002',
                'São Paulo',
                'SP',
                'BRA'
            );
            $cred_card->setToken($request->input('token'));

            $parcela = $request->input('parcela');
            $total = $request->input('total');

            $cred_card->setInstallment()->withParameters($parcela, $total);

            $cred_card->setHolder()->setName(\Auth::user()->name);
            $cred_card->setHolder()->setDocument()->withParameters(
                'CPF',
                '22111944785'
            );
            $cred_card->setHolder()->setBirthdate('27/10/1987');
            $cred_card->setHolder()->setPhone()->withParameters(
                11,
                56273440
            );

            $cred_card->setMode('DEFAULT');

            $result = $cred_card->register(
                $this->get_credentials()
            );  
            session()->put('cart', []);
            
            return redirect()->route('history');
        }else{
            return redirect()->route('view_cart');
        }
            
    }

    public function history(Request $request)
    {
        $data = [];
        
        $user_id = \Auth::user()->id;

        $orders = Order::where('user_id', $user_id)->orderBy('order_date', 'desc')->get();

        $data['orders'] = $orders;

        return view('product.history', $data);
    }

    public function history_id(Request $request)
    {   
        $id = $request->input('index');
        
        $data = [];

        $order = Order::find($id);

        $order_items = OrderItems::where('order_id', $id)->get();

        $data['order'] = $order;

        $data['order_items'] = $order_items;

        return view('product.fragments.details', $data);
    }

    public function pay(Request $request){
        $data = [];
        $session_code = \PagSeguro\Services\Session::create($this->get_credentials());
        $id_session = $session_code->getResult();
        $data['id_session'] = $id_session;
        $data['cart'] = session()->get('cart', []);
        return view('product.pay', $data);
    }
}
