<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('shop', [
            'products' => $this->getSortedProducts($request),
            'categories' => Category::all()
        ]);
    }

    private function getSortedProducts(Request $request)
    {
        $sortBy = $request->input('sort_by', 'default_price');
        $direction = $request->input('direction', 'asc');

        return Shop::orderedBy($sortBy, $direction)->paginate(12);
    }

    public function show($id)
    {
        return view('current-product', [
            'product' => Shop::where('id', $id)->first()
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
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}