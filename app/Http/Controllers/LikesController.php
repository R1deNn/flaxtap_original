<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function index(){

        return view('your-likes', [
            'likes' => Like::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(20),
        ]);
    }

    public function like(Request $request, $product_id, $user_id)
    {

        $like = new Like;
        $like->user_id = $user_id;
        $like->product_id = $product_id;
        $like->save();

        return response()->json(['message' => 'Product liked successfully']);
    }

    public function dislike(Request $request, $product_id, $user_id)
    {
        $like = Like::where('user_id', $user_id)->where('product_id', $product_id)->delete();

        return response()->json(['message' => 'Product dislike successfully']);
    }
}
