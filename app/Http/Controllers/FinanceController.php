<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $finances = Finance::orderBy('id', 'desc')->get();
        return view('admin.finance.index', ['finances' => $finances, 'searchBar' => 'off']);
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
        $finance = new Finance();

        $finance->activity  = $request->activity;
        $finance->amount    = $request->amount;
        $finance->type      = $request->type;
        $finance->note      = $request->note;

        // Save to Database
        $finance->save();
        // $finances = Finance::all();

        Alert::success('Success!', 'Transaksi berhasil ditambahkan');
        // return redirect()->to('/finance')->with(['finances' => $finances, 'searchBar' => 'off']);
        return redirect()->action([FinanceController::class, 'index']);
    
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
        // dd($request);
        $finance = Finance::find($request->id);

        $finance->activity  = $request->activity;
        $finance->amount    = $request->amount;
        $finance->type      = $request->type;
        $finance->note      = $request->note;

        $finance->update();
        // $finances = Finance::all();

        Alert::success('Success!', 'Transaksi berhasil diedit');
        // return redirect()->to('/finance',)->with(['finances' => $finances, 'searchBar' => 'off']);
        return redirect()->action([FinanceController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $finance = Finance::find($id);

        $finance->delete();

        // $finances = Finance::all();
        Alert::success('Success!', 'Transaksi berhasil dihapus');
        // return redirect()->to('/finance',)->with(['finances' => $finances, 'searchBar' => 'off']);
        return redirect()->action([FinanceController::class, 'index']);
    }
}
