<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status'=>200,
            'articles'=>Article::with("category")->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = Article::create([
            'titre'=>$request->titre, 
            'contenu'=>$request->contenu, 
            'categorie_id'=>$request->categorie_id, 
            'date_debut'=>$request->date_debut, 
            'date_expiration'=>$request->date_expiration,
        ]);

        return response()->json([
            'status'=>200,
            'articles'=>$article,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'status'=>200,
            'articles'=>Article::whereId($id)->with("category")->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
