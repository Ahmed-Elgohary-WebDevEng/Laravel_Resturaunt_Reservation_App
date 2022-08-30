<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    //
    public function index()
    {
        return view('user.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function show(Category $category)
    {
        return view('user.categories.show', [
            'category' => $category
        ]);
    }
}
