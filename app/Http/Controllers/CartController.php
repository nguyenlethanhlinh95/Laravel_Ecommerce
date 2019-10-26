<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ProductDao;
use Mockery\Exception;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    private $cartDao;
    public function __construct()
    {
        $this->cartDao = new CartDao();
    }

    public function index()
    {
        try {
            $boolCart = $this->cartDao->boolCheckCart();
            if ($boolCart > 0) {
                $cartItems = $this->cartDao->gettAllItemCart();
                return view('front.cart.index', ['cartItems' => $cartItems]);
            } else {
                return view('front.cart.empty');
            }

        } catch (Exception $ex) {

        }


    }

    public function addItem($id)
    {
        $boolAddItemCart = $this->cartDao->addCart($id);

        Session::flash('suc', 'You succesfully added a product.');
        return back();
    }

    public function destroy($id)
    {
        $boolDeleteItemCart = $this->cartDao->deleteItemCart($id);
        if ($boolDeleteItemCart)
        {
            Session::flash('inf', 'You succesfully deleted a product.');
            return back();
        }
        else
        {
            Session::flash('err', 'You errors when deleteing a product.');
            return view('404');
        }
    }

    public function update(Request $request, $id)
    {

    }

}


class CartDao
{
    private $product;

    public function __construct()
    {
        $this->product = new ProductDao();
    }

    public function addCart($id)
    {
        try{
            $product = $this->product->getDetail($id);
            Cart::add($id, $product->pro_name, 1, $product->pro_price, ['img' => $product->image]);
            return true;
        }
        catch (Exception $ex)
        {
            return false;
        }

    }

    public function gettAllItemCart()
    {
        return Cart::content();
    }

    public function boolCheckCart()
    {
        if (Cart::count()>0)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteItemCart($id)
    {
        try
        {
            Cart::remove($id);
            return true;
        }
        catch (Exception $ex)
        {
            return false;
        }
    }

}
