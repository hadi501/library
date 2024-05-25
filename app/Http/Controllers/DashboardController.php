<?php

namespace App\Http\Controllers;

use App\Models\Lend;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminIndex()
    {
        return view('admin.dashboard', ['searchBar' => 'off']);
    }

    public function userIndex(){

        $lends = Lend::with(['user','book'])->get();
        // $lend  = Lend::where('status', '1')->get();
        $favorites = Favorite::with(['user','book'])->get();

        return view('user.dashboard', ['lends' => $lends, 'favorites' => $favorites, 'searchBar' => 'off']);
    }
}
