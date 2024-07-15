<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
