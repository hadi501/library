<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Lend;
use App\Exports\LendExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
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
     * Display a listing of the resource.
     */
    public function userLend()
    {
        $lends = Lend::with(['user','book'])->orderBy('id', 'desc')->get();
        $carbon = Carbon::class;

        return view('user.lend', ['lends' => $lends, 'carbon' => $carbon, 'searchBar' => 'off']);
    }


    /**
     * Display history of the resource.
     */
    public function history(Request $request)
    {
        if($request->ajax()){
            
            $data = Lend::with(['user','book'])->where('status', '0')->orWhere('status', '2')->orderBy('id', 'desc')->get();

            return DataTables::of($data)
            ->addColumn('cover',function($data){
                return '<img src="'.asset('storage/public/book/' . $data->book->cover).'" alt="Book cover" width="100">';
            })
            ->addColumn('title',function($data){
                return $data->book->title;
            })
            ->addColumn('category',function($data){
                return $data->book->category;
            })
            ->addColumn('peminjam',function($data){
                return $data->user->username;
            })
            ->addColumn('pinjam',function($data){
                return Carbon::parse($data->created_at)->locale('id')->isoFormat('dddd, D MMMM Y');
            })
            ->addColumn('selesai',function($data){
                return Carbon::parse($data->updated_at)->locale('id')->isoFormat('dddd, D MMMM Y');
            })
            ->rawColumns(['cover'])
            ->make(true);
        }

        return view('admin.book.lendhistory', ['searchBar' => 'off', compact('request')]);
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
            
            Lend::updateOrCreate(
                ['user_id' => $request->nim, 'book_id' => $request->bookid[$i], 'lend_date' => $request->lend_date],
                ['return_date' => $request->return_date, 'status' => '1']
            );

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

    public function export_excel() {
        return Excel::download(new LendExport, "lend.xlsx");
    }
}
