<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rate;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    /**
     * Home page for all access.
     */
    public function home(Request $request)
    {
        if ($request->ajax()) {
            $perPage = 10; // Jumlah data per muatan tambahan
            $page = $request->input('page', 1);
            $offset = ($page - 1) * $perPage;
        
            $books = DB::table('book')
            ->take($perPage)
            ->skip($offset)
            ->inRandomOrder()
            ->distinct()
            ->get();
        
            return response()->json($books);
        }

        // $books = Book::all();
        return view('index', ['searchBar' => 'on']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', ['books' => $books, 'searchBar' => 'off']);
    }

    /**
     * Display the specified resource without authentication.
     */
    // public function bookDetail(string $id)
    // {
    //     return view('admin.book.detail', ['id' => $id, 'searchBar' => 'off']);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.book.add', ['searchBar' => 'off']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (Book::where('id', $request->id)->exists()) {
            Alert::error('Error!', 'ID buku sudah ada');
            return redirect()->back();
        }

        $book = new Book();

        $book->id           = $request->id;
        $book->title        = $request->title;
        $book->author       = $request->author;
        $book->editor       = $request->editor;
        $book->publisher    = $request->publisher;
        $book->year         = $request->year;
        $book->category     = $request->category;
        $book->language     = $request->language;
        $book->translator   = $request->translator;
        $book->page         = $request->page;
        $book->volume       = $request->volume;
        $book->synopsis     = $request->synopsis;
        $book->type         = $request->type;
        $book->status       = $request->status;

        // Store image
        $filename = $request->id . '.' . $request->cover->extension();
        $path = $request->cover->storeAs('public/book', $filename);
        $book->cover = $filename;
        
        // Save to Database
        $book->save();
        $books = Book::all();
        
        Alert::success('Success!', 'Buku berhasil ditambahkan');
        return redirect()->to('/book',)->with(['books' => $books,'searchBar' => 'off']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
       


        if(Auth::user()){
        
            $rate = Rate::where([ 'user_id' => Auth::user()->id, 'book_id' => $id,])->first();
            $fav = Favorite::where([ 'user_id' => Auth::user()->id, 'book_id' => $id,])->first();
            
            return view('admin.book.detail', ['book' => $book, 'rate' => $rate, 'fav' => $fav, 'searchBar' => 'off']);
        
        } else{
            return view('admin.book.detail', ['book' => $book, 'searchBar' => 'off']);
        }


        // if (Auth::user()){
            // $user = Auth::user();
        // }
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);

        return view('admin.book.edit', ['book' => $book, 'searchBar' => 'off']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);

        // $book->id           = $request->id;
        $book->title        = $request->title;
        $book->author       = $request->author;
        $book->editor       = $request->editor;
        $book->publisher    = $request->publisher;
        $book->year         = $request->year;
        $book->category     = $request->category;
        $book->language     = $request->language;
        $book->translator   = $request->translator;
        $book->page         = $request->page;
        $book->volume       = $request->volume;
        $book->synopsis     = $request->synopsis;
        $book->type         = $request->type;
        $book->status       = $request->status;

        if ($request->hasFile('cover')) {
            $filename = $request->id . '.' . $request->cover->extension();
            // delete old cover
            if ($book->cover !== 'cover_default.jpg') {
                Storage::delete('public/book/' . $book->cover);
            }
            $path = Storage::putFileAs('public/book/', $request->file('cover'), $filename);
            $book->cover = $filename;
        }

        $book->update();
        $books = Book::all();
        
        Alert::success('Success!', 'Buku berhasil diedit');
        return redirect()->to('/book',)->with(['books' => $books,'searchBar' => 'off']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if ($book->cover !== 'cover_default.jpg') {
            Storage::delete('public/book/' . $book->cover);
        }

        $book->delete();

        $books = Book::all();
        Alert::success('Success!', 'Buku berhasil dihapus');
        return redirect()->to('/book',)->with(['books' => $books,'searchBar' => 'off']);
    }
}
