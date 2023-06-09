<?php

namespace App\Http\Controllers;
use App\Http\Requests\AnimalRequest;
use App\Models\Animal;
use App\Models\Owner;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function create(Request $request)
    {
        $animal = new Animal();
        
        if ($request->has('owner')) {

            $owners = Owner::query()
                ->where('surname', 'like', '%' . $request->input('owner') . '%')
                ->get();

            return view('animals.animal-form', compact('owners', 'animal'));
        }

        if ($request->has('id')) {
            $owner = Owner::findOrFail($request->id);

            return view('animals.animal-form', compact('owner', 'animal'));
        }


        return view('animals.animal-form');

    }

    public function store(AnimalRequest $request)
    {

        $animal = new Animal();
        $animal->owner_id = $request->input('owner_id');
        $animal->name = $request->input('name');
        $animal->species = $request->input('species');
        $animal->breed = $request->input('breed');
        $animal->age = $request->input('age');
        $animal->weight = $request->input('weight');
        $animal->save();

        session()->flash('success_message', 'The animal was succesfully added.');

        return redirect()->route('animals.edit', $animal->id);
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);

        $owner = $animal->owner;

        return view('animals.animal-form', compact('owner','animal'));
    }

    public function update(AnimalRequest $request, $id)
    {
        $animal = Animal::findOrFail($id);

        $animal->owner_id = $request->input('owner_id');
        $animal->name = $request->input('name');
        $animal->species = $request->input('species');
        $animal->breed = $request->input('breed');
        $animal->age = $request->input('age');
        $animal->weight = $request->input('weight');
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
