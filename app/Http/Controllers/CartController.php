<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ProductDao;
use Mockery\Exception;

class CartController extends Controller
{
    //
    private $product;
    public function __construct()
    {
        $this->product = new ProductDao();
    }

    public function index()
    {
        try
        {
            $cartCount = Cart::count();
            if ($cartCount> 0)
            {
                Cart::tax(0, 0, 0);
                $cartItems = Cart::content();
                //var_dump($cartItems);

                return view('front.cart.index', ['cartItems' => $cartItems]);
            }
            else
            {
                return view('front.cart.empty');
            }

        }catch (Exception $ex)
        {

        }


    }

    public function addItem($id)
    {
        $product = $this->product->getDetail($id);
        Cart::add($id, $product->pro_name, 1, $product->pro_price, ['img' => $product->image]);

        return back();
    }


    public function destroy($id)
    {
        Cart::remove($id);
        return back();
    }
}
