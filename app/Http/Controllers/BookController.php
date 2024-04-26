<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.book.index', ['searchBar' => 'off']);
    }

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
     * Display the specified resource without authentication.
     */
    public function bookDetail(string $id)
    {
        return view('admin.book.detail', ['id' => $id, 'searchBar' => 'off']);
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
        //
    }
}
