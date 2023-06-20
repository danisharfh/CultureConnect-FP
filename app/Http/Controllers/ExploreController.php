<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $tweets = Tweet::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('explore', compact('tweets'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
    
        $tweets = Tweet::with('user')
            ->where(function ($q) use ($query) {
                $q->where('body', 'like', '%' . $query . '%');
            })
            ->paginate(10);
    
        return view('explore', compact('tweets', 'query'));
    }
    
}
