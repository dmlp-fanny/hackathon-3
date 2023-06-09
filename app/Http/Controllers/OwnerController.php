<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnerRequest;
use App\Models\Owner;
use App\Models\Animal;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $all_owners = Owner::orderBy('surname', 'asc')->limit(20)->get();

        return view('index', compact('all_owners'));
    }

    public function create()
    {
        $owner = new Owner();

        return view('owners.owner-form', compact('owner'));
    }

    public function store(OwnerRequest $request)
    {
        $owner = new Owner();

        $owner->first_name = $request->input('first_name');
        $owner->surname = $request->input('surname');
        $owner->email = $request->input('email');
        $owner->address = $request->input('address');
        $owner->save();

        session()->flash('success_message', 'The owner was succesfully added.');

        return redirect()->route('owners.edit', $owner->id);
    }

    public function edit($id)
    {
        $owner = Owner::findOrFail($id);

        return view('owners.owner-form', compact('owner'));
    }

    public function update(OwnerRequest $request, $id)
    {
        $owner = Owner::findOrFail($id);

        $owner->first_name = $request->input('first_name');
        $owner->surname = $request->input('surname');
        $owner->email = $request->input('email');
        $owner->address = $request->input('address');
        $owner->save();

        session()->flash('success_message', 'The owner was succesfully updated.');

        return redirect()->route('owners.edit', $owner->id);
    }



    
}
