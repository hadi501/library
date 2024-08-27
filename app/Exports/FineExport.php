<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Fine;

class FineExport implements FromView
{
    public function view(): View
    {
        $fines = Fine::with(['user','book'])->orderBy('status', 'asc')->get();
        return view('table.finetable', ['fines' => $fines]);
    }
}
