<?php

namespace App\Http\Controllers;

use App\Models\Quacks;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comments::all();
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Quacks::all();
        return view('comments.create',compact('categories'));
        // return view('comments.create');
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
            'content' => 'required',
            'image' => 'required',
            'tags' => 'required',
            'quack_id' => 'required',
        
        ]);

        Comments::create([
            'content' => $request->content,
            'image' => $request->image,
            'tags' => $request->tags,
            'quack_id' => $request->quack_id,
        ]);

        return redirect()->route('comments.index')
            ->with('success', 'Comments ajouté avec succès !');
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
        $comment = Comments::findOrFail($id);
        return view('comments.edit', compact('comment'));
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
        $updateComments = $request->validate([
            'content' => 'required',
            'image' => 'required',
            'tags' => 'required',
            'tag_id' => 'required',
        ]);

        Comments::whereId($id)->update($updateComments);
        return redirect()->route('comments.index')
            ->with('success', 'Le comment mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comments::findOrFail($id);
        $comment->delete();
        return redirect('/comments')->with('success', 'Comments supprimé avec succès');
    }
}
