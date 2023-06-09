<?php

namespace App\Http\Controllers;
use App\Http\Requests\AnimalRequest;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function create()
    {
        $animal = new Animal();

        return view('animals.animal-form', compact('animal'));
    }

    public function store(AnimalRequest $request)
    {
        $animal = new Animal();

        $animal->name = $request->input('name');
        $animal->species = $request->input('species');
        $animal->breed = $request->input('breed');
        $animal->age = $request->input('age');
        $animal->weigth = $request->input('weigth');
        $animal->save();

        session()->flash('success_message', 'The animal was succesfully added.');

        return redirect()->route('animals.edit', $animal->id);
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);

        return view('animals.animal-form', compact('animal'));
    }

    public function update(AnimalRequest $request, $id)
    {
        $animal = Animal::findOrFail($id);

        $animal->name = $request->input('name');
        $animal->species = $request->input('species');
        $animal->breed = $request->input('breed');
        $animal->age = $request->input('age');
        $animal->weigth = $request->input('weigth');
        $animal->save();

        session()->flash('success_message', 'The animal was succesfully updated.');

        return redirect()->route('animals.edit', $animal->id);
    }
    public function animals ()
    {
        $all_animals = Animal::query()
        ->orderBy('name', 'asc')
        ->with('owner')
        ->limit(20)
        ->get();
       
        return view('animals.index', compact('all_animals'));
    }

    public function animalSearch(Request $request)
    {
        $search_term = $request->input('name');
        
        if ($search_term) {
            $results = Animal::query()
            ->where('name', 'like', '%' . $search_term . '%')
            ->orderBy('name','asc')
            ->with('image')
            ->get();
           
            return view('animals.index', compact('search_term', 'results'));
        }
        return view('animals.index', compact('search_term'));
    }
    
}
