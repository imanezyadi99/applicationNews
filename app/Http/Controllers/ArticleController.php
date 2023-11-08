<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'articles'=>Article::with("category")->get(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create([
            'titre'=>$request->titre, 
            'contenu'=>$request->contenu, 
            'category_id'=>$request->category_id, 
            'date_debut'=>$request->date_debut, 
            'date_expiration'=>$request->date_expiration,
        ]);

        return response()->json([
            'articles'=>$article,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json([
                "message" => "Article not found",
            ], 404);
        }

        return response()->json([
            'articles'=>$article,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, string $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json([
                "message" => "Article not found",
            ], 404);
        }

        $data = $request->only(['titre', 'contenu', 'category_id', 'date_debut', 'date_expiration']);
        $article->fill($data);
        $article->update();

        
        return response()->json([
            'articles' => $article,
        ], 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json([
                "message" => "Article not found",
            ], 404);
        }

        $article->delete();

        return response()->json([
            "message" => "Article deleted",
        ], 204);
    }


    // get articles DESC
    public function filtredArticles(){

        $articles = Article::orderBy('date_debut','DESC')
                        ->where('date_expiration','>',now())
                        ->orderBy('date_debut', 'desc')
                        ->get();

        return response()->json([
            'articles'=>$articles,
        ], 200);

    }



    public function search($catId) {

        $category = Category::find($catId);

        if (!$category) {
            return response()->json([
                "message" => "Article not found",
            ], 404);
        }


        $articles = $category->getAllArticlesRecursive();
    
        return response()->json([
            'articles'=>$articles,
        ], 200);
    }
}
