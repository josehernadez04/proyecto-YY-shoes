<?php

namespace App\Http\Controllers;

use App\Models\TypePerson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypePersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typePerson = TypePerson::all();
        return $typePerson;
        return view('TypePerson.Index', compact('typePerson'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TypePerson.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typePerson = new TypePerson();
        $typePerson->name = $request->name;
        $typePerson->description = $request->description;
        $typePerson->save();
        return redirect()->route('TypePerson.Index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypePerson  $typePerson
     * @return \Illuminate\Http\Response
     */
    public function show(TypePerson $typePerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypePerson  $typePerson
     * @return \Illuminate\Http\Response
     */
    public function edit(TypePerson $typePerson)
    {
        $typePerson = TypePerson::findOrFail($typePerson->id);
        return view('TypePerson.Edit', compact('typePerson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypePerson  $typePerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypePerson $typePerson)
    {
        $typePerson = TypePerson::findOrFail($typePerson->id);
        $typePerson->name = $request->name;
        $typePerson->description = $request->description;
        $typePerson->save();
        return redirect()->route('TypePerson.Index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypePerson  $typePerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypePerson $typePerson)
    {
        $typePerson = TypePerson::findOrFail($typePerson->id);
        $typePerson->delete();
        return redirect()->route('TypePerson.Index');
    }
}
