<?php

namespace App\Http\Controllers;
use App\Models\Animal;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function animals ()
    {
        $all_animals = Animal::query()
        ->orderBy('name', 'asc')
        ->with('owner')
        ->limit(20)
        ->get();
       
        return view('animals.index', compact('all_animals'));

}
}
