<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function show()
    {
        $all_owners = Owner::orderBy('surname', 'asc')->limit(20)->get();

        return view('owners.index', compact('all_owners'));
    }
}
