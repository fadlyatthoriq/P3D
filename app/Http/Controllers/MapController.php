<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole('Admin')) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
        
        $users = User::get();

        return view('maps', compact('users'));
    }
}
