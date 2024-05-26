<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Lend;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminIndex()
    {
        $users = User::all();
        $books = Book::all();
        $lends = Lend::all();
        return view('admin.dashboard', ['users' => $users, 'books' => $books, 'lends' => $lends, 'searchBar' => 'off']);
    }

    public function userIndex(){

        $lends = Lend::with(['user','book'])->get();
        // $lend  = Lend::where('status', '1')->get();
        $favorites = Favorite::with(['user','book'])->get();

        return view('user.dashboard', ['lends' => $lends, 'favorites' => $favorites, 'searchBar' => 'off']);
    }
}
