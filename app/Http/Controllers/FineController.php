<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Lend;
use App\Models\Fine;
use Carbon\Carbon;
use App\Exports\FineExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;



class FineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fine = app(FineController::class)->create();
        $fines = Fine::with(['user','book'])->where('status', '0')->get();

        if($fine == true){
            return view('admin.book.fine', ['fines' => $fines,'searchBar' => 'off']);
        }
    }

    /**
     * Display history of the resource.
     */
    public function history(Request $request)
    {
        if($request->ajax()){
            
            $data = Fine::with(['user','book'])->where('status', '1')->orderBy('id', 'desc')->get();

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
            ->addColumn('selesai',function($data){
                return Carbon::parse($data->updated_at)->locale('id')->isoFormat('dddd, D MMMM Y');
            })
            ->addColumn('jumlah',function($data){
                return $data->amount;
            })
            ->rawColumns(['cover'])
            ->make(true);
        }

        return view('admin.book.finehistory', ['searchBar' => 'off', compact('request')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $lend = Lend::Where('status', '=', '1')->get();

        for($i = 0 ; $i < $lend->count(); $i++){
            
            $lend[$i]->status = app(FineController::class)->lateCheck($lend[$i]->return_date);

            if($lend[$i]->status == 3){
                $amount = app(FineController::class)->countFine($lend[$i]->return_date);
                
                $fine = Fine::where('lend_id', $lend[$i]->id)->get();
                
                if(isset($fine[0]) == true){
                    if($fine[0]->status == '0'){
                        $fine[0]->amount = $amount;
                        $fine[0]->save();
                    }
                }else{
                    Fine::create([
                        'lend_id'       => $lend[$i]->id,
                        'user_id'       => $lend[$i]->user_id,
                        'book_id'       => $lend[$i]->book_id,
                        'amount'        => $amount,
                        'status'        => '0'
                    ]);
                }
            }
        }

        return true;

    }

    public function lateCheck($date){

        // Mengubah tanggal dari string menjadi objek Carbon
        $customDate = Carbon::createFromFormat('Y-m-d', $date);

        // Mengambil tanggal hari ini dalam objek Carbon
        $today = Carbon::now();

        // Membandingkan tanggal hari ini dengan tanggal dari $date
        if ($today->gt($customDate->addSecond(1))) {
            $status = 3; // 3 = Telat. tidak ada di database
            return $status;
        } else {
            $status = 0;
            return $status;
        }
    }

    public function countFine($return_date){

        $return     = Carbon::parse($return_date);
        $today      = Carbon::today()->toDateString();

        // Jumlah hari telat
        $interval = $return->diffInDays($today);

        // Jumlah hari libur (tidak dihitung denda)
        $weekends = $return->diffInDaysFiltered(function (Carbon $date){
            return !$date->isWeekday();
        }, $today);

        // Total denda
        $amount = ($interval - $weekends) * 500;
        return $amount;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $fine = Fine::find($id);
        $book = Book::find($fine->book->id);
        
        if($book->status == 1){
            Alert::error('Error!', 'Status buku belum dikembalikan! Harap selesaikan peminjaman terlebih dahulu');
        } else{
            $fine->status = '1';
            $fine->update();
            Alert::success('Success!', 'Denda telah dibayar');
        }
        return redirect()->action([FineController::class, 'index']);
    }

    public function export_excel() {
        return Excel::download(new FineExport, "fine.xlsx");
    }
}
