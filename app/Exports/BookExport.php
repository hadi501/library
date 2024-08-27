<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Book;

class BookExport implements FromView
{
    public function view(): View
    {
        $books = Book::All();
        return view('table.booktable', ['books' => $books]);
    }
}
