<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Book;
use App\Models\User;
use App\Models\Lend;

class Controller extends BaseController
{
    public function getBook(){
        $book = Book::All();
        return $book;
    }

    public function getUser(){
        $user = User::All();
        return $user;
    }

    public function getLend(){
        $lend = Lend::where('status', '1')->get();
        return $lend;
    }
}
