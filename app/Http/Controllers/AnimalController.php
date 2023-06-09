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
        $animal->address = $request->input('address');
        $animal->save();

        session()->flash('success_message', 'The animal was succesfully added.');

        return redirect()->route('animals.edit', $animal->id);
    }

    public function edit($id)
    {
        $owner = Owner::findOrFail($id);

        return view('owners.owner-form', compact('owner'));
    }

    public function update(AnimalRequest $request, $id)
    {
        $animal = Animal::findOrFail($id);

        $owner->first_name = $request->input('first_name');
        $owner->surname = $request->input('surname');
        $owner->email = $request->input('email');
        $owner->address = $request->input('address');
        $owner->save();

        session()->flash('success_message', 'The owner was succesfully updated.');

        return redirect()->route('owners.edit', $owner->id);
    }
}
