<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\User;

class UserExport implements FromView
{
    public function view(): View
    {
        $users = User::All();
        return view('table.usertable', ['users' => $users]);
    }
}
