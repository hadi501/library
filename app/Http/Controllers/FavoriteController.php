<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rate;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorites = Favorite::with(['user','book'])->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('user.favorite', ['favorites' => $favorites, 'searchBar' => 'on']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookid = $_POST['bookid'];

        $fav = new Favorite();

        $fav->user_id = Auth::user()->id;
        $fav->book_id = $bookid;
        
        // Save to Database
        $fav->save();

        try {
            return response()->json(
                [
                    'error'     => 'false',
                    'message'   => 'Sukses'
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error'     => 'true',
                    'message'   => $e->getMessage()
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $fav = Favorite::where([ 'user_id' => Auth::user()->id, 'book_id' => $id])->first();

        $favorite = Favorite::find($fav->id);
        $favorite->delete();
        
        try {
            return response()->json(
                [
                    'error'     => 'false',
                    'message'   => 'Sukses'
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error'     => 'true',
                    'message'   => $e->getMessage()
                ]
            );
        }
    }
}
