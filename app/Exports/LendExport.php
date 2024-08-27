<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Lend;

class LendExport implements FromView
{
    public function view(): View
    {
        $lends = Lend::with(['user','book'])->orderBy('status', 'desc')->get();
        return view('table.lendtable', ['lends' => $lends]);
    }
}
