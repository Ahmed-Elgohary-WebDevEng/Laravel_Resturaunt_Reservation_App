<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $specials = Category::where('name', 'specials')->first();

        return view('welcome', [
            'specials' => $specials
        ]);
    }

    public function thankYou()
    {
        return view('thank-you');
    }
}
