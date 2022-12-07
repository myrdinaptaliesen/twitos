<?php

namespace App\Http\Controllers;

use App\Models\Quacks;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Quacks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quackss = Quacks::all();
        return view('quacks.index', compact('quacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comments = Comments::all();
        return view('quacks.create',compact('comments'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'quantite' => 'required'
        ]);

        Quacks::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
        ]);

        return redirect()->route('quacks.index')
            ->with('success', 'Quacks ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quacks = Quacks::findOrFail($id);
        return view('quacks.edit', compact('quacks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateQuacks = $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'quantite' => 'required'
        ]);

        Quacks::whereId($id)->update($updateQuacks);
        return redirect()->route('quacks.index')
            ->with('success', 'Le quacks mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quacks = Quacks::findOrFail($id);
        $quacks->delete();
        return redirect('/quacks')->with('success', 'Quacks supprimé avec succès');
    }
}
