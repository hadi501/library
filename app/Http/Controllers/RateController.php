<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $rate = new Rate();

        $rate->user_id = $request->userid;
        $rate->book_id = $request->bookid;
        $rate->comment = $request->comment;
        $rate->star    = $request->star;
        
        // Save to Database
        $rate->save();

        $rates = Rate::with(['user','book'])->where('book_id', $request->bookid)->get();
        $grade = Rate::where('book_id', $request->bookid)->avg('star');

        Alert::success('Success!', 'Penilaian berhasil ditambahkan');
        return redirect()->to('/book-detail' . '/' . $request->bookid)->with(['rates' => $rates, 'grade' => (float)$grade, 'searchBar' => 'off']);
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

        $rate = Rate::find($id);

        $rate->comment  = $request->comment;
        $rate->star     = $request->star;
        $rate->update();

        $rates = Rate::with(['user','book'])->where('book_id', $rate->book->id)->get();
        $grade = Rate::where('book_id', $rate->book->id)->avg('star');

        Alert::success('Success!', 'Rate anda berhasil diedit');
        return redirect()->to('/book-detail'.'/'.$rate->book->id)->with(['rates' => $rates, 'grade' => (float)$grade, 'searchBar' => 'off']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $rateid = Rate::where([ 'user_id' => Auth::user()->id, 'book_id' => $id])->first()->id;
        
        
        $rate = Rate::find($rateid);
        $rate->delete();
        
        $rates = Rate::with(['user','book'])->where('book_id', $id)->get();
        $grade = Rate::where('book_id', $id)->avg('star');

        Alert::success('Success!', 'Rate berhasil dihapus');
        return redirect()->to('/book-detail'.'/'.$id)->with(['rates' => $rates, 'grade' => (float)$grade, 'searchBar' => 'off']);
    }
}
