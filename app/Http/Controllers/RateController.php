<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
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
        dd($request);
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
        $rates = Rate::all();
        
        Alert::success('Success!', 'Rate anda berhasil diedit');
        return redirect()->to('/book-detail/ '. $id)->with(['rates' => $rates, 'searchBar' => 'off']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
