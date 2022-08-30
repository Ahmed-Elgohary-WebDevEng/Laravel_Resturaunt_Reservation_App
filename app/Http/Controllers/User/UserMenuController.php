<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class UserMenuController extends Controller
{
    //
    public function index()
    {
        $menus = Menu::all();

        return view('user.menus.index', [
            'menus' => $menus
        ]);
    }
}
