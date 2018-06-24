<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $this->validate(
            request(),
            [
                'title' => 'required|string|max:191',
                'slug' => 'required|string|alpha_dash|max:191|unique:articles',
                'text' => 'required|string|max:65000',
            ]
        );
        // dd($input);
        $article = Article::create($input);

        return redirect()
            ->route('articles.edit', compact('article'))
            ->with('success', 'Статья была успешно добавлена');
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
        $article = Article::find($id);
        return view('articles.edit', compact('article', 'id'));
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
        $article = Article::find($id);
        $this->validate(request(), [
            'title' => 'required|string|max:191',
            'slug' => 'required|string|alpha_dash|max:191',
            'text' => 'required|string|max:65000',
        ]);
        $article->title = $request->get('title');
        $article->slug = $request->get('slug');
        $article->text = $request->get('text');
        $article->save();
        return redirect()
            ->route('articles.edit', compact('article'))
            ->with('success', 'Статья была успешно отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('articles')->with('success', 'Статья успешно удалена!');
    }
}
