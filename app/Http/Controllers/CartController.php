<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shop;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private function calculateSum($idUser, $rules){
        $cart = Cart::where('id_user', $idUser)->get();

        $sum = 0;

        foreach($cart as $item){
            if($rules == 0){
                $sum += $item->product->default_price * $item->amount;
                $discount = 0;
            } else {
                $sum += $item->product->default_price * $item->amount;
            }
        }
        return $sum;
     }

     private function calculateDiscount($idUser, $rules){
        $cart = Cart::where('id_user', $idUser)->get();

        $sum_price_default = 0;
        $sum_price_graduate = 0;

        foreach($cart as $item){
            if($rules == 0){
                $discount = 0;
            } else {
                $sum_price_default += $item->product->default_price * $item->amount;
                $sum_price_graduate += $item->product->price_student * $item->amount;
            }
        }

        $discount = $sum_price_default - $sum_price_graduate;

        return $discount;
     }

    public function index()
    {
        $rules = 0;

        if(auth()->user()->getRoles()->where('slug', 'admin')->count() > 0){
            $rules = 1;
        } elseif(auth()->user()->getRoles()->where('slug','graduate')->count() > 0){
            $rules = 1;
        } else {
            $rules = 0;
        }

        $sum = $this->calculateSum(Auth::user()->id, $rules);
        $discount = $this->calculateDiscount(Auth::user()->id, $rules);

        return view('cart', [
            'cart' => Cart::where('id_user', Auth::user()->id)->get(),
            'random_products' => Shop::inRandomOrder()->limit(3)->get(),
            'sum' => $sum,
            'discount' => $discount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add(Request $request)
    {
        $cart = Cart::where('id_user', Auth::user()->id)
            ->where('id_product', $request->id)
            ->first();

        if($cart){
            $cart->amount += 1;
            $cart->save();
        } else {
            $newCart = new Cart();
            $newCart->id_user = Auth::user()->id;
            $newCart->id_product = $request->id;
            $newCart->amount = 1;

            $newCart->save();
        }

        return back()->with('success', 'ok');
    }

    public function increment(Request $request){
        $cart = Cart::where('id_user', Auth::user()->id)
            ->where('id_product', $request->id)
            ->first();

            if($cart){
                $cart->amount += 1;
                $cart->save();
            }

        return back()->with('success', 'ok');
    }

    public function decrement(Request $request){
        $cart = Cart::where('id_user', Auth::user()->id)
            ->where('id_product', $request->id)
            ->first();
    
        if($cart){
            $cart->amount -= 1;
            if($cart->amount == 0){
                $cart->delete();
            } else {
                $cart->save();
            }
        }
    
        return back()->with('success', 'ok');
    }

    public function delete(Request $request){
        $cart = Cart::where('id_user', Auth::user()->id)
            ->where('id_product', $request->id)
            ->first();
    
        if($cart){
            $cart->delete();
        }
    
        return back()->with('deleted', 'ok');
    }

    public function checkout(Request $request){
        $rules = 0;

        if(auth()->user()->getRoles()->where('slug', 'admin')->count() > 0){
            $rules = 1;
        } elseif(auth()->user()->getRoles()->where('slug','graduate')->count() > 0){
            $rules = 1;
        } else {
            $rules = 0;
        }

        $sum = $this->calculateSum(Auth::user()->id, $rules);
        $discount = $this->calculateDiscount(Auth::user()->id, $rules);

        return view('checkout', [
            'cart' => Cart::where('id_user', Auth::user()->id)->get(),
            'sum' => $sum,
            'discount' => $discount,
        ]);
    }

    public function emptyCart($id){
        $cart = Cart::where('id_user', $id);
        $cart->delete();
    }

    public function makeorder(Request $request){
        $rules = 0;

        if(auth()->user()->getRoles()->where('slug', 'admin')->count() > 0){
            $rules = 1;
        } elseif(auth()->user()->getRoles()->where('slug','graduate')->count() > 0){
            $rules = 1;
        } else {
            $rules = 0;
        }

        $sum = $this->calculateSum(Auth::user()->id, $rules);
        $discount = $this->calculateDiscount(Auth::user()->id, $rules);

        $result_sum = $sum - $discount;

        $newOrder = new Order();
        $newOrder->user_id = Auth::user()->id;
        $newOrder->type_delivery = $request->delivery;
        $newOrder->type_payment = $request->payment;
        $newOrder->fio = $request->fio;
        $newOrder->adress = $request->adress;
        $newOrder->tel = $request->tel;
        $newOrder->email = $request->email;
        $newOrder->vk = $request->vk;
        $newOrder->price = $result_sum;

        $newOrder->save();

        $cart = Cart::where('id_user', Auth::user()->id)->get();

        foreach($cart as $item){
            $newOrderDetail = new OrderDetail();
            $newOrderDetail->order_id = $newOrder->id;
            $newOrderDetail->product_id = $item->product->id;
            $newOrderDetail->amount = $item->amount;
    
            $newOrderDetail->save();

            $decrementAmountProduct = Shop::where('id', $item->product->id)->first();
            $decrementAmountProduct->amount -= $item->amount;
            $decrementAmountProduct->save();
    
            $newOrderDetail->save();
        }

        $this->emptyCart(Auth::user()->id);

        return redirect()->route('/cart')->with('information','created');
    }
}
