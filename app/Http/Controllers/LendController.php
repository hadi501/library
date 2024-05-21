<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Lend;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class LendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lends = Lend::with(['user','book'])->where('status', '1')->get();
        $carbon = Carbon::class;

        return view('admin.book.lend', ['lends' => $lends, 'carbon' => $carbon, 'searchBar' => 'off']);
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
        
        for($i = 0; $i < count($request->bookid); $i++){
            
            $lend = new Lend();
            
            $lend->user_id = $request->nim;
            $lend->book_id = $request->bookid[$i];
            $lend->lend_date = $request->lend_date;
            $lend->return_date = $request->return_date;
            $lend->status = '1';

            $lend->save();

            Book::where('id', $request->bookid[$i])->update(['status' => '1']);

        }

        Alert::success('Success!', 'Buku berhasil dipinjam');
        return redirect()->action([LendController::class, 'index']);
    
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
        $lend = Lend::find($id);
        $lend->return_date = Carbon::parse($lend->return_date)->addDays(7);

        $lend->save();

        Alert::success('Success!', 'Durasi peminjaman berhasil ditambah');
        return redirect()->action([LendController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $lend = Lend::find($id);
        $book = Book::find($lend->book->id);

        $lend->status = $request->status;
        $book->status = $request->status;
        
        $lend->update();
        $book->update();

        if ($request->status == '0'){
            Alert::success('Success!', 'Buku telah dikembalikan');
        } else{
            Alert::info('Buku Hilang!', 'Status buku telah diperbarui');
        }

        return redirect()->action([LendController::class, 'index']);
    }
}
