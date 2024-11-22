<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class IndexController extends Controller
{
    /**
     * index
     *
     * @return View
     */

    public function index(User $id): View
    {

        $users = User::where('id', Auth::user()->id)->get();

        return view('index', compact('users'));
    }

    public function map(): View
    {
        $users = User::get();

        return view('/maps', compact('users'));
    }
}
